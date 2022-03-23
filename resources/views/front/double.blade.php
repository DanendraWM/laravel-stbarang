@extends('main.layout')
@section('isi')
    <?php
    setlocale(LC_ALL, 'IND');
    ?>
    <form action="/" method="post">
        @csrf
        <div class="row m-auto py-2">
            <label for="from" class="mx-3 pt-1">Dari : </label>
            <input type="date" class="form-control col-md-2" id="from" name="from" max="{{ date('Y-m-d') }}"
                value="{{ date('Y-m-d') }}" required>
            <label for=" to" class="mx-3 pt-1">sampai : </label>
            <input type="date" class="form-control col-md-2" id="to" name="to"
                value="{{ date('Y-m-d', strtotime('+1 days')) }}" max="{{ date('Y-m-d', strtotime('+1 days')) }}">
            <input type="text" class="form-control col-md-2 mx-3" id="from" name="cari" placeholder="cari barang" required>
            <button class="btn btn-success mx-2" title="Search with date"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th rowspan="2">pihak 1</th>
                    <th rowspan="2">pihak 2</th>
                    <th rowspan="2">tanggal</th>
                    <th colspan="4">deskripsi</th>
                    <th rowspan="2">aksi</th>
                </tr>
                <tr>
                    <th>barang</th>
                    <th>merek</th>
                    <th>serial number</th>
                    <th>pemilik</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($form as $fm)
                    <tr>
                        <td>{{ $fm->nama1 }}</td>
                        <td>{{ $fm->nama2 }}</td>
                        <td>19-13-2021</td>
                        <td>{{ $barang->where('pihak_id', $fm->id)->pluck('nama_barang') }}</td>
                        <td>{{ $barang->where('pihak_id', $fm->id)->pluck('merek') }}</td>
                        <td>{{ $barang->where('pihak_id', $fm->id)->pluck('sn') }}</td>
                        <td>{{ $barang->where('pihak_id', $fm->id)->pluck('pemilik') }}</td>
                        <td><a href="/print/{{ $fm->id }}" class="btn btn-info" title="download file"><i
                                    class="bi bi-file-earmark-arrow-down-fill"></i></a>
                            <a href="/detail/{{ $fm->id }}" class="btn btn-primary" title="info detail"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="/hapus/{{ $fm->id }}" onclick="return confirm('Yakin ingin hapus?')"
                                class="btn btn-danger" title="info detail"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
