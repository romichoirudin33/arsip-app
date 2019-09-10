@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default square">
                    <div class="panel-heading">
                        Daftar Personel Polri
                        <div class="pull-right">
                            <a href="{{ url('personel') }}" style="text-decoration: none">
                                <span class="fa fa-users"></span> Lihat seluruh data
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(count($personel) > 0)
                            <table class="table table-responsive" id="tables">
                                <thead style="font-weight: bold">
                                <tr>
                                    <td>No</td>
                                    <td>NAMA NRP/NIP</td>
                                    <td>JABATAN</td>
                                    <td>PANGKAT</td>
                                    <td>TAMAT PANGKAT</td>
                                    <td>TAMAT BERKALA</td>
                                    <td>TGL LAHIR</td>
                                    <td>ESTIMASI PANGKAT</td>
                                    <td>ESTIMASI BERKALA</td>
                                    <td>ESTIMASI PENSIUN</td>
                                    <td>OPSI</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=0; ?>
                                @foreach($personel as $item)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no+=1 }}</td>
                                        <td>
                                            <a href="{{ url('personel/detail/'.$item->uuid) }}">
                                                {{ ucfirst($item->nama) }} {{ ucfirst($item->nip) }}
                                            </a>
                                        </td>
                                        <?php
                                        $jabatan = $item->riwayatJabatan()->orderBy('tamat', 'desc')->first();
                                        ?>
                                        <td>
                                            @if($jabatan == null)
                                                -
                                            @else
                                                {{ $jabatan->jabatan }}
                                            @endif
                                        </td>
                                        <?php
                                        $pangkat = $item->riwayatPangkat()->orderBy('tamat', 'desc')->first();
                                        ?>
                                        <td>
                                            @if($pangkat == null)
                                                -
                                            @else
                                                {{ $pangkat->pangkat }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($pangkat == null)
                                                -
                                            @else
                                                {{ $pangkat->tamat }}
                                            @endif
                                        </td>
                                        <?php
                                        $berkala = $item->sertifikat()->orderBy('tamat', 'desc')->first();
                                        ?>
                                        <td>
                                            @if($berkala != null)
                                                {{ $berkala->tamat }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d/m/Y', strtotime($item->tgl_lahir) ) }}
                                        </td>
                                        <td>
                                            @if($pangkat != null)
                                                <?php
                                                $t = strtotime($pangkat->tamat);
                                                $t2 = strtotime('+'.$pangkat->estimasi.' years', $t);
                                                ?>
                                                <small>
                                                    {{ date('d/m/Y', $t2) }}
                                                </small>
                                                ({{ $pangkat->estimasi }}) th
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($berkala != null)
                                                <?php
                                                $t = strtotime($berkala->tamat);
                                                $t2 = strtotime('+'.$berkala->estimasi.' years', $t);
                                                ?>
                                                <small>
                                                    {{ date('d/m/Y', $t2) }}
                                                </small>
                                                ({{ $berkala->estimasi }}) th
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <?php
                                            $t = strtotime($item->tgl_lahir);
                                            $t2 = strtotime('+58 years', $t);
                                            ?>
                                            {{ date('d/m/Y', $t2) }}
                                        </td>
                                        <td class="pull-right" width="50px">
                                            <a href="{{ url('personel/edit/'.$item->uuid) }}"><span class="fa fa-edit"></span></a>
                                            <a href="{{ url('personel/detail/'.$item->uuid) }}"><span class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
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
