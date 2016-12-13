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
                    <label>Team name</label>
                    <input type="text" name="name"/>

                    <input type="submit" value="Save"/>
                </form>
            </div>
        </div>
    </div>
@endsection
