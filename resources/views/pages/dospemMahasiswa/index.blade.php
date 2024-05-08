@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Dosen Pembimbing Mahasiswa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen Pembimbing Mahasiswa</h6>
            {{-- <a href="{{route('fakultas.create')}}" class="btn btn-primary">Tambah</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">#</th>
                            <th rowspan="2">Nama Mahasiswa</th>
                            <th rowspan="2">Judul Penelitian</th>
                            <th rowspan="2">Prodi</th>
                            <th colspan="2">Dosen Pembimbing</th>
                        </tr>
                        <tr>
                            <th>Pembimbing 1</th>
                            <th>Pembimbing 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            <?php 
                            $number = 1;
                            ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td>#</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->namaProdi}}</td>
                                    <td>{{$item->Dospem1}}</td>
                                    <td>
                                        @if ($item->Dospem2 == null)
                                            <a href="{{route('dospem-mahasiswa.edit', ['id' => $item->id])}}" class="btn btn-sm btn-primary">Atur Dospem 2</a>
                                        @else
                                            {{$item->Dospem2}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Belum Ada Data</td>
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