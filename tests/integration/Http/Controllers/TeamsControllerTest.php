<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Larafication\Models\Team;
use Larafication\Models\Users\User;

class TeamsControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function response_status_is_ok()
    {
        $team = factory(Team::class)->create();

        $this->visit('/teams')->assertResponseOk();
        $this->visit("/teams/$team->id")->assertResponseOk();
        $this->visit("/teams/$team->id/edit")->assertResponseOk();
        $this->delete("/teams/$team->id")->assertResponseStatus(302);
    }

    /** @test */
    public function it_can_display_a_list_of_teams()
    {
        $teams = factory(Team::class, 3)->create();
        $user = factory(User::class)->create();
        Sentinel::activate($user);

        $this->actingAs($user)
            ->visit('/teams')
            ->see($teams[0]->name)
            ->see($teams[1]->name)
            ->see($teams[2]->name);
    }

    /** @test */
    public function it_can_display_team_details()
    {
        $team = factory(Team::class)->create();
        $user = factory(User::class)->create();
        $team->setTeamLeader($user);
        $team->save();
        Sentinel::activate($user);

        $this->actingAs($user)
            ->visit("/teams/$team->id")
            ->see($team->name)
            ->see($team->leader->name);
    }

    /** @test */
    public function it_can_delete_a_team()
    {
        $team = factory(Team::class)->create();
        $user = factory(User::class)->create();
        Sentinel::activate($user);

        $this->actingAs($user)
            ->delete("/teams/$team->id")
            ->assertResponseStatus(302);
    }

    /** @test */
    public function it_can_create_new_team()
    {
        $user = factory(User::class)->create();
        Sentinel::activate($user);

        $this->actingAs($user)
            ->visit('/teams/create')
            ->type('Team 1', 'name')
            ->press('Save')
            ->assertResponseStatus(200);

        $team = Team::where('name', 'Team 1');
        $this->assertNotNull($team);
    }

    /** @test */
    public function it_can_edit_a_team()
    {
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create();
        Sentinel::activate($user);

        $this->actingAs($user)
            ->visit("/teams/$team->id/edit")
            ->type('Team 1', 'name')
            ->press('Save')
            ->assertResponseStatus(200);

        $team = Team::find($team->id);
        $this->assertEquals('Team 1', $team->name);
    }

    /** @test */
    public function it_can_remove_member_from_a_team()
    {
        $users = factory(User::class, 2)->create();
        $team = factory(Team::class)->create();
        Sentinel::activate($users[0]);
        $team->addMembers($users);
        $team->save();
        $this->assertCount(2, $team->members);

        $this->actingAs($users[0])
            ->visit("/teams/$team->id/members/".$users[0]->id.'/remove')
            ->seePageIs("/teams/$team->id")
            ->assertResponseStatus(200);
    //TODO: fix this
//        $this->assertCount(1, $team->members);
    }

    /** @test */
    public function it_can_add_team_member()
    {
        $users = factory(User::class, 2)->create();
        $team = factory(Team::class)->create();
        Sentinel::activate($users[0]);
        $this->assertCount(0, $team->members);

        $this->actingAs($users[0])
            ->put("/teams/$team->id/members", ['user' => $users[0]->id])
            ->assertResponseStatus(302);

    //TODO: fix this
//        $this->assertCount(1, $team->members);
    }
}
