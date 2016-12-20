@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Team: {{ $team->name }}</h1>
                <form method="post" action="/teams/{{ $team->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="btn-group">
                        <a href="/teams/{{ $team->id }}/edit" class="btn btn-default">Edit</a>
                        <input type="submit" class="btn btn-danger" value="Delete team"
                               onClick="return confirm('Are you sure?')"/>
                    </div>
                </form>
                <h3>Team leader: {{ $team->leader ? $team->leader->name : '' }}</h3>
                <h3>List of team members:</h3>
                <form action="/teams/{{ $team->id }}/members" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="input-group">
                        <select name="user" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="Add as member">
                        </span>
                    </div>

                </form>

                <hr>

                <ul class="list-group">
                    @foreach($team->members as $member)
                        <li class="list-group-item">
                            {{ $member->name }}
                            {{ $member->email }}
                            <a href="/teams/{{ $team->id }}/members/{{ $member->id }}/remove"
                               class="btn btn-xs btn-danger pull-right"
                               onClick="return confirm('Are you sure?')">
                                Remove
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
