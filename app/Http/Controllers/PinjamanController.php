<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;

class PinjamanController extends Controller
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

            'tanggal_peminjaman' => ['required'],
            'tanggal_batas_peminjaman' => ['required'],
            'buku_id' => ['required'],
            'mahasiswa_id' => ['required']

        ]);

        $pinjam = Pinjaman::create([

            'tanggal_peminjaman' => request('tanggal_peminjaman'),
            'tanggal_batas_peminjaman' => request('tanggal_batas_peminjaman'),
            'buku_id' => request('buku_id'),
            'mahasiswa_id' => request('mahasiswa_id')
        ]);

        return $pinjam;
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
        $pinjam = Pinjaman::where('id', $id)->update([

            'tanggal_peminjaman' => request('tanggal_peminjaman'),
            'tanggal_batas_peminjaman' => request('tanggal_batas_peminjaman'),
            'tanggal_pengembalian' => request('tanggal_pengembalian'),
            'status_ontime' => request('status_ontime'),
            'buku_id' => request('buku_id'),
            'mahasiswa_id' => request('mahasiswa_id')
        ]);

        return "berhasil";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Pinjaman::where('id', $id)->delete();

        return response()->json('Data pinjaman telah dihapus', 200);
    }
}
