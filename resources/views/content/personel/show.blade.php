@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('title', 'Detail Personel')

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square mar-litle">
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <td>NAMA PERSONEL</td>
                    <td>: {{ $data->nama }}</td>
                    <td width="50%" rowspan="6">
                        <center>
                            <img src="{{ asset('assets/upload/'. $data->foto) }}" alt="">
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: {{ $data->nip }}</td>
                </tr>
                <tr>
                    <td>TEMPAT, TGL LAHIR</td>
                    <td>: {{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td>TMT PENSIUN</td>
                    <td>: {{ $data->tgl_pensiun }}</td>
                </tr>
                <tr>
                    <td>TMT PANGKAT</td>
                    <td>: {{ $data->tmt_pangkat }}</td>
                </tr>
                <tr>
                    <td>TMT BERKALA</td>
                    <td>: {{ $data->tmt_berkala }}</td>
                </tr>
            </table>
        </div>
    </div>

    @foreach($kategori as $kat)
        <div class="panel panel-default square mar-litle">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead style="font-size: 13px; font-weight: bold">
                    <tr>
                        <td colspan="{{ $kat->detailKategori->count() + 1 }}">{{ $kat->name }}
                            <a href="{{ url('personel/bahasa/') }}"><span class="fa fa-pencil"> </span>
                            </a>
                        </td>
                    </tr>
                    @if($kat->is_many == '1')
                        @if($kat->detailKategori->count() > 0)
                            <tr>
                                <td width="50">NO</td>
                                @foreach($kat->detailKategori as $val)
                                    <td>{{ strtoupper($val->name) }}</td>
                                @endforeach
                            </tr>
                        @endif
                    @endif
                    </thead>
                    <tbody>
                    @if($kat->is_many == '0')
                        @foreach($kat->detailKategori as $val)
                            <tr>
                                <td width="40%">{{ $val->name }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection

@section('js')

@endsection