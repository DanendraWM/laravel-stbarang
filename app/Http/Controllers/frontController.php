<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\form;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class frontController extends Controller
{
    public function index(request $request)
    {
        // $barang=barang::all();
        // return view('front.table',compact('barang'));
        // $date = Carbon::parse(strval($form[0]->created_at))->locale('id');
        // $date->settings(['formatFunction' => 'translatedFormat']);
        $form = form::latest()->paginate(4)->withQueryString();
        if ($request->from and $request->to) {
            $form = form::where('created_at', '>=', $request->from)->where('created_at', '<=', $request->to)->latest()->paginate(4)->withQueryString();
        }
        return view('front.index', compact('form'), ['title' => 'home']);
        // return $form[1]->created_at;
    }
    public function double()
    {
        $barang = barang::all();
        $form = form::latest()->paginate(4)->withQueryString();
        return view('front.double', compact('form', 'barang'), ['title' => 'home']);
    }
    public function form()
    {
        return view('front.form', ['title' => 'form']);
    }
    public function upload(Request $request)
    {

        $form = new form;
        if (form::count() === 0) {
            $form->id = 1;
            $usid = $form->id;
        } else {
            $user = form::latest()->first();
            $usid = $user->id + 1;
            $form->id = $usid;
        }
        $request->validate([
            // 'signed' => 'required',
            // 'signed2' => 'required',
            'phone' => 'numeric',
            'phone2' => 'numeric',
        ], [
            // 'signed.required' => 'Harap isi tanda tangan',
            // 'signed2.required' => 'Harap isi tanda tangan',
            'phone.numeric' => 'harap isi dengan nomor',
            'phone2.numeric' => 'harap isi dengan nomor',
        ]);
        $folderPath = public_path('image/ttd/');
        $image_parts = explode(";base64,", $request->signed);
        $image_parts2 = explode(";base64,", $request->signed2);
        if ($image_parts === [""] && $request->ttdimg === null) {
            Alert::error('tanda tangan harus di isi', 'silahkan tanda tangan atau masukan gambar tanda tangan');
            return back()->with('pesan', 'Gagal');
        } else if ($image_parts !== [""] && $request->ttdimg !== null) {
            $file = $request->ttdimg;
            $slug = Str::slug($request->nama);
            $filename = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename);
        } else if ($image_parts !== [""]) {
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $request->nama . $form->id . '.' . $image_type;
            $filename = $request->nama . $usid . '.' . $image_type;
            file_put_contents($file, $image_base64);
        } else {
            $file = $request->ttdimg;
            $slug = Str::slug($request->nama);
            $filename = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename);
        }
        // di bawah pihak kedua
        if ($image_parts2 === [""] && $request->ttdimg2 === null) {
            Alert::error('tanda tangan harus di isi', 'silahkan tanda tangan atau masukan gambar tanda tangan');
            return back()->with('pesan', 'Gagal');
        } else if ($image_parts2 !== [""] && $request->ttdimg2 !== null) {
            $file = $request->ttdimg2;
            $slug = Str::slug($request->nama2);
            $filename2 = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename2);
        } else if ($image_parts2 !== [""]) {
            $image_type_aux2 = explode("image/", $image_parts2[0]);
            $image_type2 = $image_type_aux2[1];
            $image_base642 = base64_decode($image_parts2[1]);
            $file2 = $folderPath . $request->nama2 . $form->id . '.' . $image_type2;
            $filename2 = $request->nama2 . $usid . '.' . $image_type2;
            file_put_contents($file2, $image_base642);
        } else {
            $file = $request->ttdimg2;
            $slug = Str::slug($request->nama2);
            $filename2 = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename2);
        }
        // return $image_parts === [""] ? "kosong" : "oke";
        $form->nama1 = $request->nama;
        $form->nama2 = $request->nama2;
        $form->jabatan1 = $request->jabatan;
        $form->jabatan2 = $request->jabatan2;
        $form->instansi1 = $request->instansi;
        $form->instansi2 = $request->instansi2;
        $form->alamat1 = $request->alamat;
        $form->alamat2 = $request->alamat2;
        $form->phone1 = $request->phone;
        $form->phone2 = $request->phone2;
        $form->ttd1 = $filename;
        $form->ttd2 = $filename2;
        $form->keterangan = $request->keterangan;
        // return $form;
        $form->save();
        Alert::success('berhasil', 'Selanjutnya masukan data barang');
        return redirect('/form/lanjutan')->with('success', 'success Full upload signature');
    }
    public function formlanjutan()
    {
        $user = form::latest()->first();
        $usid = $user->id;
        $barang = barang::where('pihak_id', $usid)->count();
        return view('front.formlanjutan', compact('usid', 'barang'), ['title' => 'continue']);
    }
    public function postlanjutan(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'min:3', 'max:40'],
            'merek' => ['required', 'min:3'],
            'gambar' => ['required', 'mimes:jpeg,png,jpg', 'max:1000'],
            'sn' => ['required', 'min:3'],
            'pemilik' => ['required', 'min:3'],
        ], [
            'nama.required' => 'Nama barang harus di isi',
            'merek.required' => 'Merek barang harus di isi',
            'gambar.required' => 'harus ada gambar barang',
            'gambar.mimes' => 'tipe file kondisi barang harus : jpeg,png,jpg',
            'sn.required' => 'barang harus memiliki serial number',
            'pemilik.required' => 'Pemilik barang harus di isi',
        ]);
        $barang = new barang;
        if (barang::count() === 0) {
            $barang->id = 1;
            $usid = $barang->id;
        } else {
            $user = barang::latest()->first();
            $usid = $user->id + 1;
        }
        $file = $request->gambar;
        $slug = Str::slug($request->nama);
        $filename = $slug . $usid . '.' . $file->extension();
        $file->move(public_path('image/kondisi'), $filename);
        $barang->pihak_id = $request->pihak_id;
        $barang->nama_barang = $request->nama;
        $barang->merek = $request->merek;
        $barang->sn = $request->sn;
        // if ($request->ua=== null) {
        //     $barang->ua='-';
        // }else{
        // }
        $barang->kondisi = $filename;
        $barang->pemilik = $request->pemilik;
        $barang->save();
        Alert::success('berhasil masukan data', 'Jika ingin tambah data, masukan data dan tekan tambah barang, Jika ingin mengakhiri tekan selesai');
        return back()->with('pesan', 'Berhasil');
        // return $barang;
    }
    public function addBarang($id)
    {
        $usid = $id;
        $barang = barang::where('pihak_id', $usid)->count();
        return view('front.formlanjutan', compact('usid', 'barang'), ['title' => 'add']);
    }
    public function editForm($id)
    {
        $pihak = form::find($id);
        return view('front.formedit',compact('pihak'),['title'=>'Edit']);
    }
    public function editPost($id ,Request $request)
    {
        $form = form::find($id);
        $usid = $form->id;
        $request->validate([
            // 'signed' => 'required',
            // 'signed2' => 'required',
            'phone' => 'numeric',
            'phone2' => 'numeric',
        ], [
            // 'signed.required' => 'Harap isi tanda tangan',
            // 'signed2.required' => 'Harap isi tanda tangan',
            'phone.numeric' => 'harap isi dengan nomor',
            'phone2.numeric' => 'harap isi dengan nomor',
        ]);
        $folderPath = public_path('image/ttd/');
        $image_parts = explode(";base64,", $request->signed);
        $image_parts2 = explode(";base64,", $request->signed2);
        if ($image_parts === [""] && $request->ttdimg === null) {
            $filename=$form->ttd1;
        } else if ($image_parts !== [""] && $request->ttdimg !== null) {
            $file = $request->ttdimg;
            $slug = Str::slug($request->nama);
            $filename = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename);
        } else if ($image_parts !== [""]) {
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $request->nama . $form->id . '.' . $image_type;
            $filename = $request->nama . $usid . '.' . $image_type;
            file_put_contents($file, $image_base64);
        } else {
            $file = $request->ttdimg;
            $slug = Str::slug($request->nama);
            $filename = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename);
        }
        // di bawah pihak kedua
        if ($image_parts2 === [""] && $request->ttdimg2 === null) {
            $filename2=$form->ttd2;
        } else if ($image_parts2 !== [""] && $request->ttdimg2 !== null) {
            $file = $request->ttdimg2;
            $slug = Str::slug($request->nama2);
            $filename2 = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename2);
        } else if ($image_parts2 !== [""]) {
            $image_type_aux2 = explode("image/", $image_parts2[0]);
            $image_type2 = $image_type_aux2[1];
            $image_base642 = base64_decode($image_parts2[1]);
            $file2 = $folderPath . $request->nama2 . $form->id . '.' . $image_type2;
            $filename2 = $request->nama2 . $usid . '.' . $image_type2;
            file_put_contents($file2, $image_base642);
        } else {
            $file = $request->ttdimg2;
            $slug = Str::slug($request->nama2);
            $filename2 = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/ttd'), $filename2);
        }
        // return $image_parts === [""] ? "kosong" : "oke";
        $form->nama1 = $request->nama;
        $form->nama2 = $request->nama2;
        $form->jabatan1 = $request->jabatan;
        $form->jabatan2 = $request->jabatan2;
        $form->instansi1 = $request->instansi;
        $form->instansi2 = $request->instansi2;
        $form->alamat1 = $request->alamat;
        $form->alamat2 = $request->alamat2;
        $form->phone1 = $request->phone;
        $form->phone2 = $request->phone2;
        $form->ttd1 = $filename;
        $form->ttd2 = $filename2;
        $form->keterangan = $request->keterangan;
        // return $form;
        $form->update();
        Alert::success('berhasil', 'Berhasil ubah data');
        return redirect('/')->with('success', 'success Full upload signature');
    }
    public function formLanjutanEdit($id,$relasi)
    {
        $barang = barang::where('id', $relasi)->where('pihak_id', $id)->first();
        $usid=form::find($id);
        $usid= $usid->id;
        return view('front.formlanjutanubah', compact('usid','relasi', 'barang'), ['title' => 'ubah']);
    }
    public function postLanjutanEdit($id,$relasi,Request $request)
    {
        $request->validate([
            'nama' => ['required', 'min:3', 'max:40'],
            'merek' => ['required', 'min:3'],
            'gambar' => [ 'mimes:jpeg,png,jpg', 'max:1000'],
            'sn' => ['required', 'min:3'],
            'pemilik' => ['required', 'min:3'],
        ], [
            'nama.required' => 'Nama barang harus di isi',
            'merek.required' => 'Merek barang harus di isi',
            'gambar.mimes' => 'tipe file kondisi barang harus : jpeg,png,jpg',
            'sn.required' => 'barang harus memiliki serial number',
            'pemilik.required' => 'Pemilik barang harus di isi',
        ]);
        $barang = barang::find($id);
        $usid=$barang->id;
        $file = $request->gambar;
        $slug = Str::slug($request->nama);
        if (!$file === null) {
            $filename = $slug . $usid . '.' . $file->extension();
            $file->move(public_path('image/kondisi'), $filename);
            $barang->kondisi = $filename;
        } 
        $barang->pihak_id = $request->pihak_id;
        $barang->nama_barang = $request->nama;
        $barang->merek = $request->merek;
        $barang->sn = $request->sn;
        $barang->pemilik = $request->pemilik;
        $barang->update();
        Alert::success('berhasil masukan data', 'Jika ingin tambah data, masukan data dan tekan tambah barang, Jika ingin mengakhiri tekan selesai');
        return redirect('/detail/'.$id)->with('pesan', 'Berhasil');
    }
    public function formLanjutanHapus($id,$relasi)
    {
        $barang = barang::where('id', $relasi)->where('pihak_id', $id)->first();
        if ($barang === null) {
            Alert::error('Id tidak di temukan', 'Jangan bandel ya');
            return redirect('/')->with('bandel', 'bandel');
        }
        if ($barang != "") {
            unlink(public_path('image/kondisi') . '\\' . $barang->kondisi);
        }
        $barang->delete();
        Alert::success('berhasil hapus data', 'Terima Kasih');
        return redirect()->back();
    }
    function print($id) {
        $pihak = form::find($id);
        if ($pihak === null) {
            Alert::error('Id tidak di temukan', 'Jangan bandel ya');
            return redirect('/')->with('bandel', 'bandel');
        }
        // return $pihak1[0]->nama;
        $barang = barang::where('pihak_id', $id)->get();
        $nama1 = $pihak->nama1;
        $nama2 = $pihak->nama2;

        $path1 = public_path('image/ttd/' . $pihak->ttd1);
        $path2 = public_path('image/ttd/' . $pihak->ttd2);
        $telkom = public_path('image/logo/123rt321.jpg');
        $usee = public_path('image/logo/usee123usee.png');
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $telkom_type = pathinfo($telkom, PATHINFO_EXTENSION);
        $usee_type = pathinfo($usee, PATHINFO_EXTENSION);
        $data1 = file_get_contents($path1);
        $data2 = file_get_contents($path2);
        $data_telkom = file_get_contents($telkom);
        $data_usee = file_get_contents($usee);
        $pic1 = 'data:image/ttd/' . $type1 . ';base64,' . base64_encode($data1);
        $pic2 = 'data:image/ttd/' . $type2 . ';base64,' . base64_encode($data2);
        $pic_telkom = 'data:image/logo/' . $telkom_type . ';base64,' . base64_encode($data_telkom);
        $pic_usee = 'data:image/logo/' . $usee_type . ';base64,' . base64_encode($data_usee);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('front/pdf', compact('barang', 'nama1', 'nama2', 'pic1', 'pic2', 'pic_telkom', 'pihak', 'pic_usee'));
        return $pdf->stream();
        // return $pdf->download($nama1 . '-' . $nama2 . '.pdf');
    }
    public function detail($id)
    {
        $pihak = form::find($id);
        if ($pihak === null) {
            Alert::error('Id tidak di temukan', 'Jangan bandel ya');
            return redirect('/')->with('bandel', 'bandel');
        }
        // return $pihak1[0]->nama;
        $barang = barang::where('pihak_id', $id)->get();
        $nama1 = $pihak->nama1;
        $nama2 = $pihak->nama2;
        // return $barang;
        return view('front.detail', compact('barang', 'nama1', 'nama2', 'pihak'), ['title' => 'detail']);
    }
    public function hapus($id)
    {
        $form = form::find($id);
        if ($form === null) {
            Alert::error('Id tidak di temukan', 'Jangan bandel ya');
            return redirect('/')->with('bandel', 'bandel');
        }
        if ($form != "") {
            unlink(public_path('image/ttd') . '\\' . $form->ttd1);
            unlink(public_path('image/ttd') . '\\' . $form->ttd2);
        }
        $form->delete();
        $barang = barang::where('pihak_id', $id)->get();
        if ($barang != "") {
            foreach ($barang as $brg) {
                unlink(public_path('image/kondisi') . '\\' . $brg->kondisi);
            }
        }
        barang::where('pihak_id', $id)->delete();
        Alert::success('berhasil hapus data', 'Terima Kasih');
        return redirect()->back();
    }
    public function err($er)
    {
        return view('error', compact('er'), ['title' => 'error']);
    }
    public function search(Request $request)
    {
        setlocale(LC_ALL, 'IND');
        if ($request->ajax()) {
            $data = barang::where('nama_barang', 'like', '%' . $request->search . '%')
                ->orwhere('sn', 'like', '%' . $request->search . '%')
                ->orwhere('pemilik', 'like', '%' . $request->search . '%')
                ->orwhere('merek', 'like', '%' . $request->search . '%')->latest()->paginate(6)->withQueryString();
        }
        // $barang=barang::latest()->get();
        $output = '';
        if (count($data) > 0) {
            foreach ($data as $brg) {
                $form = $brg->form;
                $tgl = $brg->created_at->formatLocalized('%A, %d %B %Y | %H:%M:%S');
                $page = $data->links();
                $output .=
                    "'<tr>'
                '<td>$form->nama1 -> $form->nama2</td>'
                '<td> $brg->nama_barang </td>'
                '<td> $brg->merek </td>'
                '<td> $brg->sn </td>'
                '<td> $brg->pemilik </td>'
                '<td> $form->keterangan</td>'
                '<td> $tgl </td>'
                '</tr>'";
            }
        } else {
            $output = "<tr>
                    <td colspan='7' align='center'>
                        <h3>Data Not Found</h3>
                    </td>
                </tr>";
        }
        return $output;
    }
    public function barang()
    {
        $barang = barang::latest()->paginate(6)->withQueryString();
        return view('front.barang', compact('barang'), ['title' => 'barang']);
    }
}
