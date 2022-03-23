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

    .row {
        margin-bottom: 0;
    }

    .wi {
        width: 30%;
    }

</style>

<body class="mt-3">
    <img src="<?php echo $pic_usee; ?>" alt="Logo Telkom" style="width: 60px; height:40; float:left;  margin-left:30px;">
    <img src="<?php echo $pic_telkom; ?>" alt="Logo Telkom" style="width: 80px; height:50; float:right;"><br><br><br>
    <div class="container">
        <p align="center" style="font-size: 10px;">BERITA ACARA SERAH TERIMA BARANG</p>
        <p>Kami yang bertanda tangan di bawah ini, Pada
            {{ $pihak->created_at->formatLocalized('%A, %d %B %Y') }} : </p>
        <div class="container">
            <div class="row mx-auto">
                <div class="ml-3 wi">
                    <p>Nama : {{ strtoupper($nama1) }}</p>
                    <p>Nomor HP : {{ strtoupper($pihak->phone1) }}</p>
                    <p>Jabatan: {{ strtoupper($pihak->jabatan1) }}</p>
                    <p>Instansi : {{ strtoupper($pihak->instansi1) }}</p>
                    <p>Alamat: {{ strtoupper($pihak->alamat1) }}</p>
                    <p>Selanjutnya disebut <span class=" font-weight-bold">PIHAK PERTAMA</span></p>
                </div>
                <div class="float-right mr-2 wi">
                    <p>Nama : {{ strtoupper($nama2) }}</p>
                    <p>Nomor HP : {{ strtoupper($pihak->phone2) }}</p>
                    <p>Jabatan: {{ strtoupper($pihak->jabatan2) }}</p>
                    <p>Instansi : {{ strtoupper($pihak->instansi2) }}</p>
                    <p>Alamat: {{ strtoupper($pihak->alamat2) }}</p>
                    <p>Selanjutnya disebut <span class=" font-weight-bold">PIHAK KEDUA</span></p>
                </div>
            </div>
            <br>
            <p align="center">Dengan ini menyatakan bahwa <span class=" font-weight-bold">PIHAK PERTAMA</span>
                telah menyerahkan
                kepada <span class=" font-weight-bold">PIHAK KEDUA</span> berupa : </p>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center">No</th>
                        <th rowspan="2" style="text-align:center; ">Nama barang</th>
                        <th colspan="4" style="text-align:center">Deskripsi</th>
                    </tr>
                    <tr>
                        <th style="text-align:center">Merek</th>
                        <th style="text-align:center">Serial Number</th>
                        <th style="text-align:center">Kondisi</th>
                        <th style="text-align:center">Pemilik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($barang as $phk)
                        <tr>
                            <td style="text-align:center">{{ $no++ }}</td>
                            <td style="text-align:center">{{ $phk->nama_barang }}</td>
                            <td style="text-align:center">{{ $phk->merek }}</td>
                            <td style="text-align:center">{{ $phk->sn }}</td>
                            <td style="padding-top:10px; padding-bottom:0px; text-align:center;"><img
                                    src="<?php $kondisi = public_path('image/kondisi/' . $phk->kondisi);
                                    $kondisi_type = pathinfo($kondisi, PATHINFO_EXTENSION);
                                    $data_kondisi = file_get_contents($kondisi);
                                    $pic_kondisi = 'data:image/kondisi/' . $kondisi_type . ';base64,' . base64_encode($data_kondisi);
                                    echo $pic_kondisi;
                                    ?>" width="50px" height="50px">
                            </td>
                            <td style="text-align:center">{{ $phk->pemilik }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p> *note : {{ $pihak->keterangan }}</p>
            <p>Demikian berita acara serah terima barang ini dibuat oleh kedua kedua belah pihak, adapun
                barang-barang tersebut dalam keadaan baik dan cukup serta dapat dipergunakan sebagai mestinya</p>
        </div>
        {{-- <p>Tanggal : {{ $pinjambarang->created_at->format('D, d M Y') }}</p> --}}
        <div class="row align-items-center">
            <div class="float-left ml-4">
                <p align="center">PIHAK PERTAMA</p>
                <img src="<?php echo $pic1; ?>" style="width: 120px; height:80;">
                <hr align="center">
                <p align="center">{{ strtoupper($nama1) }}</p>
            </div>
            <div class=" float-right">
                <p align="center">PIHAK KEDUA</p>
                <img src="<?php echo $pic2; ?>" style="width: 120px; height:80;">
                <hr align="center">
                <p align="center">{{ strtoupper($nama2) }}</p>
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
