<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //删除
    public function destroy(Article $article)
    {
        $this->authorize('destroy', $article);
        $article->delete();
        session()->flash('success', '删除掉了哦！');
        return redirect()->back();
    }


    public function create()
    {
        return view('articles.create');
    }

    //写文章
    public function store(Request $request)
    {
        $this->validate($request, [
            'cont' => 'required|max:140'
        ]);

        Auth::user()->articles()->create([
            'title' => $request['title'],
            'content' => $request['cont']
        ]);

//        $article = Article::create([
//            'content' => $request->cont,
//            'title' => $request->title,
//        ]);
        session()->flash('success', '发布成功！');
        return redirect()->back();

    }

}
