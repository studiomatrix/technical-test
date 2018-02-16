@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the Cook Dashboard!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Availabilities</h3>
                @if($availabilities->count() > 0)
                    @foreach($availabilities as $availability)
                        <div class="col-md-3">
                            <div class="panel panel-{{ $availability->hasApprovedCookingRequest() ? 'success' : 'default' }}">
                                <div class="panel-heading">
                                    <h3 class="pane-title">{{ $availability->day_name }}</h3>
                                </div>
                                <div class="panel-body">
                                    @if ($availability->hasApprovedCookingRequest())
                                        <h4>{{ $availability->getApprovedCookingRequest()->user->name }}</h4>
                                        <h5>{{ $availability->getApprovedCookingRequest()->user->email }}</h5>
                                    @else
                                        <p class="text-info">No cooking requests confirmed for this day.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-danger">You don't have any availabilities.</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Cooking Requests</h3>
                {{ $cookingRequests->links() }}
            </div>
                @if($cookingRequests->total() > 0)
                    @foreach($cookingRequests as $cookingRequest)
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading cook--request-heading">
                                <h3 class="cook--request-title panel-title">Request From {{ $cookingRequest->user->name }}</h3>
                                <form class="cook--request-delete" method="post" action="{{ route('cook.cooking_request.delete', ['cookingRequest' => $cookingRequest->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="panel-body">
                                <h4>Request to cook on {{ $cookingRequest->availability->getDayName() }}</h4>
                                <p>Currently {{ $cookingRequest->approved == 0 ? 'Not Approved' : 'Approved' }}</p>
                                @if($cookingRequest->approved == 0)
                                    @if ($cookingRequest->cook->hasCookingRequestForDay($cookingRequest->availability->day))
                                        <form method="post" action="{{ route('cook.cooking_request.approve_and_replace', ['cookingRequest' => $cookingRequest->id]) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-warning">
                                                <i class="glyphicon glyphicon-ok"></i>&nbsp;Replace Existing Request on Day
                                            </button>
                                        </form>
                                    @else
                                    <form method="post" action="{{ route('cook.cooking_request.approve', ['cookingRequest' => $cookingRequest->id]) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success">
                                            <i class="glyphicon glyphicon-ok"></i>&nbsp;Approve Request
                                        </button>
                                    </form>
                                    @endif
                                @else
                                    <form method="post" action="{{ route('cook.cooking_request.unapprove', ['cookingRequest' => $cookingRequest->id]) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="glyphicon glyphicon-remove"></i>&nbsp;Unapprove Request
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        {{ $cookingRequests->links() }}
                    </div>
                @else
                    <div class="col-md-12 alert alert-warning">
                        <p>No cooking requests at this time.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection