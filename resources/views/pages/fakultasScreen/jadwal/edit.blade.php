@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Jadwal</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('jadwal.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Link</label>
                        <input type="text" name="link" placeholder="https://www.contoh.com" class="form-control" value="{{$data->link}}" required>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection