@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Team: {{ $team->name }}</h1>
                <div class="btn-group">
                    <a href="/teams" class="btn btn-default">Back to teams</a>
                    <a href="/teams/{{ $team->id }}/edit" class="btn btn-default">Edit</a>
                </div>
                <h3>Team leader: {{ $team->leader }}</h3>
                <h3>List of team members:</h3>
                <ul>
                    @foreach($team->members as $member)
                        <li>
                            {{ $member->name }}
                            {{ $member->email }}
                            <a href="/teams/{{ $team->id }}/members/{{ $member->id }}/remove" class="btn btn-xs btn-default">Remove</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
