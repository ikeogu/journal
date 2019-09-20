<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Carbon;
use Illuminate\Http\Request;

class EmailRepository extends Controller {

	private $subscriber;

	public function __construct(Subscriber $subscriber) {
		$this->subscriber = $subscriber;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return $this->subscriber::paginate(10);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store($email) {

		$mytime = Carbon\Carbon::now();

		$subscr = new Subscriber();
		$subscr->email = $email['email'];
		$subscr->status = 'enable';
		$subscr->subscrib_at = $mytime->toDateTimeString();
		$subscr->save();

		return 'Subscription Successfull';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
