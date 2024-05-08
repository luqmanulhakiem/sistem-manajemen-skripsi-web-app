@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa Yang Mengajukan Bimbingan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Prodi</th>
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
                                    <td>{{$item->namaProdi}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{route('pengajuan-bimbingan.dosen.store', ["id" => $item->id, "status" => "diterima"])}}" class="btn btn-sm btn-success">Terima</a>
                                            <a href="{{route('pengajuan-bimbingan.dosen.store', ["id" => $item->id, "status" => "ditolak"])}}" class="btn btn-sm btn-danger">Tolak</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Belum Ada Data</td>
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