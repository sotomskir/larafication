@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Team: {{ $team->name }}</h1>
                <hr>
                <form action="/teams/{{ $team->id }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="team-name">Team name</label>
                        <input type="text" id="team-name" name="name" class="form-control" value="{{ $team->name }}"/>
                    </div>

                    <div class="form-group">
                        <label for="team-leader">Team leader</label>
                        <select id="team-leader" name="leader" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name.', '.$user->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-group">
                        <a href="/teams/{{ $team->id }}" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-primary" value="Save"/>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
