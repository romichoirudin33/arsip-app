@extends('layouts.app')

@section('title', 'Setting Reminder')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="{{ route('reminder.create') }}"
                   data-target="#create" data-toggle="modal"
                   class="btn btn-primary btn-xs">
                    <span class="fa fa-plus"> </span> Ganti
                </a>
                <div class="modal fade" id="create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <h5>
                    <strong>Reminder Setiap <span class="badge">{{ $data->name }}</span></strong>
                </h5>
            </center>
        </div>
    </div>

@endsection

@section('js')
    @include('layouts.includes.validetta-js')
@endsection