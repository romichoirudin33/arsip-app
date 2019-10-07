@extends('layouts.app')

@section('title', 'User Administrator')

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square mar-litle">
        <div class="panel-heading">
            <center>
                <h5>
                    <strong>DATA USER ADMIN</strong>
                </h5>
            </center>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead style="font-size: 13px; font-weight: bold">
                <tr>
                    <td colspan="6">DAFTAR USER ADMINISTRATOR
                        <div class="pull-right">
                            <a href="{{ route('users.edit', ['id' => Auth::id() ]) }}" class="btn btn-info btn-xs">
                                <span class="fa fa-user-secret"> </span> Profil ?
                            </a>

                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-xs">
                                <span class="fa fa-plus"> </span> Tambah
                            </a>
                        </div>
                    </td>
                </tr>
                <tr align="center" style="font-size: 11px;">
                    <td style="vertical-align:middle;">NO.</td>
                    <td style="vertical-align:middle;">NAMA USER</td>
                    <td style="vertical-align:middle;">USERNAME</td>
                    <td style="vertical-align:middle;">ALAMAT</td>
                    <td style="vertical-align:middle;">EMAIL</td>
                    <td>OPSI</td>
                </tr>
                </thead>
                <tbody>
                @if(count($user)>0)
                    <?php $no = 0; ?>
                    @foreach($user as $val)
                        <tr>
                            <td style="text-align: center">{{ $no+=1 }}</td>
                            <td>
                                @if($val->name != "")
                                    <small>{{ ucfirst($val->name) }}</small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($val->username != "")
                                    <small>{{ ucfirst($val->username) }}</small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($val->alamat != "")
                                    <small>{{ ucfirst($val->alamat) }}</small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($val->email != "")
                                    <small>{{ ucfirst($val->email) }}</small>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <center>
                                    @if( $val->id !== Auth::id())
                                        <a href="" class="btn btn-xs btn-danger " data-toggle="tooltip"
                                           data-placement="left" title="Hapus data ini"
                                           onclick="if (confirm('Anda Yakin Menghapus Data Ini ?')){
                                                   event.preventDefault();
                                                   document.getElementById('delete-{{ $val->id }}').submit();
                                                   };">
                                            <span class="fa fa-red fa-trash"></span>
                                        </a>
                                        <form id="delete-{{ $val->id }}"
                                              action="{{ route('users.destroy', ['id' => $val->id]) }}"
                                              method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    @endif
                                    <a href="{{ route('users.reset', ['id' => $val->username]) }}" data-toggle="tooltip"
                                       data-placement="left" title="Ganti Password ?">
                                        <span class="fa fa-recycle"> </span>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                                                <span class="label label-warning">
                                                    Tidak terdapat data
                                                </span>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection