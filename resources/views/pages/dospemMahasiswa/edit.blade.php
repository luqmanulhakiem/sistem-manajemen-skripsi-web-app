@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Jumlah Dospem</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('dospem-mahasiswa.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" name="jumlah" value="{{$data->name}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="jumlah" value="{{$data->judul}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Dosen Pembimbing 2</label>
                        <select class="form-control" name="dosen" id="">
                            @foreach ($dosen as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection