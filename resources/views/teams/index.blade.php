@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Teams</h1>
                <div class="btn-group">
                    <a href="/teams/create" class="btn btn-primary">New Team</a>
                </div>

                <hr>

                <ul class="list-group">
                    @foreach($teams as $team)
                        <li class="list-group-item"><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
