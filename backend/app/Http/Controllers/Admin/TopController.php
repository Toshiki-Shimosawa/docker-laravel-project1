<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content\Content;
use App\Models\Content\ContentDetail;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Carbon\Carbon;

use App\Models\Helper\DateTimeHelper;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function user()
    {
        $users = User::all();

        return view('admin/user')->with([
            'users' => $users
        ]);
    }

    public function userPostNew(Request $request)
    {
        $last_member = User::orderBy('member_code', 'desc')
        ->first();

        $last_member_code = $last_member->memmber_code;

        $validation_rules = [
            'user_name' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ];

        $validator = Validator::make($request->all(), $validation_rules);

        if ($validator->fails()) {
            $users = User::all();

            return view('admin/user')->with([
                'users' => $users
            ]);
        }
        else {
            $user = new User();
            $user->member_code = ++$last_member_code;
            $user->name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            $users = User::all();

            return view('admin/user')->with([
                'users' => $users
            ]);
        }


    }

    public function userPostEdit(Request $request)
    {
        //
    }

    public function userPostDelete(Request $request)
    {
        //
    }

    public function contents()
    {
        $contents = Content::with([
            'detail',
            'detail.category'
        ])
        ->get();

        return view('Admin/contents')->with([
            'contents' => $contents,
        ]);
    }

    public function contetnsPostNew(Request $request)
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

        return view('Admin/contents')->with([
            'contents' => $contents,
        ]);
    }

    public function contetnsPostEdit(Request $request)
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

        return view('Admin/contents')->with([
            'contents' => $contents,
        ]);
    }
}