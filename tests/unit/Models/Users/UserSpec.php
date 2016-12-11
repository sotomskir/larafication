<?php

namespace unit\Larafication\Models\Users;

use Larafication\Http\Controllers\UsersController;
use Larafication\Models\Users\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

}
