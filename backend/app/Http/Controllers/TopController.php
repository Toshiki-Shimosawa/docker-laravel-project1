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

        $contents = Content::with([
            'detail',
            'detail.category'
        ])
        ->where('release_datetime', '<=', DateTimeHelper::dateTimeParameter($now))
        ->get();

        return view('index')->with([
            'contents' => $contents
        ]);
    }
}
