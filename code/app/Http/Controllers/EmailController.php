<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EmailController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index() : Collection
	{
		return Email::all()->whereNotIn('timestamp', 0);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) : Collection
	{
		$data = $request->all();
		$data['raw_text'] = $data['raw_text'] ?? '';
		$data['timestamp'] = strtotime(now());
		$email = Email::create($data);
		return $email;
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Email $email) : Collection
	{
		return Email::find($email)->whereNotIn('timestamp', 0);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Email $email)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Email $email) : Collection
	{
		$data = $request->all();
		$data['raw_text'] = $data['raw_text'] ?? '';
		$data['timestamp'] = strtotime(now());
		$email->update(
			$data
		);
		return $email;
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Email $email)
	{
		$email->update(
			['timestamp' => 0]
		);
		return $email;
	}

	public function parseEmail()
    {
        $emails = Email::all()->where('raw_text', '')->whereNotIn('timestamp', 0);

		foreach ($emails as $key => $value) {
			$id = $value['id'];
			$texto = preg_split('/\n\s*\n/', $emails[$key]['email'])[1];
			$email = Email::find($id);
			$email->update(['raw_text' => $texto]);
		}

		return $emails;
    }

}
