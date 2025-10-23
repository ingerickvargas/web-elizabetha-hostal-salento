<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
	public function getRoomImages(Room $room)
	{
		$images = [];

		$images[] = asset('storage/' . $room->image);

		foreach ($room->images as $image) {
			$images[] = asset('storage/' . $image->image);
		}

		return response()->json($images);
	}

	public function details(Room $room)
	{
		$images = collect([$room->image])
			->merge($room->images->pluck('image'))
			->map(fn($img) => asset('storage/' . $img))
			->values();

		return response()->json([
			'id' => $room->id,
			'name' => $room->name,
			'description' => $room->description,
			'price' => $room->price,
			'size_m2' => $room->size_m2,
			'bed_type' => $room->bed_type,
			'bathroom_type' => $room->bathroom_type,
			'views' => $room->views ?? [],
			'bathroom_items_private' => $room->bathroom_items_private ?? [],
			'bathroom_items_shared' => $room->bathroom_items_shared ?? [],
			'services' => $room->services ?? [],
			'smoke_policy' => $room->smoke_policy,
			'images' => $images,
		]);
	}
}
