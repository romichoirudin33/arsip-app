@extends('layouts.app')

@section('title', 'Setting Kategori')

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-xs">
                    <span class="fa fa-plus"> </span> Tambah
                </a>
            </div>
            <center>
                <h5>
                    <strong>KATEGORI PENCATATAN DATA PERSONEL</strong>
                </h5>
            </center>
        </div>
    </div>

    <div class="panel-group" id="accordion" aria-multiselectable="true">
        @foreach($data as $i)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-{{ $i->id }}" style="background: #f3f3f3">
                    <h4>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $i->id }}"
                           style="text-decoration: none; color: black">
                            <span class="fa fa-arrow-right" style="font-size: larger"></span>
                            {{ ucfirst($i->name) }}
                            <span class="badge">{{ $i->is_many ? 'Bisa lebih dari satu' : 'Data hanya satu' }}</span>
                            <span class="badge">{{ $i->detailKategori->count() }}</span>
                        </a>
                        <div class="pull-right">
                            <a href="{{ route('category.edit', ['id' => $i->id]) }}"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Edit"
                               class="btn btn-warning btn-xs">
                                <span class="fa fa-edit"> </span>
                            </a>
                            <a href="" class="btn btn-xs btn-danger" data-toggle="tooltip"
                               data-placement="top"
                               title="Hapus"
                               onclick="if (confirm('Anda yakin akan menghapus data ini ?')){
                                       event.preventDefault();
                                       document.getElementById('delete-{{ $i->id }}').submit();
                                       };">
                                <span class="fa fa-trash"></span>
                            </a>
                            <form id="delete-{{ $i->id }}"
                                  action="{{ route('category.destroy', ['id'=>$i->id]) }}"
                                  method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </h4>
                </div>
                <div id="collapse-{{ $i->id }}" class="panel-collapse collapse "
                     aria-labelledby="heading-{{ $i->id }}">
                    <div class="panel-body">
                        @if(count($i->detailKategori) > 0)
                            Berikut merupakan detail data yang di simpan pada kategori <b>{{ strtolower($i->name) }}</b>
                            : <br><br>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Judul isian</th>
                                    <th style="text-align: center">Wajib di isi</th>
                                    <th style="text-align: center">Isian berupa file</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($i->detailKategori as $detail)
                                    <tr>
                                        <td width="60%">
                                            <a href="{{ route('category.edit_detail', ['id' => $detail->id]) }}"
                                               data-target="#edit-detail-{{ $i->id }}" data-toggle="modal">
                                                {{ $detail->name }}
                                            </a>
                                        </td>
                                        <td align="center">
                                            @if($detail->required == '1')
                                                <label class="label label-success">
                                                    <span class="fa fa-check"></span> Ya
                                                </label>
                                            @else
                                                <label class="label label-danger">
                                                    <span class="fa fa-remove"></span> Tidak
                                                </label>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if($detail->file == '1')
                                                <label class="label label-success">
                                                    <span class="fa fa-check"></span> Ya
                                                </label>
                                            @else
                                                <label class="label label-danger">
                                                    <span class="fa fa-remove"></span> Tidak
                                                </label>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                        <br>
                        <a href="{{ route('category.create_detail', ['id' => $i->id]) }}" class="btn btn-info btn-sm"
                           data-target="#create-detail-{{ $i->id }}" data-toggle="modal">
                            <span class="fa fa-plus"> </span> Tambah Detail {{ $i->name }}
                        </a>
                        <div class="modal fade" id="create-detail-{{ $i->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="edit-detail-{{ $i->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection