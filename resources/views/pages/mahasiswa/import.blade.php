@extends('index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Import Mahasiswa</h1>

        <div class="card ">
            <div class="card-header">
                <a href="{{route('mahasiswa.export')}}" target="_blank" class="btn btn-success">Download Contoh Excel</a>
            </div>
            <div class="card-body  col-md-6">
               <form action="{{route('mahasiswa.import-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="pt-4 pb-2">
                    @foreach ($errors->all() as $error)
                        <p class="text-center small">{{ $error }}</p>
                    @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label for="">Import Excel</label>
                    <input class="form-control" type="file"  class="form-control-file" id="file" name="file" accept=".csv, .xls, .xlsx" placeholder="Import Mahasiswa Excel" required>
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-success" type="submit">Import Mahasiswa</button>

                </div>
                </form>
            </div>
        </div>
    </div>
@endsection