@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Bidang Dosen</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('bidang-dosen.update', ['id' => $data->id])}}" method="POST" class="form">
                    @csrf
                    @if ($errors->any())
                        <div class="pt-4 pb-2">
                        @foreach ($errors->all() as $error)
                            <p class="text-center small">{{ $error }}</p>
                        @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Nama Bidang</label>
                        <select class="form-control " name="id_bidang" id="" required>
                            @foreach ($bidang as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
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