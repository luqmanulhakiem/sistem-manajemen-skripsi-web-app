@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Pengajuan Judul</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            {{-- <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6> --}}
        </div>
        <div class="card-body">
            @if ($data == null)
                <h2>Belum Ada Judul</h2>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('pengajuan-judul.create')}}" class="btn btn-primary">Ajukan Judul</a>
                    </div>
                </div>
            @else
                <div class="col-md-5 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <h6>Judul Kamu</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Judul :</td>
                                    <td>{{$data->judul}}</td>
                                </tr>
                                <tr>
                                    <td>Bidang :</td>
                                    <td>
                                        @foreach ($bidang as $item)
                                            <span class="badge badge-success">{{$item->nama}}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status :</td>
                                    <td><span class="badge bg-warning">{{$data->status}}</span> 
                                        @if ($data->status == 'revisi')
                                        <a href="{{route('pengajuan-judul.edit')}}" class="btn btn-sm btn-warning">revisi</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Komentar :</td>
                                    <td>{{$data->komentar == null ? '-' : $data->komentar}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection