@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Jumlah Dospem</h1>

        <div class="card align-items-center">
            <div class="card-body col-md-6">
                <form action="{{route('jumlah-dospem.update')}}" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="">Jumlah Dospem</label>
                        <input type="text" name="jumlah" value="{{$data->jumlah}}" class="form-control" required>
                    </div>
                    <div class="form-group align-right">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection