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
                            <th>Judul Penelitian</th>
                            <th class="text-center">Aksi Judul</th>
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
                                    <td>{{$item->judul}}</td>
                                    @if ($item->statusJudul == "diterima")
                                        <td class="text-center"><span class="badge badge-success">{{$item->statusJudul}}</span></td>
                                    @else
                                        @if ($item->statusJudul == "diajukan")
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{route('daftar-bimbingan.dosen.store', ["id" => $item->idJudul, "status" => "diterima"])}}" class="btn btn-sm btn-success">Terima</a>
                                                    <a href="{{route('daftar-bimbingan.dosen.edit', ["id" => $item->idJudul])}}" class="btn btn-sm btn-warning">Revisi</a>
                                                </div>
                                            </td>
                                        @else
                                        <td class="text-center">
                                            <span class="badge badge-warning">Revisi</span>
                                        </td>
                                        @endif
                                    @endif
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