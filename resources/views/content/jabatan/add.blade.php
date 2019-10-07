@extends('layouts.app')

@section('title', 'Setting Jabatan')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('content')
    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>TAMBAH KEPALA JABATAN</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" id="form"
                  enctype="multipart/form-data" action="{{ route('kepala-jabatan.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-md-4 control-label">JABATAN</label>
                            <div class="col-md-8">
                                <select name="name" id="name" class="form-control input-sm square" required>
                                    @if(old('name'))
                                        <option value="{{ old('name') }}">{{ old('name') }}</option>
                                    @else
                                        <option value="">-- Pilih --</option>
                                    @endif
                                    <option value="KARO RENA">KARO RENA</option>
                                    <option value="PS KASUBBAG RENMIN">PS KASUBBAG RENMIN</option>
                                    <option value="KAURREN">KAURREN</option>
                                    <option value="PAMIN 1">PAMIN 1</option>
                                    <option value="BAMIN">BAMIN</option>

                                    <option value="PS KAURMINTU">PS KAURMINTU</option>
                                    <option value="PS PAMIN 2">PS PAMIN 2</option>
                                    <option value="PS PAMIN 3">PS PAMIN 3</option>

                                    <option value="PS KAURKEU">PS KAURKEU</option>
                                    <option value="PAMIN 4">PAMIN 4</option>
                                    <option value="PAMIN 5">PAMIN 5</option>
                                    <option value="PAMIN 6">PAMIN 6</option>
                                    <option value="PAMIN 7">PAMIN 7</option>

                                    <option value="PS KABAG STRAJEMEN">PS KABAG STRAJEMEN</option>

                                    <option value="PS KASUBBAG STRABANG">PS KASUBBAG STRABANG</option>
                                    <option value="PAUR SUBBAHSTRABANG">PAUR SUBBAHSTRABANG</option>

                                    <option value="PS KASUBBAG SISJEMEN">PS KASUBBAG SISJEMEN</option>
                                    <option value="PAUR SUBBAHSISJEMEN">PAUR SUBBAHSISJEMEN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">KEPALA JABATAN</label>
                            <div class="col-md-8">
                                <select name="personel_id" id="personel_id" class="form-control input-sm square"
                                        required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($personel as $p)
                                        <option value="{{ $p->id }}">{{ ucfirst($p->nama) }}</option>
                                    @endforeach
                                </select>
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