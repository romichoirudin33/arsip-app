@extends('layouts.auth')

@section('content')
<div class="container" style="margin-top: 8%">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default square">
                <div class="panel-heading" style="text-align: center">
                    <img src="{{ asset('assets/img/satker.jpeg') }}" alt="" style="max-width: 100px">
                    <br>
                    <h4><strong>{{ config('app.name') }}</strong> {{ config('app.release') }}</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control square" name="username"
                                       value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control square" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary square" >
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer" style="text-align: center">
                    <h4><strong>POLDA NTB</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
