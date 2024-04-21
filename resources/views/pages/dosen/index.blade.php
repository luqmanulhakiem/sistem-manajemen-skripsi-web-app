@extends('index')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Data Kaprodi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kaprodi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Jabatan</th>
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
                                    <td>{{$item->roles[0]->name == 'dosen_kaprodi' ? 'Kaprodi' : 'Dosen'}}</td>
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