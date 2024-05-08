@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Dosen Pembimbing</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('dosen.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    @if ($errors->any())
            <div class="pt-4 pb-2">
              @foreach ($errors->all() as $error)
                <p class="text-center small">{{ $error }}</p>
              @endforeach
            </div>
          @endif
                    <input type="hidden" name="role" value="dosen_pembimbing" class="form-control" required>
                    <input type="hidden" name="fakultas" value="{{$auth->id_fakultas}}" class="form-control" required>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIDN</label>
                        <input type="text" name="username" class="form-control" value="{{$data->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input type="text" name="phone" class="form-control" value="{{$data->phone}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <select class="form-control" name="id_prodi" id="">
                            @foreach ($prodi as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div><div class="form-group align-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection