<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Subscription\EmailRepository;
use App\Subscriber;
use Excel;
use Illuminate\Http\Request;
use Validator;

class NewsLatterSubscription extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$emailRepo = new EmailRepository(new Subscriber);

		return view('allsubscribers',
			[
				'subscribers' => $emailRepo->index(),
			]
		);

	}

	public function export() {

		$mytime = \Carbon\Carbon::now();
		$tym = $mytime->toDateString();

		$data = Subscriber::select('email', 'subscrib_at')->where('status', '=', 'enable')->get()->toArray();

		return Excel::create('NewsLatterSubscribers-' . $tym, function ($excel) use ($data) {
			$excel->sheet('mySheet', function ($sheet) use ($data) {
				$sheet->fromArray($data);
			});
		})->download('xls');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return 'create';
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
		]);

		if ($validator->fails()) {
			return 'Email Address is not correct';
		}

		$store = new EmailRepository(new Subscriber);

		return $store->store($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Subscriber  $subscriber
	 * @return \Illuminate\Http\Response
	 */
	public function show(Subscriber $subscriber) {
		return 'show';
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Subscriber  $subscriber
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Subscriber $subscriber) {
		return 'edit';
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Subscriber  $subscriber
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Subscriber $subscriber) {
		return 'update';
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Subscriber  $subscriber
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Subscriber $subscriber) {
		return 'destroy';
		//
	}

}
