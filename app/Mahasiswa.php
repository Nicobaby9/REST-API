<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pinjaman;

class Mahasiswa extends Model
{
	protected $guarded = [];
	

	public function getRouteKeyName() {
		return 'id';
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pinjams() {
    	return $this->hasMany(Pinjaman::class);
    }
}
