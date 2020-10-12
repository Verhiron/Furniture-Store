<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class itemInsert {

    public $timestamps = false;

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

    protected $fillable = [
		'user_name', 'user_email','user_phoneNumber', 'item_name',
	];

}
