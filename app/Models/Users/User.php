<?php

namespace Larafication\Models\Users;

use Illuminate\Auth\Passwords\CanResetPassword as ResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Larafication\Models\Team;

/**
 * Larafication\Models\Users\User.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Roles\EloquentRole[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Persistences\EloquentPersistence[]
 * $persistences
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Activations\EloquentActivation[]
 * $activations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Reminders\EloquentReminder[] $reminders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentinel\Throttling\EloquentThrottle[] $throttle
 * @property mixed $permissions
 * @property-read
 * \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 * $notifications
 * @property-read
 * \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 * $unreadNotifications
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $last_login
 * @property string $first_name
 * @property string $last_name
 * @property string $remember_token
 * @property string $username
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Larafication\Models\Team[] $leadedTeams
 * @property-read \Illuminate\Database\Eloquent\Collection|\Larafication\Models\Team[] $teams
 * @property-read
 * \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 * $readNotifications
 *
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Larafication\Models\Users\User whereUpdatedAt($value)
 */
class User extends EloquentUser implements CanResetPassword, Authenticatable
{
    use Notifiable, ResetPassword, \Illuminate\Auth\Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function joinTeams($teams)
    {
        if (! $teams) {
            throw new \InvalidArgumentException();
        }

        $this->teams()->attach($teams);
    }

    public function leaveTeams($teams)
    {
        if (! $teams) {
            throw new \InvalidArgumentException();
        }

        $this->teams()->detach($teams);
    }

    public function leaveAllTeams()
    {
        $this->teams()->detach();
    }

    public function leadedTeams()
    {
        return $this->hasMany(Team::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }
}
