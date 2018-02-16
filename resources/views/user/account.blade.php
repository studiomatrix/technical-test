@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.account.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password (leave blank to not change)</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;Update Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection