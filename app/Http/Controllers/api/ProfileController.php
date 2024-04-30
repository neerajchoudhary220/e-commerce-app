<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        // dd($request->header('authorization'));
        $user = $request->user();

        // dd($user->tokenCan('view:task'));

        $data = new UserResource($user);
        return response()->json([
            'message'=>'success',
            'data' => $data,
        ]);
    }

    public function logout(Request $request){
        //delete from current device
        $request->user()->currentAccessToken()->delete();
        //delete from all devices
        // $request->user()->tokens()->delete();
        return response()->json([
            'message'=>'Logout successfully',
        ]);
    }
}
