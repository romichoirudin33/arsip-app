@extends('layouts.app')

@section('title', 'User Administrator')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')
    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>TAMBAH DATA USER ADMIN</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" id="form"
                  enctype="multipart/form-data" action="{{ route('users.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-4 control-label">NAMA LENGKAP</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="name" value="{{ old('name') }}"
                                       data-validetta="required"
                                       autocomplete="off"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">USERNAME</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="username"
                                       data-validetta="required"
                                       autocomplete="off"
                                       value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">EMAIL</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control input-sm square"
                                       name="email"
                                       data-validetta="required"
                                       autocomplete="off"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">ALAMAT</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="alamat"
                                       autocomplete="off"
                                       value="{{ old('alamat') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">NO. TELP</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="no_telp"
                                       value="{{ old('no_telp') }}"
                                       autocomplete="off"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">PASSWORD</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control input-sm square"
                                       name="password"
                                       data-validetta="required"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">ULANGI PASSWORD</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control input-sm square"
                                       data-validetta="required,equalTo[password]"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn-primary square" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    @include('layouts.includes.validetta-js')
@endsection