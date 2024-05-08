@extends('index')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Ajukan Ulang Judul</h1>

    <div class="card align-items-center">
        <div class="card-body col-md-6">
            <form action="{{route('pengajuan-judul.update')}}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <label for="">Judul Penelitian</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="form-group align-right">
                    <button class="btn btn-primary">Ajukan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection