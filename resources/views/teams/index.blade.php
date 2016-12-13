@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Teams</h1>
                    <div class="btn-group">
                        <a href="/teams/create" class="btn btn-default">New Team</a>
                    </div>
                <ul>
                @foreach($teams as $team)
                    <li><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
