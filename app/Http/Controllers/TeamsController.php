<?php

namespace Larafication\Http\Controllers;

use Illuminate\Http\Request;
use Larafication\Models\Team;

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
        $team->load('leader', 'members');
        return view('teams.show', ['team' => $team]);
    }
}
