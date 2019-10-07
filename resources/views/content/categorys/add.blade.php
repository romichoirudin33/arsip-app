@extends('layouts.app')

@section('title', 'Kategori Baru')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')
    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>TAMBAH KATEGORI BARU</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" id="form"
                  enctype="multipart/form-data" action="{{ route('category.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-4 control-label">KETERANGAN</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="name" value="{{ old('name') }}"
                                       data-validetta="required"
                                       autocomplete="off"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">DATA BOLEH BANYAK</label>
                            <div class="col-md-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_many" value="1" checked="">Ya
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_many" value="0" >Tidak, Hanya satu
                                    </label>
                                </div>
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