@extends('main.layout')
@section('isi')
    <div class="container outln my-5">
        <div class="row">
            <div class="kunci col-md-5">
                <div class="gmbr"></div>
                <div class="gmbr_txt">
                    <div class="garis_log"></div>
                    <h3>Login Dulu</h3>
                    <p>Gunakan Username dan Password Yang benar</p>
                    <div class="garis_log2"></div>
                </div>
            </div>
            <div class="  formlog col-md-5">
                <h2 class=" text-center">Login Here</h2>
                <hr width="30%">
                <form class="mt-4" action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            aria-describedby="nameHelp" placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                <p> {{ $message }} </p>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Login</button>
                    {{-- <p class="text-center mt-3">Belum punya Account? <a href="/register">Register Now</a></p> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
