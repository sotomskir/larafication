<?php

namespace Larafication\Models;

use Illuminate\Database\Eloquent\Model;
use Larafication\Models\Users\User;

/**
 * Larafication\Models\Team
 *
 * @property-read \Larafication\Models\Users\User $leader
 * @property-read \Illuminate\Database\Eloquent\Collection|\Larafication\Models\Users\User[] $members
 * @mixin \Eloquent
 */
class Team extends Model
{
    protected $fillable = ['name'];

    public function addMembers($users)
    {
        if (!$users) {
            throw new \InvalidArgumentException;
        }
        $this->members()->attach($users);
    }

    public function removeMembers($users)
    {
        if (!$users) {
            throw new \InvalidArgumentException;
        }
        $this->members()->detach($users);
    }

    public function removeAllMembers()
    {
        $this->members()->detach();
    }

    public function setTeamLeader(User $user)
    {
        $this->leader()->associate($user);
    }

    public function unsetTeamLeader()
    {
        $this->leader()->dissociate();
    }

    public function leader()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
