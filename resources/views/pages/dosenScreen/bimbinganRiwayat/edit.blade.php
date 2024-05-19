@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Revisi Judul Mahasiswa</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('daftar-bimbingan.dosen.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Mahasiswa</label>
                        <input type="text" value="{{$data->judul}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Komentar</label>
                        <input type="text" name="komentar" class="form-control" required>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection