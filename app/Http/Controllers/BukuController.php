<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'kode_buku' => ['required'],
            'judul' => ['required'],
            'pengarang' => ['required'],
            'tahun_terbit' => ['required']

        ]);

        $buku = Buku::create([

            'kode_buku' => request('kode_buku'),
            'judul' => request('judul'),
            'pengarang' => request('pengarang'),
            'tahun_terbit' => request('tahun_terbit')
        ]);

        // dd($buku);
        return $buku;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pinjam = Buku::where('id', $id)->update([

            'kode_buku' => request('kode_buku'),
            'judul' => request('judul'),
            'pengarang' => request('pengarang'),
            'tahun_terbit' => request('tahun_terbit')
        ]);

        return response()->json('Data buku berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::where('id', $id)->delete();

        return response()->json('Data buku telah dihapus', 200);
    }
}
