@extends('main.layout')
@section('isi')
    <p class="h2" align="center">ACARA SERAH TERIMA BARANG</p>
    <hr width="50%">
    <div class="row">
        <div class="col-md-6" id="side">
            {{-- <img src="{{ asset('css/ill.png') }}" alt=""> --}}
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <p class="h4" align="center">Dari pihak Pertama</p>
                {{-- <a class="btn btn-primary mb-3" href="/table">data</a> --}}
                <form method="POST" action="/form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama : </label>
                        <input type="text" placeholder="udin" class="form-control @error('nama') is-invalid @enderror"
                            required name="nama" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor HP : </label>
                        <input type="tel" placeholder="081212341234"
                            class="form-control @error('phone') is-invalid @enderror" required name="phone" id="phone">
                        {{-- <input placeholder="081212341234" type="text" maxlength="12"
                                onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                class="form-control " required name="phone" id="phone"> --}}
                        @error('phone')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan : </label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" placeholder="manager"
                            required name="jabatan" id="jabatan">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instansi">instansi : </label>
                        <input type="text" class="form-control @error('instansi') is-invalid @enderror" required
                            name="instansi" placeholder="telkom" id="instansi">
                        @error('instansi')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat : </label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" required name="alamat"
                            placeholder="Jl. merdeka selatan" id="alamat" maxlength="53">
                        @error('alamat')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <label>Signature:</label>
                    <div class="ttd">
                        <div id="sig" class="form-control @error('signed') is-invalid @enderror"></div>
                        @error('signed')
                            <div class="invalid-feedback">
                                <p class="text-center"> {{ $message }} </p>
                            </div>
                        @enderror
                        <button id="clear" class="btn btn-info col-md-12 mx-auto"><i
                                class="bi bi-arrow-repeat"></i></button>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
                    <div class="hr-sect">ATAU DENGAN GAMBAR</div>
                    <div class="form-group">
                        <input type="file" class="form-control @error('ttdimg') is-invalid @enderror" name="ttdimg"
                            id="ttdimg">
                        @error('ttdimg')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <p class="h4" align="center">Kepada pihak Kedua</p>
                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input type="text" class="form-control @error('nama2') is-invalid @enderror" placeholder="asep" required
                        name="nama2" id="nama">
                    @error('nama2')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Nomor HP : </label>
                    <input type="tel" placeholder="081212341234" class="form-control @error('phone2') is-invalid @enderror"
                        required name="phone2" id="phone">
                    {{-- <input placeholder="081212341234" type="text" maxlength="12"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            class="form-control " required name="phone2" id="phone"> --}}
                    @error('phone2')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan : </label>
                    <input type="text" class="form-control @error('jabatan2') is-invalid @enderror" placeholder="staff"
                        required name="jabatan2" id="jabatan">
                    @error('jabatan2')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="instansi">instansi : </label>
                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" required
                        name="instansi2" placeholder="telkom" id="instansi">
                    @error('instansi')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat : </label>
                    <input type="text" class="form-control @error('alamat2') is-invalid @enderror"
                        placeholder="jl. kehidupan" required name="alamat2" id="alamat">
                    @error('alamat2')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
                <label>Signature:</label>
                <div class="ttd">
                    <div id="sig2" class="form-control @error('signed2') is-invalid @enderror"></div>
                    @error('signed2')
                        <div class="invalid-feedback">
                            <p class="text-center"> {{ $message }} </p>
                        </div>
                    @enderror
                    <button id="clear2" class="btn btn-info col-md-12 d-block mx-auto"><i
                            class="bi bi-arrow-repeat"></i></button>
                    <textarea id="signature642" name="signed2" style="display: none"></textarea>
                </div>
                <div class="hr-sect">ATAU DENGAN GAMBAR</div>
                <div class="form-group">
                    <input type="file" class="form-control @error('ttdimg2') is-invalid @enderror" name="ttdimg2"
                        id="ttdimg2">
                    @error('ttdimg2')
                        <div class="invalid-feedback">
                            <p> {{ $message }} </p>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6" id="sidelanjutan">
            {{-- <img src="{{ asset('css/ill.png') }}" alt=""> --}}
        </div>
    </div>
    <hr>
    <div class="form-group container">
        <input type="textarea" class="form-control col-md-10 d-flex mx-auto"
            placeholder="Keterangan, CTH : Diserahkan ke sabang" required name="keterangan" id="keterangan" required>
        @error('keterangan')
            <div class="invalid-feedback">
                <p> {{ $message }} </p>
            </div>
        @enderror
        <button class="btn btn-success col-md-10 d-block mx-auto my-3">Selanjutnya</button>
        </form>
    </div>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });

        var sig2 = $('#sig2').signature({
            syncField: '#signature642',
            syncFormat: 'PNG'
        });
        $('#clear2').click(function(e2) {
            e2.preventDefault();
            sig2.signature('clear');
            $("#signature642").val('');
        });
    </script>
@endsection
