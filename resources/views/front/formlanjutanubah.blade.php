@extends('main.layout')
@section('isi')
    <div class="container forms">
        <h2 align="center" class="berupa">Serah terima barang Berupa</h2>
        <hr width="50%">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card-body">
                    {{-- <a class="btn btn-primary mb-3" href="/table">data</a> --}}
                    <form method="POST" action="/ubah/{{$usid}}/{{$relasi}}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" value="{{ $usid }}" name="pihak_id" class="usid">
                        <div class="form-group">
                            <label for="nama">nama barang : </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="nama" value="{{$barang->nama_barang}}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="merek">merek : </label>
                            <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek"
                                id="merek" value="{{$barang->merek}}">
                            @error('merek')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sn">serial Number : </label>
                            <input type="text" class="form-control @error('sn') is-invalid @enderror" name="sn" id="sn" value="{{$barang->sn}}">
                            @error('sn')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Kondisi barang lama: </label>
                            <img src="{{asset('/image/kondisi/'.$barang->kondisi)}}" class="img-fluid">
                            <label for="gambar">Kondisi barang baru: </label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                id="gambar" >
                            <small>Image Type : jpeg,jpg,png</small>
                            @error('gambar')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pemilik">pemilik : </label>
                            <input type="text" class="form-control @error('pemilik') is-invalid @enderror" name="pemilik"
                                id="pemilik" value="{{$barang->pemilik}}">
                            @error('pemilik')
                                <div class="invalid-feedback">
                                    <p> {{ $message }} </p>
                                </div>
                            @enderror
                        </div>
                            <div class="row m-auto">
                                <button class="btn btn-success col-md-12">Ubah Barang</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
