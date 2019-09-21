@extends('layouts.app')

@section('title', 'Personel')

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square">
        <div class="panel-heading">
            Daftar Personel Polri
            <div class="pull-right">
                <a href="{{ route('personel.create') }}" class="btn btn-primary btn-sm">
                    <span class="fa fa-plus"></span> Personel Baru
                </a>

                @php
                    $trash = \App\Models\Personel::onlyTrashed()->get()->count();
                @endphp
                @if($trash)
                    <a href="{{ route('personel.trash') }}" class="btn btn-warning btn-sm">
                        <span class="fa fa-trash-o"></span>
                        <span class="badge" style="top: -10px;right: -3px;">{{ $trash }}</span>
                    </a>
                @endif
            </div>
        </div>
        <div class="panel-body">
            @if(count($personel) > 0)
                <table class="table table-bordered table-responsive">
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
                                <a href="{{ route('personel.show', ['id' => $item->uuid]) }}">
                                    {{ ucfirst($item->nama) }} - {{ ucfirst($item->nip) }}
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
                                    <a href="{{ route('personel.edit', ['id' => $item->uuid ]) }}"
                                       class="btn btn-xs btn-default">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="{{ url('personel/'.$item->uuid) }}" class="btn btn-xs btn-info">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a href="" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                       data-placement="top"
                                       title="Hapus"
                                       onclick="if (confirm('Anda yakin akan menghapus data ini ?')){
                                               event.preventDefault();
                                               document.getElementById('delete-{{ $item->id }}').submit();
                                               };">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <form id="delete-{{ $item->id }}"
                                          action="{{ route('personel.destroy', ['id'=>$item->id]) }}"
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
