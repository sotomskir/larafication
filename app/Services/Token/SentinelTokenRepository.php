<?php namespace Larafication\Services\Token;

use Cartalyst\Sentinel\Sentinel as SentinelCore;
use Cartalyst\Sentinel\Reminders\EloquentReminder;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class SentinelTokenRepository
 * @package Larafication\Services\Token
 */
class SentinelTokenRepository implements TokenRepositoryInterface
{
    /**
     * @var SentinelCore
     */
    private $sentinel;

    /**
     * SentinelTokenRepository constructor.
     * @param SentinelCore $sentinel
     */
    public function __construct(SentinelCore $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * Create a new token.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword $user
     * @return string
     */
    public function create(CanResetPasswordContract $user)
    {
        $token = $this->sentinel->getReminderRepository()->create($user);
        return $token->code;
    }

    /**
     * Determine if a token record exists and is valid.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword $user
     * @param  string $token
     * @return bool
     */
    public function exists(CanResetPasswordContract $user, $token)
    {
        return $this->sentinel->getReminderRepository()->exists($user, $token);
    }

    /**
     * Delete a token record.
     *
     * @param  string $token
     * @return void
     */
    public function delete($token)
    {
        EloquentReminder::where('code', $token)->delete();
    }

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired()
    {
        $this->sentinel->getReminderRepository()->removeExpired();
    }
}
