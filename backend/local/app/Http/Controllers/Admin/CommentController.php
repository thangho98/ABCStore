<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use DB;

class CommentController extends Controller
{
    public function getComment()
    {
        $data['list_comment'] = DB::table('comment')
                            ->join('product','comment.cmt_prod','product.prod_id')
                            ->get();
        return view('admin.list_comment',$data);
    }

    public function getDeleteComment(Request $req)
    {
        $selected = $req->selected;
        if($selected != null){
            foreach ($selected as $key => $value) {
                Comment::destroy($value);
            }
        }
    }
}