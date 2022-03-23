@extends('main.layout')
@section('isi')
    <?php
    setlocale(LC_ALL, 'IND');
    ?>
    <input type="text" name="search" id="search" class="form-control" placeholder="Cari barang">
    {{-- <div id="search_list"></div> --}}
    <hr>
    {{-- <a class="btn btn-danger my-2" href="/deleteAll" onclick="return confirm('Yakin Ingin Hapus?')">Delete All</a> --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    {{-- <th style="text-align:center">No</th> --}}
                    <th style="text-align:center">Pihak</th>
                    <th style="text-align:center">barang</th>
                    <th style="text-align:center">label</th>
                    <th style="text-align:center">Serial Number</th>
                    <th style="text-align:center">Pemilik</th>
                    {{-- <th style="text-align:center">kondisi</th> --}}
                    <th style="text-align:center">Keterangan</th>
                    <th style="text-align:center">Tanggal</th>
                </tr>
            </thead>
            <tbody id="search_list">
                @foreach ($barang as $brg)
                    <tr>
                        <td>{{ $brg->form->nama1 . '->' . $brg->form->nama2 }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->merek }}</td>
                        <td>{{ $brg->sn }}</td>
                        <td>{{ $brg->pemilik }}</td>
                        {{-- <td><img src="{{ url('image/kondisi/' . $brg->kondisi) }}" style="width: 30px; height:30px;"></td> --}}
                        <td>{{ $brg->form->keterangan }}</td>
                        <td>{{ $brg->created_at->formatLocalized('%A, %d %B %Y | %H:%M:%S') }}</td>
                    </tr>
                @endforeach
                <td colspan="7" align="center">
                    <small>... And More? Search...</small>
                </td>
            </tbody>
        </table>
    </div>
    {{-- <div class="table-responsive">
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
        </table> --}}
    {{-- <div class="d-flex justify-content-center">
            {{ $form->links() }}
        </div> --}}
@endsection
{{-- search realtime with ajax --}}
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: 'cari',
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
@endsection
