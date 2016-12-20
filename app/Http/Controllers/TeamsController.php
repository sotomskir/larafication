<?php

namespace Larafication\Http\Controllers;

use Illuminate\Http\Request;
use Larafication\Models\Team;
use Larafication\Models\Users\User;

class TeamsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the list of teams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Show single team.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $users = User::all();
        $team->load('leader', 'members');
        return view('teams.show', compact('team', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('teams.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
        $team = new Team($request->all());
        $team->setTeamLeader(User::find($request->leader));
        $team->save();
        return redirect('/teams/' . $team->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $users = User::all();
        return view('teams.edit', compact('team', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        $team->update($request->all());
        $team->setTeamLeader(User::find($request->leader));
        $team->save();
        return redirect('/teams/' . $team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect('/teams');
    }

    /**
     * Remove member from a team.
     *
     * @param  Team $team
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function removeMember(Team $team, User $user)
    {
        $team->removeMembers($user);
        return redirect("/teams/$team->id");
    }

    /**
     * Add a team member.
     *
     * @param Request $request
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function addMember(Request $request, Team $team)
    {
        $user = $request->user;
        $team->addMembers($user);
        return redirect("/teams/$team->id");
    }

}
