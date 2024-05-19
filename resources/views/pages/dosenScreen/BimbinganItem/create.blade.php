@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Bimbingan</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('bimbingan-mahasiswa-item.dosen.store', ['idBimbingan' => $bimbingan->id, 'idMhs' => $bimbingan->id_mahasiswa])}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal Bimbingan</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <input type="text" name="catatan" class="form-control" required>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection