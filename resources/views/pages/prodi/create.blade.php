@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tambah Prodi</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('prodi.store')}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Prodi</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection