@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
            <div class="btn-group">
                <a href="{{route('mahasiswa.create')}}" class="btn btn-primary">Tambah</a>
                <a href="{{route('mahasiswa.import')}}" class="btn btn-secondary">Import Mahasiswa</a>
            </div>
            
        </div>
        <div class="row"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            <?php 
                                $number = 1;
                            ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$number++}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->profile->prodi->name}}</td>
                                    <td>{{$item->profile->angkatan->name}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{route('mahasiswa.edit', ['id' => $item->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i> Edit</a>
                                            <a href="{{route('mahasiswa.destroy', ['id' => $item->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        {{$data->links()}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection