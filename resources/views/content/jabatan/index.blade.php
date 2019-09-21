@extends('layouts.app')

@section('title', 'Setting Kepala Jabatan')

@section('content')

    <div class="panel panel-default square">
        <div class="panel-heading">
            Daftar Kepala Jabatan
            <div class="pull-right">
                <a href="{{ route('kepala-jabatan.create') }}" class="btn btn-primary btn-sm">
                    <span class="fa fa-plus"></span> Tambah
                </a>
            </div>
        </div>
        <div class="panel-body">
            @if(count($data) > 0)
                <table class="table table-responsive">
                    <thead style="font-weight: bold">
                    <tr>
                        <td>NAMA JABATAN</td>
                        <td>NAMA KEPALA</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    @foreach($data as $val)
                        <tr>
                            <td>{{ strtoupper($val->jabatan) }}</td>
                            <td>
                                @if($val->personel->nama != null)
                                    <small>{{ strtoupper($val->personel->nama) }}</small>
                                @else
                                    -
                                @endif
                                <div class="pull-right">
                                    <a href="{{ route('kepala-jabatan.edit', ['id', $val->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fa fa-blue fa-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-xs btn-danger"
                                       onclick="if (confirm('Anda Yakin Menghapus Data Ini ?')){
                                               event.preventDefault();
                                               document.getElementById('delete-{{ $val->id }}').submit();
                                               };
                                               ">
                                        <span class="fa fa-red fa-trash"></span>
                                    </a>
                                    <form id="delete-{{ $val->id }}" action="{{ route('kepala-jabatan.destroy', ['id', $val->id]) }}"
                                          method="POST" style="display: none;">
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
                <span class="label label-warning">Tidak terdapat data</span>
                <hr>
            @endif
        </div>
    </div>
@endsection