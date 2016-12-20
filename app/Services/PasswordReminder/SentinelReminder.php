<?php namespace Larafication\Services\Reminder;

use Closure;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Auth\Passwords\PasswordBroker as PasswordBrokerLaravel;

/**
 * Class SentinelReminder
 * @package Larafication\Services\Reminder
 */
class SentinelReminder extends PasswordBrokerLaravel
{
    /**
     * @var Sentinel
     */
    private $sentinel;

    /**
     * SentinelReminder constructor.
     * @param Sentinel $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        parent::__construct(
            app('Illuminate\Auth\Passwords\TokenRepositoryInterface'),
            app('Larafication\Services\User\SentinelProvider')
        );
        $this->sentinel = $sentinel;
    }

    /**
     * @param $user
     * @param $token
     * @param $password
     * @return bool
     */
    public function complete($user, $token, $password)
    {
        return $this->sentinel->getReminderRepository()->complete($user, $token, $password);
    }
}
