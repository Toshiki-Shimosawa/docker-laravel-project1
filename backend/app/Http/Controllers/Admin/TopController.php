<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content\Content;
use App\Models\Content\ContentDetail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Helper\DateTimeHelper;
use Illuminate\View\ViewServiceProvider;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $contents = Content::with([
            'detail',
            'detail.category'
        ])
        ->get();

        return view('admin/index')->with([
            'contents' => $contents,
        ]);
    }

    public function postNew(Request $request)
    {
        $content = new Content();
        $content->release_datetime = $request->release_date_time;
        $content->user_id = 1; //仮おき
        $content->save();

        $content_detail = new ContentDetail();
        $content_detail->title = $request->article_title;
        $content_detail->description = $request->article_description;
        $content_detail->parent_id = $content->id;
        $content_detail->category_id = $request->category_id;
        $content_detail->img_path = $request->img_path;

        $content_detail->save();

        $contents = Content::with([
            'detail',
            'detail.category'
        ])
        ->get();

        return view('admin/index')->with([
            'contents' => $contents,
        ]);
    }

    public function postEdit(Request $request)
    {
        $content = Content::find($request->content_id);

        if ( ! isset($content)) {
            return ; //Todo:エラーハンドリング
        }

        if ($content->release_datetime != $request->release_date_time) {
            $content->release_datetime = $request->release_date_time;
            $content->save();
        }

        $content_detail = $content->detail;

        if (($content_detail->title != $request->article_title) ||
            ($content_detail->description != $request->article_description) ||
            ($content_detail->category_id != $request->category_id) ||
            ($content_detail->img_path != $request->img_path)) {
            $content_detail->title = $request->article_title;
            $content_detail->description = $request->article_description;
            $content_detail->category_id = $request->category_id;
            $content_detail->img_path = $request->img_path;
            $content_detail->save();
        }

        $contents = Content::with([
            'detail',
            'detail.category'
        ])
        ->get();

        return view('admin/index')->with([
            'contents' => $contents,
        ]);
    }
}