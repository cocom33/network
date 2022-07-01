<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        $request->make();

        return back();
    }
}
