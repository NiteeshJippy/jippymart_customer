<?php

/**
 * File name: AjaxController.php
 * Last modified: 2020.06.11 at 16:10:52
 * AjaxController
 * Copyright (c) 2020
 */


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Prettus\Validator\Exceptions\ValidatorException;


class AjaxController extends Controller

{

    public function checkEmail(Request $request)
    {

        $response = array();

        if (User::where('email', $request->email)->exists()) {
            $response['exist'] = 'yes';
        } else {
            $response['exist'] = 'no';
        }

        return response()->json($response);
    }


    public function setToken(Request $request)
    {

        $userId = $request->userId;
        $uuid = $request->id;
        $password = $request->password;
        $exist = VendorUsers::where('email', $request->email)->get();
        $data = $exist->isEmpty();

        if ($exist->isEmpty()) {

            $user = User::create([
                'name' => $request->email,
                'email' => $request->email,
                'password' => Hash::make($password),
            ]);

            DB::table('vendor_users')->insert([
                'user_id' => $user->id,
                'uuid' => $uuid,
                'email' => $request->email,
            ]);

        } else {
            
            $user = VendorUsers::select('id')->where('email', $request->email)->first();

            $user = VendorUsers::find($user->id);

            $user->uuid = $uuid;
            $user->email = $request->email;

            $user->save();

        }

        $user = User::where('email', $request->email)->first();
        Auth::login($user, true);
        $data = array();
        if (Auth::check()) {

            $data['access'] = true;
        }


        return $data;
    }

    public function setTokenOLD(Request $request)
    {


        $userId = $request->userId;

        $uuid = $request->id;

        $password = $request->password;

        $exist = VendorUsers::where('user_id', $userId)->get();

        $data = $exist->isEmpty();

        if ($exist->isEmpty()) {

            DB::table('vendor_users')->insert([

                'user_id' => $userId,

                'uuid' => $uuid,

                'email' => $request->email,

            ]);


            User::create([

                'name' => $request->email,

                'email' => $request->email,

                'password' => Hash::make($password),

            ]);


        } else {


        }

        $user = User::where('email', $request->email)->first();

        Auth::login($user, true);

        $data = array();

        if (Auth::check()) {


            $data['access'] = true;

        }


        return $data;


    }


    public function logoutOLD(Request $request)
    {


        $user_id = Auth::user()->user_id;

        $user = VendorUsers::where('user_id', $user_id)->first();


        try {

            Auth::logout();
            return redirect('/login');

        } catch (\Exception $e) {

            $this->sendError($e->getMessage(), 401);

        }


        $data1 = array();

        if (!Auth::check()) {

            $data1['logoutuser'] = true;

        }

        return $data1;

    }

    public function logout(Request $request)
    {

        $user_id = Auth::user()->user_id;
        $user = VendorUsers::where('user_id', $user_id)->first();

        try {
            Auth::logout();
            return redirect('/login');
        } catch (\Exception $e) {
            $this->sendError($e->getMessage(), 401);
        }

        $data1 = array();
        if (!Auth::check()) {
            $data1['logoutuser'] = true;
        }
        return $data1;
    }

    public function newRegister(Request $request)
    {
        $userId = $request->userId;

        $password = $request->password;

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            $user = $existingUser;
        } else{
            $user = User::create([
                'name' => $request->email,
                'email' => $request->email,
                'password' => Hash::make($password),
            ]);
        }

        $existingVendor = DB::table('vendor_users')->where('email', $request->email)->first();
        if ($existingVendor) {
            DB::table('vendor_users')
                ->where('email', $request->email)
                ->update([
                    'user_id' => $user->id,
                    'uuid' => $userId
                ]);
        } else{
            DB::table('vendor_users')->insert([
                'user_id' => $user->id,
                'uuid' => $userId,
                'email' => $request->email,
            ]);
        }


        $user = User::where('email', $request->email)->first();


        Auth::login($user, true);

        $signupdata = array();

        if (Auth::check()) {

            $signupdata['access'] = true;

        }

        return $signupdata;

    }

    /**
     * Refresh Firebase custom token for the authenticated user (for mobile session restore)
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshFirebaseToken(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 401);
            }
            // Use the same UID logic as OTPController
            $firebaseUid = 'user_' . $user->id;
            $firebaseService = new \App\Services\FirebaseService();
            $customToken = $firebaseService->createCustomToken($firebaseUid);
            return response()->json([
                'success' => true,
                'firebase_custom_token' => $customToken,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not generate Firebase token',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}

