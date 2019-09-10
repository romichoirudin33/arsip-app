@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default square">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-left">
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="fa fa-history"></span> Data Riwayat<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('personel/riwayat-dikpol/'.$personel->uuid) }}">
                                                Riwayat Dikpol
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/riwayat-dikum/'.$personel->uuid) }}">
                                                Riwayat Dikum
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/riwayat-dikbangpes/'.$personel->uuid) }}">
                                                Riwayat Dikbangpes
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/riwayat-pangkat/'.$personel->uuid) }}">
                                                Riwayat Pangkat
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/riwayat-jabatan/'.$personel->uuid) }}">
                                                Riwayat Jabatan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/smk/'.$personel->uuid) }}">
                                                Riwayat SMK (POLRI) / SKP (PNS)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/sertifikat/'.$personel->uuid) }}">
                                                Data Berkala Polisi
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="fa fa-tasks"></span> Penugasan<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('personel/penugasan-luar-negeri/'.$personel->uuid) }}">
                                                Penugasan Khusus Luar Negeri
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/penugasan-dalam-negeri/'.$personel->uuid) }}">
                                                Penugasan Khusus Dalam Negeri
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="fa fa-briefcase"></span> Kemampuan<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('personel/bahasa/'.$personel->uuid) }}">
                                                Kecakapan Bahasa
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/kemampuan/'.$personel->uuid) }}">
                                                Kemampuan Olahraga
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/brevet/'.$personel->uuid) }}">
                                                Perolehan Tanda Jasa
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="fa fa-child"></span> Keluarga<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('personel/keluarga/'.$personel->uuid) }}">
                                                Data Keluarga
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/anak/'.$personel->uuid) }}">
                                                Data Anak
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/data-lain/form-edit/'. $personel->dataLain->id .'/'. $personel->uuid) }}">
                                                Data Lain
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('personel/dokumen/'.$personel->uuid) }}">
                                                Dokumen Lain
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="panel panel-default square mar-litle">
                    <div class="panel-heading">
                        DAFTAR RIWAYAT HIDUP
                        <div class="pull-right">
                            <a href="{{ url('personel/edit/'.$personel->uuid) }}" style="text-decoration: none" data-placement="top"
                               title="Edit Data Personel">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a target="_blank" href="{{ url('personel/report/'.$personel->uuid) }}"
                               data-toggle="tooltip" data-placement="top" title="Downlaod PDF format">
                                <span class="fa fa-file-pdf-o"></span>
                            </a>
                            <a href="{{ url('personel/add') }}" style="text-decoration: none" data-placement="top"
                               title="Catat Personel Baru">
                                <span class="fa fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('status'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Pemberitahuan !</strong> {{ Session::get('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                       <div class="row">
                           <div class="col-md-8">
                               <div class="form-group">
                                   <label for="nama" class="col-md-5 control-label">NAMA</label>
                                   <label for="nama" class="col-md-7 control-label">
                                       <small>{{ ucfirst($personel->nama) }}</small>
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="nip" class="col-md-5 control-label">NRP/NIP</label>
                                   <label for="nip" class="col-md-7 control-label">
                                       @if($personel->nip != "")
                                       <small>{{ ucfirst($personel->nip) }}</small>
                                       @else
                                       -
                                       @endif
                                   </label>
                               </div>
                               <?php
                               $pangkat = $personel->riwayatPangkat()->orderBy('id', 'desc')->first();
                               ?>
                               <div class="form-group">
                                   <label for="tamat_pangkat" class="col-md-5 control-label">PANGKAT</label>
                                   <label for="tamat_pangkat" class="col-md-7 control-label">
                                       @if($pangkat != null)
                                           <small>{{ ucfirst($pangkat->pangkat) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tamat_pangkat" class="col-md-5 control-label">TMT. PANGKAT</label>
                                   <label for="tamat_pangkat" class="col-md-7 control-label">
                                       @if($pangkat != null)
                                           <small>{{ date('d/m/Y', strtotime($pangkat->tamat)) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="jabatan" class="col-md-5 control-label">JABATAN</label>
                                   <label for="jabatan" class="col-md-7 control-label">
                                       <?php
                                       $jabatan = $personel->riwayatJabatan()->orderBy('id', 'desc')->first();
                                       ?>
                                           @if($jabatan == null)
                                               -
                                           @else
                                               {{ $jabatan->bagian }}
                                           @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tamat_jabatan" class="col-md-5 control-label">TMT. JABATAN</label>
                                   <label for="tamat_jabatan" class="col-md-7 control-label">
                                       @if($jabatan != null)
                                           <small>{{ date('d/m/Y', strtotime($jabatan->tamat) ) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tempat_lahir" class="col-md-5 control-label">TPT. LAHIR</label>
                                   <label for="tempat_lahir" class="col-md-7 control-label">
                                       @if($personel->tempat_lahir != "")
                                           <small>{{ ucfirst($personel->tempat_lahir) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tgl_lahir" class="col-md-5 control-label">TGL. LAHIR</label>
                                   <label for="tgl_lahir" class="col-md-7 control-label">
                                       @if($personel->tgl_lahir != "")
                                           <small>{{ date('d/m/Y', strtotime($personel->tgl_lahir) ) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="status" class="col-md-5 control-label">STATUS</label>
                                   <label for="status" class="col-md-7 control-label">
                                       @if($personel->dataLain->status != "")
                                           <small>{{ ucfirst($personel->dataLain->status) }}</small>
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tamat_pangkat" class="col-md-5 control-label">TMT. UKG</label>
                                   <label for="tamat_pangkat" class="col-md-7 control-label">
                                       @if($personel->ukg->tamat != null)
                                           <small>{{ date('d/m/Y', strtotime($personel->ukg->tamat)) }}</small>
                                       @else
                                           -
                                       @endif
                                       <div class="pull-right">
                                           <a href="{{ url('personel/ukg/form-edit/'. $personel->ukg->id .'/'. $personel->uuid) }}"
                                              data-toggle="tooltip"
                                              data-placement="left" title="Edit data kenaikan gaji berkala">
                                               <span class="fa fa-pencil"> </span>
                                           </a>
                                       </div>
                                   </label>
                               </div>
                               <div class="form-group">
                                   <label for="tamat_pangkat" class="col-md-5 control-label">ESTIMASI UKG</label>
                                   <label for="tamat_pangkat" class="col-md-7 control-label">
                                       @if($personel->ukg->tamat != null)
                                           <?php
                                           $t = strtotime($personel->ukg->tamat);
                                           $t2 = strtotime('+'.$personel->ukg->estimasi.' years', $t);
                                           ?>
                                           <small>
                                               {{ date('d/m/Y', $t2) }}
                                           </small>
                                           ({{ $personel->ukg->estimasi }}) th
                                       @else
                                           -
                                       @endif
                                   </label>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <center>
                                   <img src="{{ asset('assets/personel/'.$personel->foto) }}" alt="">
                               </center>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        {{--data riwayat dikpol, riwayat dikum, riwayat dikbangpes--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT DIKPOL
                                            <a href="{{ url('personel/riwayat-dikpol/'.$personel->uuid) }}">
                                                <span class="fa fa-pencil"> </span>
                                            </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatDikpol)>0)
                                        @foreach($personel->riwayatDikpol as $val)
                                            <tr>
                                                <td><a href="{{ url('personel/riwayat-dikpol/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalRiwayatDikpol{{ $val->id }}">
                                                        {{ strtoupper($val->macam_pendidikan) }}
                                                    </a>
                                                </td>
                                                <td>{{ strtoupper($val->tahun_lulus) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalRiwayatDikpol{{ $val->id }}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-3">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT DIKUM
                                            <a href="{{ url('personel/riwayat-dikum/'.$personel->uuid) }}">
                                                <span class="fa fa-pencil"> </span>
                                            </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatDikum)>0)
                                        @foreach($personel->riwayatDikum as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/riwayat-dikum/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalRiwayatDikum{{ $val->id }}">
                                                        {{ strtoupper($val->macam_pendidikan) }}
                                                    </a>
                                                </td>
                                                <td>{{ strtoupper($val->tahun_lulus) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalRiwayatDikum{{ $val->id }}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT DIKBANGPES
                                            <a href="{{ url('personel/riwayat-dikbangpes/'.$personel->uuid) }}">
                                                <span class="fa fa-pencil"> </span>
                                            </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatDikbangpes)>0)
                                        @foreach($personel->riwayatDikbangpes as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/riwayat-dikbangpes/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalriayatDikbangpes{{ $val->id }}">
                                                        @if(strlen($val->pendidikan_kejuruan) > 30)
                                                            {{ substr(strtoupper($val->pendidikan_kejuruan), 0, 30)  }} ...
                                                        @else
                                                            {{ strtoupper($val->pendidikan_kejuruan) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>{{ strtoupper($val->tahun_lulus) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalriayatDikbangpes{{ $val->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--data kecakapan bahasa, riwayat pangkat--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="3">KECAKAPAN BAHASA
                                            <a href="{{ url('personel/bahasa/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->bahasa)>0)
                                        @foreach($personel->bahasa as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->macam_bahasa) }}</td>
                                                <td>{{ strtoupper($val->bahasa) }}</td>
                                                <td>{{ strtoupper($val->status)  }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT PANGKAT
                                            <a href="{{ url('personel/riwayat-pangkat/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatPangkat)>0)
                                        @foreach($personel->riwayatPangkat as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/riwayat-pangkat/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalriayatpangkat{{ $val->id }}">
                                                        @if(strlen($val->pangkat) > 30)
                                                            {{ substr(strtoupper($val->pangkat), 0, 30)  }} ...
                                                        @else
                                                            {{ strtoupper($val->pangkat) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($val->tamat)) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalriayatpangkat{{ $val->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--riwayat jabatan, dan foto--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT JABATAN
                                            <a href="{{ url('personel/riwayat-jabatan/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatJabatan)>0)
                                        @foreach($personel->riwayatJabatan as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/riwayat-jabatan/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalriayatjabatan{{ $val->id }}">
                                                        @if(strlen($val->bagian) > 30)
                                                            {{ substr(strtoupper($val->bagian), 0, 30)  }} ...
                                                        @else
                                                            {{ strtoupper($val->bagian) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($val->tamat != '')
                                                    {{ date('d/m/Y', strtotime($val->tamat)) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalriayatjabatan{{ $val->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">DATA BERKALA
                                            <a href="{{ url('personel/sertifikat/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->sertifikat)>0)
                                        @foreach($personel->sertifikat as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/sertifikat/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalsertifikat{{ $val->id }}">
                                                        @if(strlen($val->nama_sertifikat) > 30)
                                                            {{ substr(strtoupper($val->nama_sertifikat), 0, 30)  }} ...
                                                        @else
                                                            {{ strtoupper($val->nama_sertifikat) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($val->tamat)) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalsertifikat{{ $val->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">RIWAYAT SMK(POLRI) / SKP (PNS)
                                            <a href="{{ url('personel/smk/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->riwayatSmk)>0)
                                        @foreach($personel->riwayatSmk as $val)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('personel/smk/show/'.$val->id) }}" type="button"
                                                       data-toggle="modal" data-target="#modalSmk{{ $val->id }}">
                                                        @if(strlen($val->periode) > 30)
                                                            {{ substr(strtoupper($val->periode), 0, 30)  }} ...
                                                        @else
                                                            {{ strtoupper($val->periode) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>{{ strtoupper($val->tahun) }}</td>
                                            </tr>
                                            <div class="modal fade" id="modalSmk{{ $val->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--penugasan luar negeri dan dalam negeri--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="3">PENUGASAN KHUSUS LUAR NEGERI
                                            <a href="{{ url('personel/penugasan-luar-negeri/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataPenugasanLuarNegeri)>0)
                                        @foreach($personel->dataPenugasanLuarNegeri as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->instansi) }}</td>
                                                <td>{{ strtoupper($val->jabatan) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($val->tgl_sprin))  }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="3">PENUGASAN KHUSUS DALAM NEGERI
                                            <a href="{{ url('personel/penugasan-dalam-negeri/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataPenugasanOps)>0)
                                        @foreach($personel->dataPenugasanOps as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->instansi) }}</td>
                                                <td>{{ strtoupper($val->jabatan) }}</td>
                                                <td>{{ date('d/m/Y', strtotime($val->tgl_sprin))  }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--perolehan tanda jasa dan kemampuan olahraga--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">PEROLEHAN TANDA JASA
                                            <a href="{{ url('personel/brevet/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataKemampuanBrevet)>0)
                                        @foreach($personel->dataKemampuanBrevet as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->tanda_jasa) }}</td>
                                                <td>{{ strtoupper($val->no_kep) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">KEMAMPUAN OLAHRAGA
                                            <a href="{{ url('personel/kemampuan/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataKemampuan)>0)
                                        @foreach($personel->dataKemampuan as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->macam_kemampuan) }}</td>
                                                <td>{{ strtoupper($val->keterangan) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--data keluarga dan data anak--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="3">DATA KELUARGA
                                            <a href="{{ url('personel/keluarga/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataKeluarga)>0)
                                        @foreach($personel->dataKeluarga as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->nama) }}</td>
                                                <td>
                                                    @if($val->jenis_kelamin == "PEREMPUAN")
                                                        p
                                                    @else
                                                        L
                                                    @endif
                                                </td>
                                                <td>{{ strtoupper($val->keterangan) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead style="font-size: 13px; font-weight: bold">
                                    <tr>
                                        <td colspan="2">DATA ANAK
                                            <a href="{{ url('personel/anak/'.$personel->uuid) }}"><span class="fa fa-pencil"> </span> </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($personel->dataAnak)>0)
                                        @foreach($personel->dataAnak as $val)
                                            <tr>
                                                <td>{{ strtoupper($val->nama) }}</td>
                                                <td>
                                                    @if($val->jenis_kelamin == "PEREMPUAN")
                                                        P
                                                    @else
                                                        L
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--data lain--}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square mar-litle">
                    <div class="panel-body">
                        <table class="table">
                            <thead style="font-size: 13px; font-weight: bold">
                            <tr>
                                <td colspan="6">DATA LAIN
                                    <a href="{{ url('personel/data-lain/form-edit/'. $personel->dataLain->id .'/'. $personel->uuid) }}"
                                       data-toggle="tooltip"
                                       data-placement="left" title="Edit data lain">
                                        <span class="fa fa-pencil"> </span>
                                    </a>
                                </td>
                            </tr>
                            </thead>
                            <tbody style="font-size: 12px">
                                <tr>
                                    <td>STATUS</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->status!= "")
                                            <small>{{ ucfirst($personel->dataLain->status) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>SUKU</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->suku != "")
                                            <small>{{ ucfirst($personel->dataLain->suku) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>AGAMA</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->agama!= "")
                                            <small>{{ ucfirst($personel->dataLain->agama) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>KELAMIN</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->kelamin != "")
                                            <small>{{ ucfirst($personel->dataLain->kelamin) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>ALAMAT RUMAH</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->alamat_rumah != "")
                                            <small>{{ ucfirst($personel->dataLain->alamat_rumah) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>TELEPON RUMAH</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->telp_rumah != "")
                                            <small>{{ ucfirst($personel->dataLain->telp_rumah) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>ALAMAT KANTOR</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->alamat_kantor != "")
                                            <small>{{ ucfirst($personel->dataLain->alamat_kantor) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>TELEPON KANTOR</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->telp_kantor != "")
                                            <small>{{ ucfirst($personel->dataLain->telp_kantor) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>NO. HANDPHONE</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->no_telp != "")
                                            <small>{{ ucfirst($personel->dataLain->no_telp) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>E-MAIL</td>
                                    <td colspan="2">
                                        @if($personel->dataLain->email != "")
                                            <small>{{ ucfirst($personel->dataLain->email) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>TINGGI BADAN</td>
                                    <td>
                                        @if($personel->dataLain->tinggi != "")
                                            <small>{{ ucfirst($personel->dataLain->tinggi) }} CM</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>UKURAN TOPI</td>
                                    <td>
                                        @if($personel->dataLain->ukuran_topi != "")
                                            <small>{{ ucfirst($personel->dataLain->ukuran_topi) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>ASABRI</td>
                                    <td>
                                        @if($personel->dataLain->asabri != "")
                                            <small>{{ ucfirst($personel->dataLain->asabri) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>BERAT BADAN</td>
                                    <td>
                                        @if($personel->dataLain->berat != "")
                                            <small>{{ ucfirst($personel->dataLain->berat) }} KG</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>UKURAN SEPATU</td>
                                    <td>
                                        @if($personel->dataLain->ukuran_sepatu != "")
                                            <small>{{ ucfirst($personel->dataLain->ukuran_sepatu) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>NPWP</td>
                                    <td>
                                        @if($personel->dataLain->npwp != "")
                                            <small>{{ ucfirst($personel->dataLain->npwp) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>WARNA KULIT</td>
                                    <td>
                                        @if($personel->dataLain->warna_kulit != "")
                                            <small>{{ ucfirst($personel->dataLain->warna_kulit) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>UKURAN CELANA</td>
                                    <td>
                                        @if($personel->dataLain->ukuran_celana != "")
                                            <small>{{ ucfirst($personel->dataLain->ukuran_celana) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>KARKES</td>
                                    <td>
                                        @if($personel->dataLain->karkes != "")
                                            <small>{{ ucfirst($personel->dataLain->karkes) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>WARNA MATA</td>
                                    <td>
                                        @if($personel->dataLain->warna_mata != "")
                                            <small>{{ ucfirst($personel->dataLain->warna_mata) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>UKURAN BAJU</td>
                                    <td>
                                        @if($personel->dataLain->ukuran_baju != "")
                                            <small>{{ ucfirst($personel->dataLain->ukuran_baju) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>KARSU</td>
                                    <td>
                                        @if($personel->dataLain->karsu != "")
                                            <small>{{ ucfirst($personel->dataLain->karsu) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>GOL. DARAH</td>
                                    <td>
                                        @if($personel->dataLain->golongan_darah != "")
                                            <small>{{ ucfirst($personel->dataLain->golongan_darah) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>NO SERI KTA</td>
                                    <td>
                                        @if($personel->dataLain->no_kta != "")
                                            <small>{{ ucfirst($personel->dataLain->no_kta) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>KARPEG</td>
                                    <td>
                                        @if($personel->dataLain->karpeg != "")
                                            <small>{{ ucfirst($personel->dataLain->karpeg) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>SIDIK JARI 1</td>
                                    <td>
                                        @if($personel->dataLain->sidik_jari_1 != "")
                                            <small>{{ ucfirst($personel->dataLain->sidik_jari_1) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>JENIS RAMBUT</td>
                                    <td>
                                        @if($personel->dataLain->jenis_rambut != "")
                                            <small>{{ ucfirst($personel->dataLain->jenis_rambut) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>NO.KK</td>
                                    <td>
                                        @if($personel->dataLain->no_kk != "")
                                            <small>{{ ucfirst($personel->dataLain->no_kk) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>SIDIK JARI 2</td>
                                    <td>
                                        @if($personel->dataLain->sidik_jari_2 != "")
                                            <small>{{ ucfirst($personel->dataLain->sidik_jari_2) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>WARNA RAMBUT</td>
                                    <td>
                                        @if($personel->dataLain->warna_rambut != "")
                                            <small>{{ ucfirst($personel->dataLain->warna_rambut) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>BPJS</td>
                                    <td>
                                        @if($personel->dataLain->bpjs != "")
                                            <small>{{ ucfirst($personel->dataLain->bpjs) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>NO. KTP/NIK</td>
                                    <td>
                                        @if($personel->dataLain->no_ktp != "")
                                            <small>{{ ucfirst($personel->dataLain->no_ktp) }}</small>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <small>
                                <b>
                                    {{ substr((microtime(true) - LARAVEL_START), 0,8)  }} seconds to render
                                </b>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
