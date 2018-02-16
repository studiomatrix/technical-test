@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <h1>Our Cooks</h1>
            {{ $cooks->links() }}
            @foreach($cooks as $cook)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $cook->user->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <em>Specialises in {{ $cook->speciality }}</em>
                        <p>{{ $cook->description }}</p>
                        @if (Auth::check())
                        <h4>Request cook for:</h4>
                        <div class="list-group">
                            @foreach($cook->getAvailabilities() as $availability)
                            <form method="post" action="{{ route('user.cooking_request.create') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="cook" value="{{ $cook->id }}"/>
                                <input type="hidden" name="availability" value="{{ $availability->id }}"/>
                                <input type="submit" id="cooks--submit" class="list-group-item" value="{{ $availability->day_name }}"/>
                            </form>
                            @endforeach
                        </div>
                        @else
                        <div class="alert alert-warning">
                            <p>You must be signed in to request a cook.</p>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            {{ $cooks->links() }}
        </div>
    </div>
@endsection