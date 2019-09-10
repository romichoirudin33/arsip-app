@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('title', 'Personel Baru')

@section('content')
    <div class="panel panel-default square">
        <div class="panel-heading">
            Data Personel
            <div class="pull-right">
                <a href="{{ route('personel.index') }}" class="btn btn-info">
                    <span class="fa fa-arrow-left"></span> Kembali
                </a>
            </div>
        </div>
        <div class="panel-body">
            {{--ini route nya belum--}}
            <form class="form-horizontal" id="form" method="POST" enctype="multipart/form-data"
                  action="{{ route('personel.store') }}">
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">
                                NAMA
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="nama" value="{{ old('nama') }}" data-validetta="required"
                                       placeholder="Contoh: Agus Susanto"
                                       autocomplete="off"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                NRP/NIP
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="nip" value="{{ old('nip') }}"
                                       placeholder="Contoh: 198106072006042006"
                                       data-validetta="required"
                                       autocomplete="off"
                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                TEMPAT. LAHIR
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control input-sm square"
                                       name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                       placeholder="Contoh: Mataram"
                                       data-validetta="required"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="col-md-4 control-label">
                                TGL. LAHIR
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <input type="text" class="form-control input-sm date"
                                           name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                           autocomplete="off"
                                           required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                FOTO PERSONEL
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <input id="foto" type="file" accept="image/*" class="form-control input-sm square"
                                       name="foto" value="{{ old('foto') }}"
                                       autocomplete="off"
                                       required>
                                <span class="help-block">
                                        <small>Format foto hanya berupa file gambar (jpg, png, dll)</small>
                                    </span>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                TMT PANGKAT
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <input type="text" class="form-control input-sm date"
                                           name="tmt_pangkat" value="{{ old('tmt_pangkat') }}"
                                           autocomplete="off"
                                           required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                TMT BERKALA
                                <small style="font-size: 8px;vertical-align: 60%">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"></span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <input type="text" class="form-control input-sm date"
                                           name="tmt_berkala" value="{{ old('tmt_berkala') }}"
                                           autocomplete="off"
                                           required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="col-md-4 control-label">
                                <small style="font-size: 12px">
                                    <span style="color: #ff645d;  " class="fa fa-asterisk"> wajib diisi</span>
                                </small>
                            </label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary square">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/validetta/validetta.js') }}"></script>
    <script src="{{ asset('assets/plugins/validetta/lang/validettaLang-ID.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.date').datepicker({
                clearBtn: true,
                orientation: "auto",
                language: "id",
                startView: 2
            });
            $('#form').validetta({
                realTime: true,
                display: 'inline',
                errorTemplateClass: 'validetta-inline',
            });
        });
    </script>
@endsection
