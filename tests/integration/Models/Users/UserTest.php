<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Larafication\Models\Team;
use Larafication\Models\Users\User;

class UsersTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /** @test */
    public function it_can_join_a_team()
    {
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();

        $user->joinTeams($team);

        $this->assertEquals($team->id, $user->teams()->first()->id);
    }

    /** @test */
    public function it_prevents_from_passing_a_null_value_to_join_teams_method()
    {
        $user = factory(User::class)->create();

        $this->expectException('InvalidArgumentException');
        $user->joinTeams(null);
    }

    /** @test */
    public function it_can_join_multiple_teams_at_once()
    {
        $user = factory(User::class)->create();
        $teams = factory(Team::class, 3)->create();

        $user->joinTeams($teams);

        $this->assertCount(3, $user->teams()->get());
    }

    /** @test */
    public function it_can_leave_a_team()
    {
        $user = factory(User::class)->create();
        $teams = factory(Team::class, 4)->create();
        $user->joinTeams($teams);
        $this->assertCount(4, $user->teams()->get());

        $user->leaveTeams($teams[0]);

        $this->assertCount(3, $user->teams()->get());
    }

    /** @test */
    public function it_prevents_from_passing_null_value_to_leave_teams_method()
    {
        $user = factory(User::class)->create();

        $this->expectException('InvalidArgumentException');
        $user->leaveTeams(null);
    }

    /** @test */
    public function it_can_leave_multiple_teams_at_once()
    {
        $user = factory(User::class)->create();
        $teams = factory(Team::class, 4)->create();
        $user->joinTeams($teams);
        $this->assertCount(4, $user->teams()->get());

        $user->leaveTeams($teams->slice(0, 3));

        $this->assertCount(1, $user->teams()->get());
    }

    /** @test */
    public function it_can_leave_all_teams_at_once()
    {
        $user = factory(User::class)->create();
        $teams = factory(Team::class, 3)->create();
        $user->joinTeams($teams);
        $this->assertCount(3, $user->teams()->get());

        $user->leaveAllTeams();

        $this->assertCount(0, $user->teams()->get());
    }
}
