<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $image = request()->file('image');

        $this->addArticles(request(), $image, $article = null);

        return redirect()->route('articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::latest()->get();

        return view('admin.articles.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        // dd(request()->all());

        $image = request()->file('image');

        $this->addArticles(request(), $image, $article);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        File::delete('upload_articles/' . $article->image);

        return back();
    }

    public function addArticles($req, $img, $article)
    {
        if (is_null($article)  && is_null($img)) {
            Article::create([
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->category_id,
            ]);
        } elseif (is_null($article)  && isset($img)) {
            Article::create([
                'image' =>  strtotime('now') . '-' . $img->getClientOriginalName(),
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->category_id,
            ]);

            // move img
            $img->move('upload_articles', strtotime('now') . '-' . $img->getClientOriginalName());
        } elseif (isset($article)  && is_null($img)) {
            $article->update([
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->category_id,
            ]);
        } elseif (isset($article) && isset($img)) {
            File::delete('upload_articles/' . $article->image);

            // move img
            $img->move('upload_articles', strtotime('now') . '-' . $img->getClientOriginalName());

            $article->update([
                'image' => strtotime('now') . '-' . $img->getClientOriginalName(),
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->category_id,
            ]);
        }
    }
}
