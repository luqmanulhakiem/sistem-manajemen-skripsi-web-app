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
                @if ($dospem == null)
                    <h2>Ajukan Dosen Pembimbing</h2>
                    <form action="{{route('pengajuan-dospem.store')}}" method="POST">
                        @csrf
                        <select class="form-control" name="dospem" id="">
                            @foreach ($dosen as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
    
                            @endforeach
                        </select>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Ajukan Dospem</button>
                            </div>
                        </div>
                    </form>
                
                @else
                @if ($dospem->status_dosen1 === 'ditolak')
                    <h2>Ajukan Kembali Dosen Pembimbing</h2>
                    <form action="{{route('pengajuan-dospem.update')}}" method="POST">
                        @csrf
                        <select class="form-control" name="dospem" id="">
                            @foreach ($dosen as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>

                            @endforeach
                        </select>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Ajukan Dospem</button>
                            </div>
                        </div>
                    </form>
                @endif
                <div class="row mt-5">
                    <div class="col-md-5 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <h6>Status Pengajuan Dosen 1</h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Nama : {{$namadosen->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status : <span class="badge bg-warning text-white">{{$dospem->status_dosen1}}</span></td>
                                        <td></td>
                                    </tr>
                                    @if ($dospem->status_dosen1 == 'diterima')
                                    <tr>
                                        <td>NIDN: {{$namadosen->username}}</td>
                                    </tr>
                                        <tr>
                                            <td>Telp/WA: XXXXXXXX</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($data->status == "diterima" && $namadosen2 != null)
                        <div class="col-md-5 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Status Pengajuan Dosen 2</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td>Nama : {{$namadosen2->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status : <span class="badge bg-warning text-white">{{$dospem->status_dosen2}}</span></td>
                                            <td></td>
                                        </tr>
                                        @if ($dospem->status_dosen2 == 'diterima')
                                        <tr>
                                            <td>NIDN: {{$namadosen2->username}}</td>
                                        </tr>
                                            <tr>
                                                <td>Telp/WA: XXXXXXXX</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="col-md-5 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <h6>Status Pengajuan Dosen 2</h6>
                            </div>
                            <div class="card-body">
                                <h2>Menunggu</h2>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                    {{-- <div class="row">
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
                    </div> --}}
                @endif  
            @endif
        </div>
    </div>
</div>
@endsection