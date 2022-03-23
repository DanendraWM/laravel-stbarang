<?php
setlocale(LC_ALL, 'IND');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>print</title>
</head>
<style>
    p {
        font-size: 8px;
        font-family: 'Times New Roman';
        /* font-family: Calibri; */
    }

    hr {
        height: 1px;
        border: none;
        color: #333;
        background-color: #333;
    }

    #wt {
        color: white;
    }

    table {
        font-size: 10px;
    }

    .kertas {
        background-color: rgb(255, 255, 255);
        width: 80%;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        box-shadow: 1px 10px 10px rgb(37, 37, 37);
    }

    body {
        background-color: slategray;
    }

    .dalam {
        padding-top: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-left: 40px;
    }

</style>

<body>
    <div class="container">
        <a href="/" class="badge badge-primary">Kembali</a>
    </div>
    <div class="kertas">
        <div class="container dalam">
            <img src="{{ asset('image/123rt321.jpg') }}" alt="Logo Telkom"
                style="width: 80px; height:50; float:right;">
            <p align="center" style="font-size: 10px; margin-top:10px;">BERITA ACARA SERAH TERIMA BARANG</p>
            <div class="tex">
                <p>Kami yang bertanda tangan di bawah ini, Pada
                    {{ $pihak->created_at->formatLocalized('%A, %d %B %Y') }} : </p>
                <div class="container ml-3">
                    <p>Nama<span id="wt">________</span>: {{ strtoupper($nama1) }}</p>
                    <p>Jabatan<span id="wt">_______</span>: {{ strtoupper($pihak->jabatan1) }}</p>
                    <p>Alamat<span id="wt">_______</span>: {{ strtoupper($pihak->alamat1) }}</p>
                    <p>Selanjutnya disebut <span class=" font-weight-bold">PIHAK PERTAMA</span></p>
                    <p>Nama<span id="wt">________</span>: {{ strtoupper($nama2) }}</p>
                    <p>Jabatan<span id="wt">_______</span>: {{ strtoupper($pihak->jabatan2) }}</p>
                    <p>Alamat<span id="wt">_______</span>: {{ strtoupper($pihak->alamat2) }}</p>
                    <p>Selanjutnya disebut <span class=" font-weight-bold">PIHAK KEDUA</span></p>
                    <p>Dengan ini menyatakan bahwa <span class=" font-weight-bold">PIHAK PERTAMA</span> telah menyerahkan
                        kepada <span class=" font-weight-bold">PIHAK KEDUA</span> berupa : </p>
                    <table class="table table-bordered">
                        <thead>
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
                                    <td>{{ $brg->ua === null ? '-' : $brg->ua }}</td>
                                    <td>{{ $brg->pemilik }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <p>Demikian berita acara serah terima barang ini dibuat oleh kedua kedua belah pihak, adapun
                        barang-barang tersebut dalam keadaan baik dan cukup serta dapat dipergunakan sebagai mestinya
                    </p>
                </div>
            </div>
            {{-- <p>Tanggal : {{ $pinjambarang->created_at->format('D, d M Y') }}</p> --}}
            <div class="row align-items-center container">
                <div class="float-left">
                    <p align="center">PIHAK PERTAMA</p>
                    <img src="{{ asset('image/' . $pihak->ttd1) }}" style="width: 120px; height:80;">
                    <hr align="center">
                </div>
                <div class="ml-auto">
                    <p align="center">PIHAK KEDUA</p>
                    <img src="{{ asset('image/' . $pihak->ttd2) }}" style="width: 120px; height:80;">
                    <hr align="center">
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
