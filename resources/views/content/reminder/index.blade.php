@extends('layouts.app')

@section('title', 'Daftar Reminder')

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

    @if($berkala->count() > 0)
        <div class="panel panel-default square mar-litle">
            <div class="panel-heading">
                <center>
                    <h5>
                        <strong>
                            Berkala
                        </strong>
                    </h5>
                </center>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive">
                    <thead style="font-weight: bold">
                    <tr>
                        <td>NAMA NRP/NIP</td>
                        <td>TMT BERKALA</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($berkala as $item)
                        <tr>
                            <td>
                                <a href="{{ route('personel.show', ['id' => $item->uuid]) }}">
                                    {{ ucfirst($item->nama) }} / {{ ucfirst($item->nip) }}
                                </a>
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($item->tmt_berkala)) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($pangkat->count() > 0)
        <div class="panel panel-default square mar-litle">
            <div class="panel-heading">
                <center>
                    <h5>
                        <strong>
                            Pangkat
                        </strong>
                    </h5>
                </center>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive">
                    <thead style="font-weight: bold">
                    <tr>
                        <td>NAMA NRP/NIP</td>
                        <td>TMT PANGKAT</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pangkat as $item)
                        <tr>
                            <td>
                                <a href="{{ route('personel.show', ['id' => $item->uuid]) }}">
                                    {{ ucfirst($item->nama) }} / {{ ucfirst($item->nip) }}
                                </a>
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($item->tmt_pangkat)) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection

@section('js')
    @include('layouts.includes.validetta-js')
@endsection