@extends('layouts.app')

@section('title', 'Reset Password')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')
    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>MASUKKAN PASSWORD BARU</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" id="form"
                  action="{{ route('users.update_reset', ['id' => $data->id]) }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">USERNAME</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       value="{{ $data->username }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">PASSWORD BARU</label>
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
                                <button class="btn btn-primary square" type="submit">
                                    <span class="fa fa-check"></span> UBAH</button>
                                <a href="{{ url('user') }}"
                                   class="btn btn-default square" >BATAL
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
