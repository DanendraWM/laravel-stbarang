@extends('main.layout')
@section('isi')
    <?php
    setlocale(LC_ALL, 'IND');
    ?>
    <form action="/" method="post">
        @csrf
        <div class="row tgl m-auto py-2">
            <label for="from" class="mx-3 pt-1">Dari : </label>
            <input type="date" class="form-control col-md-2" id="from" name="from" max="{{ date('Y-m-d') }}"
                value="{{ date('Y-m-d') }}" required>
            <label for=" to" class="mx-3 pt-1">sampai : </label>
            <input type="date" class="form-control col-md-2" id="to" name="to"
                value="{{ date('Y-m-d', strtotime('+1 days')) }}" max="{{ date('Y-m-d', strtotime('+1 days')) }}">
            {{-- <input type="text" class="form-control col-md-2 mx-3" id="from" name="cari" placeholder="cari barang" required> --}}
            <button class="btn btn-success mx-2" title="Search with date"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <hr>
    {{-- <input type="text" name="search" id="search" class="form-control">
    <div id="search_list"></div> --}}
    @if ($form->count())
        {{-- <a class="btn btn-danger my-2" href="/deleteAll" onclick="return confirm('Yakin Ingin Hapus?')">Delete All</a> --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No</th>
                        <th style="text-align:center">Pihak 1</th>
                        <th style="text-align:center">Pihak 2</th>
                        <th style="text-align:center">Jam</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form as $no => $fm)
                        <tr>
                            <td>{{ $no + $form->firstItem() }}</td>
                            <td>{{ $fm->nama1 }}</td>
                            <td>{{ $fm->nama2 }}</td>
                            <td class="text-center">{{ $fm->created_at->formatLocalized('%H:%M:%S') }}
                            <td class="text-center">{{ $fm->created_at->formatLocalized('%A, %d %B %Y') }}
                            </td>
                            <td class="text-center"><a href="/print/{{ $fm->id }}" class="btn btn-info unduh"
                                    title="download file"><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                                <a href="/detail/{{ $fm->id }}" class="btn btn-primary" title="info detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                        <a href="/edit/{{ $fm->id }}" class="btn btn-success" title="info detail"><i
                                        class="bi bi-pen-fill"></i></a>
                                @auth
                                    @if (auth()->user()->level === 'admin')
                                            <a href="/hapus/{{ $fm->id }}" onclick="return confirm('Yakin ingin hapus?')"
                                                class="btn btn-danger" title="info detail"><i class="bi bi-trash-fill"></i></a>
                                    @else
                                    @endif
                                @endauth
                            </td>
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
                        <th style="text-align:center">No</th>
                        <th style="text-align:center">Pihak 1</th>
                        <th style="text-align:center">Pihak 2</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" align="center">
                            <h3>Data Not Found</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {{ $form->links() }}
    </div>
@endsection
{{-- search realtime with ajax --}}
{{-- @section('script')

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: 'search',
                    type: 'GET',
                    data: {
                        'search': query
                    },
                    success: function(data) {
                        $('#search_list').html(data);
                    }
                })
            })
        })
    </script>

@endsection --}}
