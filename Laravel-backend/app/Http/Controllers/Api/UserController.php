<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login () {
		if (auth()->attempt(request()->input())) {
			$user = auth()->user();
			Log::info($user);
			$success['token'] =  $user
				->createToken('Passport Api', ['show-products'])
				->accessToken;
			return response()->json(['success' => $success], 200);
		} else {
			return response()->json(['error' => 'Unauthorized'], 401);
		}
	}


	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function register () {
		$validator = Validator::make(request()->input(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json(['error' => $validator->errors()], 401);
		}

		request()->merge(['password' => bcrypt(request('password'))]);
		$user = User::create(request()->input());
		$success['token'] =  $user
			->createToken('Passport Api', ['show-products'])
			->accessToken;
		return response()->json(['success' => $success]);
	}
}
