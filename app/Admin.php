<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Admin extends Model
{
	protected $guarded = [];

	public function getRouteKeyName() {
		return 'id';
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
