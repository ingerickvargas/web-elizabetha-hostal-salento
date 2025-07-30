<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'comment',
		'rating',
	];
}
