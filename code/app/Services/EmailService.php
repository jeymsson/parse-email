<?php

namespace App\Services;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EmailService
{
	public function getAll() : Collection
	{
		return Email::all()->whereNotIn('timestamp', 0);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request) : Email
	{
		$data = $request->all();
		$data['raw_text'] = $data['raw_text'] ?? '';
		$data['timestamp'] = strtotime(now());
		$email = Email::create($data);
		return $email;
	}

	public function show(Email $email) : Collection
	{
		return Email::find($email)->whereNotIn('timestamp', 0);
	}

	public function update(Request $request, Email $email) : Email
	{
		$data = $request->all();
		$data['raw_text'] = $data['raw_text'] ?? '';
		$data['timestamp'] = strtotime(now());
		$email->update(
			$data
		);
		return $email;
	}

	public function softDelete(Email $email)
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

		return $emails->pluck('id');
    }
}
