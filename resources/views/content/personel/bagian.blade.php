@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default square">
                    <div class="panel-heading">Login user terakhir</div>
                    <div class="panel-body">
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>{{ ucfirst($user->name) }} </strong>
                                </div>
                                <div class="col-md-6">
                                    <small>{{ $user->updated_at->diffForHumans() }}</small>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="panel panel-default square">
                    <div class="panel-heading">Informasi database</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3" style="text-align: right">{{ count($jmlUser) }}</div>
                            <div class="col-md-9">jumlah user admin</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" style="text-align: right">{{ count($jmlPersonil) }}</div>
                            <div class="col-md-9">seluruh personel</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="panel panel-default square">
                    <div class="panel-heading">
                        Daftar anggota personel pada bagian {{ $jabatan }}
                    </div>
                    <div class="panel-body">
                        @if(count($jmlPersonil) > 0)
                            <table class="table table-responsive">
                                <thead style="font-weight: bold">
                                <tr>
                                    <td colspan="2">
                                        <center>
                                        Nama Anggota Pada Bagian {{ ucfirst($jabatan) }}
                                        </center>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=0; ?>
                                @foreach($jmlPersonil as $item)
                                    <?php
                                    $jabatans = $item->riwayatJabatan()->orderBy('tamat', 'desc')->first();
                                    ?>
                                    @if($jabatans != null)
                                    @if(strcasecmp($jabatans->jabatan, $jabatan) == 0)
                                        <?php $no+=1; ?>
                                    <tr style="font-size: 12px">
                                        <td>
                                            <a href="{{ url('personel/detail/'.$item->uuid) }}">
                                                {{ ucfirst($jabatans->personel->nama) }}
                                            </a>
                                        </td>
                                        <td class="pull-right" width="50px">
                                            <a href="{{ url('personel/edit/'.$item->uuid) }}"><span class="fa fa-edit"></span></a>
                                            <a href="{{ url('personel/detail/'.$item->uuid) }}"><span class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                @endforeach
                                <tr>
                                    @if($no == 0)
                                    <td colspan="2">
                                        <span class="label label-primary">Tidak ada anggota pada anggota ini</span>
                                    </td>
                                    @else
                                    <td colspan="2">Jumlah Anggota {{ $no }} org </td>
                                    @endif
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
                        @else
                            <span class="label label-warning">
                                Tidak terdapat data personil
                            </span>
                            <hr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
