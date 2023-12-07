<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleRead;
use App\Models\ArticleComment;

class ArticleController extends Controller
{
    public function index()
    {

        $sss= ArticleRead::get('article_id');
        

        return $sss ;
        // Do something with the client IP address.
    }

    public function comment(Request $request,$id) {

        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $comment =  ArticleComment::create([
            'article_id'=> $id,
            'name'=> $request->user_name,
            'email'=> $request->email,
            'comment'=> $request->comment,
         ]);
        
        return  $comment;
    }
}
