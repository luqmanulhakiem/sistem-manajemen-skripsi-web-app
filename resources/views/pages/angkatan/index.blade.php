@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Angkatan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Angkatan</h6>
            @role('admn_univ')
                <a href="{{route('angkatan.create')}}" class="btn btn-primary">Tambah</a>
            @endrole
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun Angkatan</th>
                            <th>Status</th>
                            @role('admn_univ')
                                <th class="text-center">Aksi</th>
                            @endrole
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
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status}}</td>
                                    @role('admn_univ')
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{route('angkatan.edit', ['id' => $item->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i> Edit</a>
                                                <a href="{{route('angkatan.destroy', ['id' => $item->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </td>
                                    @endrole
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