<?php namespace Larafication\Services\Authentication;

use Cartalyst\Sentinel\Sentinel;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\Authenticatable;
use Cartalyst\Sentinel\Sentinel as SentinelCore;

/**
 * Class Sentinel
 * @package Larafication
 */
class SentinelGuard implements StatefulGuard {

    /**
     * @var SentinelCore
     */
    private $sentinel;

    /**
     * Sentinel constructor.
     * @param SentinelCore $sentinel
     */
    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        return $this->sentinel->check();
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return $this->sentinel->guest();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        return $this->sentinel->getUser();
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {
        return $this->sentinel->getUser()->getUserId();
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return $this->sentinel->authenticate($credentials);
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        $this->sentinel->setUser($user);
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool $remember
     * @param  bool $login
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false, $login = true)
    {
        return (bool) $this->sentinel->authenticate($credentials, $remember);
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param  array $credentials
     * @return bool
     */
    public function once(array $credentials = [])
    {
        return (bool) $this->sentinel->stateless($credentials);
    }

    /**
     * Log a user into the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  bool $remember
     * @return void
     */
    public function login(Authenticatable $user, $remember = false)
    {
        $this->sentinel->login($user, $remember);
    }

    /**
     * Log the given user ID into the application.
     *
     * @param  mixed $id
     * @param  bool $remember
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function loginUsingId($id, $remember = false)
    {
        $user = $this->sentinel->getUserRepository()->findById($id);
        return $this->login($user, $remember);
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param  mixed $id
     * @return bool
     */
    public function onceUsingId($id)
    {
        $user = $this->sentinel->getUserRepository()->findById($id);
        return $this->sentinel->stateless($user);
    }

    /**
     * Determine if the user was authenticated via "remember me" cookie.
     *
     * @return bool
     */
    public function viaRemember()
    {
        $user = $this->sentinel->getUser();
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        $this->sentinel->logout();
    }
}
