<?php
setlocale(LC_ALL, 'IND');
?>
@extends('main.layout')
@section('isi')
    <a href="/" class="btn btn-success">kembali</a>
    <h4 class="judul_detail" align="center">Pada
        {{ $pihak->created_at->formatLocalized('%A, %d %B %Y') }}.<br>
        {{ $pihak->keterangan === null ? '' : 'Keterangan ' . $pihak->keterangan }}
    </h4>
    <hr align="center" width="70%">
    <div class="row">
        <div class="col-md-6" id="detail">
            {{-- <img src="{{ asset('css/ill.png') }}" alt=""> --}}
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <p class="h5" align="center">Dari pihak Pertama</p>
                <hr width="50%">
                {{-- <a class="btn btn-primary mb-3" href="/table">data</a> --}}
                <div class="kartu">
                    <p>Nama &emsp;&emsp;: {{ strtoupper($nama1) }}</p>
                    <p>Nomor HP : {{ strtoupper($pihak->phone1) }}</p>
                    <p>Jabatan &emsp;&ensp;: {{ strtoupper($pihak->jabatan1) }}</p>
                    <p>instansi &emsp;&ensp;: {{ strtoupper($pihak->instansi1) }}</p>
                    <p>Alamat&emsp;&emsp;: {{ strtoupper($pihak->alamat1) }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <p class="h5" align="center">Kepada pihak Kedua</p>
                <hr width="50%">
                <div class="kartu">
                    <p>Nama &emsp;&emsp;: {{ strtoupper($nama2) }}</p>
                    <p>Nomor HP : {{ strtoupper($pihak->phone2) }}</p>
                    <p>Jabatan &emsp;&ensp;: {{ strtoupper($pihak->jabatan2) }}</p>
                    <p>instansi &emsp;&ensp;: {{ strtoupper($pihak->instansi2) }}</p>
                    <p>Alamat&emsp;&emsp;: {{ strtoupper($pihak->alamat2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="confirm">
            {{-- <img src="{{ asset('css/ill.png') }}" alt=""> --}}
        </div>
    </div>
    <hr>
    <div class="mb-5">
        <h4 class="judul_detail" align="center">Penyerahan barang berupa : </h4>
        <hr align="center" width="20%">
        <a href="/add/{{ $pihak->id }}" class="btn btn-secondary my-3">Tambah barang</a>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th rowspan="2" style="text-align:center">No</th>
                        <th rowspan="2" style="text-align:center">Nama barang</th>
                        <th colspan="4" style="text-align:center">Deskripsi</th>
                        <th rowspan="2" style="text-align:center">aksi</th>
                    </tr>
                    <tr>
                        <th>Merek</th>
                        <th>Serial Number</th>
                        <th>Kondisi</th>
                        <th>Pemilik</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($barang->count())
                        <?php $no = 1; ?>
                        @foreach ($barang as $phk)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $phk->nama_barang }}</td>
                                <td>{{ $phk->merek }}</td>
                                <td>{{ $phk->sn }}</td>
                                <td align="center"><img src="{{ url('image/kondisi/' . $phk->kondisi) }}"
                                        class="image_detail">
                                </td>
                                <td>{{ $phk->pemilik }}</td>
                                <td><a href="/hapus/{{ $pihak->id }}/{{ $phk->id }}"
                                        onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger"
                                        title="info detail"><i class="bi bi-trash-fill"></i></a> | <a href="/ubah/{{ $pihak->id }}/{{ $phk->id }}"
                                        class="btn btn-success" title="info detail"><i class="bi bi-pen-fill"></i></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" align="center">Data is null</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{-- <div class="d-flex justify-content-center">
                    {{ $form->links() }}
                </div> --}}
        </div>
    </div>
@endsection
