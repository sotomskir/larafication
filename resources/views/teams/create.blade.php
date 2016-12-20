@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create new team</h1>
                <div class="btn-group">
                    <a href="/teams" class="btn btn-default">Back to teams</a>
                </div>
                <form action="/teams" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="team-name">Team name</label>
                        <input type="text" id="team-name" name="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="team-leader">Team leader</label>
                        <select id="team-leader" name="leader" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name.', '.$user->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save"/>
                </form>

            </div>
        </div>
    </div>
@endsection
