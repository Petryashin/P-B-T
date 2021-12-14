<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        dump (fread(fopen(base_path("../../data/ssl/docker.loc.crt"), 'rb'),1e6));
        dump(asset("api/telegram"));
        dump(null ?: "sas");
    }
}
