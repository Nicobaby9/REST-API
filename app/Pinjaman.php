<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buku;
use App\Mahasiswa;

class Pinjaman extends Model
{
	protected $table = 'pinjamans';
    protected $guarded = [];

    public function bukus() {
    	return $this->hasMany(Bukus::class);
    }

    public function mahasiswa() {
    	return $this->belongsTo(Mahasiswa::class);
    }
}
