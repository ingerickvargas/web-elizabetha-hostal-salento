<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'price',
		'image',
		'is_featured',
		'size_m2',
		'bed_type',
		'bathroom_type',
		'views',
		'bathroom_items_private',
		'bathroom_items_shared',
		'services',
		'smoke_policy',
		'pet_policy',
	];

	protected $casts = [
		'is_featured' => 'boolean',
		'views' => 'array',
		'bathroom_items_private' => 'array',
		'bathroom_items_shared' => 'array',
		'services' => 'array',
	];

	public function images()
	{
		return $this->hasMany(RoomImage::class);
	}
}
