@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Mahasiswa</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('mahasiswa.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">NPM</label>
                        <input type="text" name="username" class="form-control" value="{{$data->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <select class="form-control" name="id_prodi" id="">
                            @foreach ($prodi as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Angkatan</label>
                        <select class="form-control" name="id_angkatan" id="">
                            @foreach ($angkatan as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection