<?php

namespace App\Http\Controllers;

use App\Models\Content\Content;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Helper\DateTimeHelper;

class TopController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $contents = Content::where('release_datetime', '>=', DateTimeHelper::dateTimeParameter($now));

        return view('index');
    }
}
