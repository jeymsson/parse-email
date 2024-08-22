<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\EmailService;

class EmailController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
		$this->emailService = new EmailService;
	}

	private $emailService;

	/**
	 * Display a listing of the resource.
	 */
	public function index() : Collection
	{
		return $this->emailService->getAll();
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
	public function store(Request $request) : Email
	{
		return $this->emailService->store($request);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Email $email) : Collection
	{
		return $this->emailService->show($email);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Email $email) : Email
	{
		return $this->emailService->update($request, $email);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Email $email)
	{
		return $this->emailService->softDelete($email);
	}

	public function parseEmail()
    {
		return $this->emailService->parseEmail();
    }

}
