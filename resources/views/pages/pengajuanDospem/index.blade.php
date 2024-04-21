@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Pengajuan Dospem</h1>

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
                        <a href="{{route('pengajuan-judul')}}" class="btn btn-primary">Ajukan Judul Terlebih Dahulu</a>
                    </div>
                </div>
            @else
                @if ($jumlah->jumlah == 1 || $jumlah->jumlah >= 1)
                    @if ($data->dospem1 == null)
                        <h2>Belum ada Dosen Pembimbing</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('pengajuan-judul')}}" class="btn btn-primary">Cari Dosen Pembimbing</a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-5 mt-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Dospem 1</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td>Nama :</td>
                                            </tr>
                                            <tr>
                                                <td>No WhatsApp :</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                @if ($jumlah->jumlah == 2)
                                    <div class="col-md-5 mt-2">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Dospem 2</h6>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <td>Nama :</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No WhatsApp :</td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    @endif  
                @endif
            @endif
        </div>
    </div>
</div>
@endsection