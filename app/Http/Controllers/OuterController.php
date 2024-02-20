<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index()
    {
      $articles = Articles::get();
      return view("home", [
        'title'=> 'seluruh artikel', 
        'articles' => $articles
    ]); 
    }

    public function article_detail($id)
    {
        return view('article', [
            'title' => 'artikel' . $id,
            'article' => Articles::find($id)
        ]);
    }
}
