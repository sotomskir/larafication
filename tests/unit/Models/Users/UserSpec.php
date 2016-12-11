<?php

namespace unit\Larafication\Models\Users;

use Larafication\Models\Users\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }
}
