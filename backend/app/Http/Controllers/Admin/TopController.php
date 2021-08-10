<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content\Content;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Helper\DateTimeHelper;
use Illuminate\View\ViewServiceProvider;

class TopController extends Controller
{
    public function index()
    {
        return view('admin/index');

    }
}
