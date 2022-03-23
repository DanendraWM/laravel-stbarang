@extends('main.layout')
@section('isi')
    <div class="container">
        <div class="row">
            <div class="nf">
                <h1 class="text-center">Upss Sorry</h1>
                <h2>
                    "{{ $er }}" Tidak Di Temukan
                </h2>
                <a href="/" class="btn btn-success col-md-12">Home</a>
            </div>
        </div>
    </div>

@endsection
