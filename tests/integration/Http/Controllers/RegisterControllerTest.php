<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Larafication\Models\Users\User;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function response_status_is_ok()
    {
        $this->visit('/register')
            ->assertResponseOk();
    }

    /** @test */
    public function its_register_action_renders_correctly()
    {
        $this->visit('/register')
            ->see('Register')
            ->see('Name')
            ->see('E-Mail Address')
            ->see('Password')
            ->see('Confirm Password');
    }

    /** @test */
    public function it_can_register_new_user()
    {
        $data = [
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

        $this->post('/register', $data);

        $user = User::whereName('user');
        $this->assertNotNull($user);
    }

    /** @test */
    public function it_allows_activated_user_to_login()
    {
        $user = factory(User::class)->create();
        Sentinel::activate($user);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }
}
