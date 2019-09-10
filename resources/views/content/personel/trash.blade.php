@extends('layouts.app')

@section('title', 'Personel Mutasi')

@section('content')
    <div class="panel panel-default square">
        <div class="panel-heading">
            Daftar Personel Polri
            <div class="pull-right">
                <a href="{{ route('personel.index') }}" class="btn btn-primary btn-sm">
                    <span class="fa fa-arrow-left"></span> Kembali
                </a>
            </div>
        </div>
        <div class="panel-body">
            @if(count($personel) > 0)
                <table class="table table-responsive">
                    <thead style="font-weight: bold">
                    <tr>
                        <td>NAMA NRP/NIP</td>
                        <td>TGL LAHIR</td>
                        <td>JABATAN</td>
                        <td>TMT</td>
                        <td align="right" width="10%">OPSI</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    @foreach($personel as $item)
                        <tr style="font-size: 12px">
                            <td>
                                <a href="{{ url('personel/detail/'.$item->uuid) }}">
                                    {{ ucfirst($item->nama) }} {{ ucfirst($item->nip) }}
                                </a>
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($item->tgl_lahir) ) }}
                            </td>
                            <td>

                            </td>
                            <td>
                                <small>Pangkat : {{ $item->tmt_pangkat }}</small>
                                <br>
                                <small>Berkala : {{ $item->tmt_berkala }}</small>
                                <br>
                                <small>Pensiun : {{ $item->tgl_pensiun }}</small>
                            </td>
                            <td align="right">
                                <div class="btn-group">
                                    <a href="{{ route('personel.restore', ['id' => $item->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="fa fa-recycle"></span>
                                    </a>
                                    <a href="" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                       data-placement="top"
                                       title="Hapus"
                                       onclick="if (confirm('Anda akan menghapus PERMANEN data ini ?')){
                                               event.preventDefault();
                                               document.getElementById('delete-{{ $item->id }}').submit();
                                               };">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <form id="delete-{{ $item->id }}"
                                          action="{{ route('personel.destroy', ['id'=>$item->id, 'delete' => 'permanen']) }}"
                                          method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
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
                <span class="label label-warning">Tidak terdapat data personil</span>
                <hr>
            @endif
        </div>
    </div>
@endsection
