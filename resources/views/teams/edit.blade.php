@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Team: {{ $team->name }}</h1>
                <div class="btn-group">
                    <a href="/teams/{{ $team->id }}" class="btn btn-default">Cancel</a>
                </div>
                <form action="/teams/{{ $team->id }}" method="post">
                    {{ csrf_field() }}
                    <label>Team name</label>
                    <input type="text" name="name"/>

                    <input type="submit" value="Save"/>
                </form>

            </div>
        </div>
    </div>
@endsection
