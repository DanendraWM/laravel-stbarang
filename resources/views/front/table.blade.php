@extends('main.layout')
@section('isi')
    @if ($barang->count())
        <a class="btn btn-info my-2" href="/print">Print</a>
        {{-- <a class="btn btn-danger my-2" href="/deleteAll" onclick="return confirm('Yakin Ingin Hapus?')">Delete All</a> --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th rowspan="2" style="text-align:center">No</th>
                        <th rowspan="2" style="text-align:center">Nama barang</th>
                        <th colspan="4" style="text-align:center">Deskripsi</th>
                    </tr>
                    <tr>
                        <th>Label</th>
                        <th>Serial Number</th>
                        <th>User Address</th>
                        <th>Pemilik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($barang as $brg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $brg->nama_barang }}</td>
                            <td>{{ $brg->label }}</td>
                            <td>{{ $brg->sn }}</td>
                            <td>{{ $brg->ua }}</td>
                            <td>{{ $brg->pemilik }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th rowspan="2" style="text-align:center">Pihak</th>
                        <th rowspan="2" style="text-align:center">Nama barang</th>
                        <th colspan="4" style="text-align:center">Deskripsi</th>
                    </tr>
                    <tr>
                        <th>Label</th>
                        <th>Serial Number</th>
                        <th>User Address</th>
                        <th>Pemilik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" align="center">
                            <h3>Data is null, Fill data Now in <a href="/form" class="btn btn-info">form</a></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
    @endif
@endsection
