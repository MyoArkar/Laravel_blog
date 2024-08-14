<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }

    public function index()
    {
        //return "Controller - Article List";
        //return view('articles/index');

        /*$data = [
            ["id" => 1, "title" => "First Article"],
            ["id" =>2, "title" => "Second Article"],
        ];*/

        //$data = Article::all();
        $data = Article::latest()->paginate(5);
        $user = auth()->user();
        return view('articles.index',[
            "articles" => $data,
            "user" => $user,
        ]);
    }

    public function detail($id)
    {
        $data = Article::find($id);

        return view('articles.detail',[
            "article" => $data
        ]);
    }

    public function add()
    {
        $data=[
            [ "id" => 1, "name" => "News"],
            [ "id" => 2, "name" => "Tech"],
        ];

        return view('articles.add',[
            'categories' => $data
        ]);
    }

    public function create()
    {   
        $validator= validator(request()->all(),[
            'tilte' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'Article deleted');
    }

    /*public function update($id)
    {
        $data = Article::find($id);
        $data1=[
            [ "id" => 1, "name" => "News"],
            [ "id" => 2, "name" => "Tech"],
        ];

        return view('articles.update',[
            "article" => $data,
            "categories" => $data1,
        ]);

    }

    public function save($id)
    {
        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect("/articles/detail/$id")->with('info', 'Article Updated');
    }*/
}
