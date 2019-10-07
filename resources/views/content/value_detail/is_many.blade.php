@extends('layouts.app')

@section('title', $kategori->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')
    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>{{ $kategori->name }}</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" id="form"
                  enctype="multipart/form-data" action="{{ route('value.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="kategori" value="{{ $kategori->id }}">
                <input type="hidden" name="personel" value="{{ $personel->id }}">
                <div class="row">
                    <div class="col-md-10">
                        @foreach($kategori->detailKategori as $det)
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ $det->name }}</label>
                                <div class="col-md-8">
                                    <input type="{{ $det->file == '1' ? 'file' : 'text' }}"
                                           class="form-control input-sm square"
                                           name="detail_{{ $det->id }}"
                                           data-validetta="{{ $det->required == '1' ? 'required' : '' }}"
                                           autocomplete="off">
                                </div>
                            </div>
                        @endforeach

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