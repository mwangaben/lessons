<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function store(Request $request)
    {
        // check the authorization

        //validate a request

        $this->validate($request, ['slug' => 'required']);

        //save the data

        auth()->user()->makeChannel($request->toArray());
    }
}
