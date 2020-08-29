<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mahasiswa;

class MahasiswaController extends Controller
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

            'nama' => ['required'],
            'nim' => ['required'],
            'fakultas' => ['required'],
            'jurusan' => ['required'],
            'no_handphone' => ['required'],
            'no_whatsapp' => ['required']

        ]);

        $mahasiswa = auth()->user()->mahasiswas()->create([

            'nama' => request('nama'),
            'nim' => request('nim'),
            'fakultas' => request('fakultas'),
            'jurusan' => request('jurusan'),
            'no_handphone' => request('no_handphone'),
            'no_whatsapp' => request('no_whatsapp'),
            'user_id' => request('user')
        ]);

        return $mahasiswa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::findOrFail($id);
        $mhs = Mahasiswa::where('id', $id)->get();

        return response(compact('mhs'));
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
        $mahasiswa = Mahasiswa::where('id', $id)->update([

            'nama' => request('nama'),
            'nim' => request('nim'),
            'fakultas' => request('fakultas'),
            'jurusan' => request('jurusan'),
            'no_handphone' => request('no_handphone'),
            'no_whatsapp' => request('no_whatsapp'),
            'user_id' => request('user')
        ]);

        return $mahasiswa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mhs = Mahasiswa::where('id', $id)->delete();

        return response()->json('Data Mahasiswa telah dihapus', 200);
    }
}
