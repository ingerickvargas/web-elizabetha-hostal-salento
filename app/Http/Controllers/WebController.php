<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Gallery;
use App\Models\Reviews;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Settings\SiteSettings;

class WebController extends Controller
{
	public function home(SiteSettings $settings)
	{
		return view('web.home', compact('settings'));
	}

	public function services()
	{
		$services = Service::all();
		return view('web.services', compact('services'));
	}

	public function contact(SiteSettings $settings)
	{
		return view('web.contact', compact('settings'));
	}

	public function gallery()
	{
		$images = Gallery::all();
		return view('web.gallery', compact('images'));
	}

	public function reviews()
	{
		$reviews = Reviews::all();
		return view('web.reviews', compact('reviews'));
	}

	public function location(SiteSettings $settings)
	{
		return view('web.location', compact('settings'));
	}

	public function rooms()
	{
		$featuredRoom = Room::with('images')
			->where('is_featured', true)
			->first();
		$rooms = Room::with('images')
			->when($featuredRoom, fn($q) => $q->where('id', '!=', $featuredRoom->id))
			->orderBy('name')
			->get();

		return view('web.rooms', compact('featuredRoom', 'rooms'));
	}

	public function roomDetails($id)
	{
		$room = Room::with('images')->findOrFail($id);
		return response()->json($room);
	}
}
