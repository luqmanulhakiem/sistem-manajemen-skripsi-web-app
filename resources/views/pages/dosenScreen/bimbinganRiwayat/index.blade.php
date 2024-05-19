@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Form Bimbingan</h1>

    <div class="card mb-5">
        <div class="card-body">
            <table>
                {{-- <tr>
                    <td>Nama Dosen Pembimbing</td>
                    <td>:</td>
                    <td>NAMADOSEN</td>
                </tr> --}}
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>NPM</td>
                    <td>:</td>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{$user->judul}}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('bimbingan-mahasiswa-item.dosen.create', ['idMhs' => $user->id])}}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Bimbingan</th>
                            <th>Catatan</th>
                            {{-- <th class="text-center">Aksi Judul</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($item) > 0)
                            <?php 
                            $number = 1;
                            ?>
                            @foreach ($item as $item)
                                <tr>
                                    <td>{{$number++}}</td>
                                    <td>{{$item->tgl_bimbingan}}</td>
                                    <td>{{$item->catatan}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">Belum Ada Data</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        {{-- {{$data->links()}} --}}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection