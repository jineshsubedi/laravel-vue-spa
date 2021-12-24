<?php

namespace App\Http\Controllers\API\v1\Staffs;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ProfileResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends BaseController
{
    public function profile(Request $request)
    {
        return $this->sendSuccessResponse(new ProfileResource($request->user()), 'User Profile');
    }
}
