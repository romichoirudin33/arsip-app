@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/validetta/validetta.css') }}">
@endsection

@section('title', 'Detail Personel')

@section('content')

    @include('layouts.includes.session')

    <div class="panel panel-default square mar-litle">
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <td>NAMA PERSONEL</td>
                    <td>: {{ $data->nama }}</td>
                    <td width="50%" rowspan="6">
                        <center>
                            <img src="{{ asset('assets/upload/'. $data->foto) }}" alt="">
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: {{ $data->nip }}</td>
                </tr>
                <tr>
                    <td>TEMPAT, TGL LAHIR</td>
                    <td>: {{ $data->tempat_lahir }}, {{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
                </tr>
                <tr>
                    <td>TMT PENSIUN</td>
                    <td>: {{ date('d-m-Y', strtotime($data->tgl_pensiun )) }}</td>
                </tr>
                <tr>
                    <td>TMT PANGKAT</td>
                    <td>: {{ date('d-m-Y', strtotime($data->tmt_pangkat)) }}</td>
                </tr>
                <tr>
                    <td>TMT BERKALA</td>
                    <td>: {{ date('d-m-Y', strtotime($data->tmt_berkala)) }}</td>
                </tr>
            </table>
        </div>
    </div>

    @foreach($kategori as $kat)
        <div class="panel panel-default square mar-litle">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead style="font-size: 13px; font-weight: bold">
                    <tr>
                        <td colspan="{{ $kat->detailKategori->count() + 2 }}">{{ $kat->name }}
                            @if($kat->detailKategori->count() > 0)
                                <a href="{{ route('value.create', ['kategori' => $kat->id, 'id' => $data->uuid]) }}">
                                    @if($kat->is_many == '0')
                                        <span class="fa fa-pencil"> </span>
                                    @else
                                        <span class="fa fa-plus"> </span>
                                    @endif
                                </a>
                            @endif
                        </td>
                    </tr>
                    @if($kat->is_many == '1')
                        @if($kat->detailKategori->count() > 0)
                            <tr>
                                <td width="50" style="text-align: center">NO</td>
                                @foreach($kat->detailKategori as $val)
                                    <td>{{ strtoupper($val->name) }}</td>
                                @endforeach
                                <td></td>
                            </tr>
                        @endif
                    @endif
                    </thead>
                    <tbody>
                    @if($kat->is_many == '0')
                        @php
                            $urutan = \App\Models\Urutan::where('personel_id', $data->id)
                            ->where('kategori_id', $kat->id)
                            ->first();
                        $urutan_id = $urutan ? $urutan->id : 0;
                        @endphp
                        @foreach($kat->detailKategori as $val)
                            <?php
                            $valDetail = \App\Models\ValueDetail::where('urutan_id', $urutan_id)
                                ->where('detail_kategori_id', $val->id)
                                ->first();
                            ?>
                            <tr>
                                <td width="40%">{{ $val->name }}</td>
                                <td>
                                    @if(!empty($valDetail))
                                        @if($val->file == '1')
                                            <a href="{{ asset('assets/upload/'.$valDetail->value) }}"
                                               target="_blank">{{ $valDetail->value }}</a>
                                        @else
                                            {{ ucfirst($valDetail->value) }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @php
                            $urutan = \App\Models\Urutan::where('personel_id', $data->id)
                            ->where('kategori_id', $kat->id)
                            ->get();
                            $no = 1;
                        @endphp
                        @foreach($urutan as $u)
                            <tr>
                                <td width="50" style="text-align: center">{{ $no++ }}</td>
                                @foreach($kat->detailKategori as $val)
                                    <?php
                                    $valDetail = \App\Models\ValueDetail::where('urutan_id', $u->id)
                                        ->where('detail_kategori_id', $val->id)
                                        ->first();
                                    ?>
                                    <td>
                                        @if(!empty($valDetail))
                                            @if($val->file == '1')
                                                <a href="{{ asset('assets/upload/'.$valDetail->value) }}"
                                                   target="_blank">{{ $valDetail->value }}</a>
                                            @else
                                                {{ ucfirst($valDetail->value) }}
                                            @endif
                                        @endif
                                    </td>
                                @endforeach
                                <td style="text-align: center">
                                    <a href="" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                       data-placement="top"
                                       title="Hapus"
                                       onclick="if (confirm('Anda yakin akan menghapus data ini ?')){
                                               event.preventDefault();
                                               document.getElementById('delete-{{ $u->id }}').submit();
                                               };">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <form id="delete-{{ $u->id }}"
                                          action="{{ route('value.destroy') }}">
                                        <input type="hidden" name="urutan_id" value="{{ $u->id }}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection

@section('js')

@endsection