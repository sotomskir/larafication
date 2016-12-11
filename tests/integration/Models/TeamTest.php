<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Larafication\Models\Team;
use Larafication\Models\Users\User;

class TeamTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /** @test */
    public function it_has_a_name()
    {
        $team = new Team(['name' => 'Team1']);

        $this->assertEquals('Team1', $team->name);
    }

    /** @test */
    public function it_can_add_a_member()
    {
        $team = factory(Team::class)->create();
        $user = factory(User::class)->create();

        $team->addMembers($user);

        $this->assertCount(1, $team->members()->get());
    }

    /** @test */
    public function it_prevents_from_passing_null_value_when_adding_member()
    {
        $team = factory(Team::class)->create();

        $this->expectException('InvalidArgumentException');
        $team->addMembers(null);
    }

    /** @test */
    public function it_can_add_many_members_at_once()
    {
        $team = factory(Team::class)->create();
        $users = factory(User::class, 3)->create();

        $team->addMembers($users);

        $this->assertCount(3, $team->members()->get());
    }

    /** @test */
    public function it_can_remove_a_member()
    {
        $team = factory(Team::class)->create();
        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->addMembers($userOne);
        $team->addMembers($userTwo);

        $this->assertCount(2, $team->members()->get());

        $team->removeMembers($userOne);

        $this->assertCount(1, $team->members()->get());
    }

    /** @test */
    public function it_prevents_from_passing_null_when_removing_members()
    {
        $team = factory(Team::class)->create();

        $this->expectException('InvalidArgumentException');
        $team->removeMembers(null);
    }

    /** @test */
    public function it_can_remove_many_members_at_once()
    {
        $team = factory(Team::class)->create();
        $users = factory(User::class, 5)->create();
        $team->addMembers($users);
        $this->assertCount(5, $team->members()->get());

        $team->removeMembers($users->slice(0, 2));

        $this->assertCount(3, $team->members()->get());
    }

    /** @test */
    public function it_can_remove_all_members_at_once()
    {
        $team = factory(Team::class)->create();
        $users = factory(User::class, 5)->create();
        $team->addMembers($users);
        $this->assertCount(5, $team->members()->get());

        $team->removeAllMembers();

        $this->assertCount(0, $team->members()->get());
    }

    /** @test */
    public function it_can_set_team_leader()
    {
        $team = factory(Team::class)->create();
        $user = factory(User::class)->create();

        $team->setTeamLeader($user);
        $this->assertEquals($user->id, $team->leader->id);
    }

    /** @test */
    public function it_can_not_set_multiple_team_leaders()
    {
        $team = factory(Team::class)->create();
        $users = factory(User::class, 2)->create();

        $this->expectException(TypeError::class);
        $team->setTeamLeader($users);
    }

    /** @test */
    public function it_prevents_from_passing_null_when_setting_team_leader()
    {
        $team = factory(Team::class)->create();

        $this->expectException(TypeError::class);
        $team->setTeamLeader(null);
    }

    /** @test */
    public function it_can_unset_team_leader()
    {
        $team = factory(Team::class)->create();

        $team->unsetTeamLeader();

        $this->assertNull($team->leader);
    }
}
