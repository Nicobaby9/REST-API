<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pinjaman;

class Buku extends Model
{
	protected $table = "bukus";

    protected $guarded = [];

    public function pinjam() {
    	return $this->belongsTo(Pinjaman::class);
    }
}
