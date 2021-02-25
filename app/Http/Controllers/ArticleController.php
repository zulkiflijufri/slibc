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
        if (File::exists('upload_articles/' . $image->getClientOriginalName())) {
            return back();
        } else {
            $this->addArticles(request(), $image, $article = null);
        }

        return redirect()->route('articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        if (is_null($article)) {
            Article::create([
                'image' => $img->getClientOriginalName() ?? null,
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->category_id,
            ]);

            // move img
            $img->move('upload_articles', $img->getClientOriginalName());
        } else {
            File::delete('upload_articles/', $article->image);

            $img->move('upload_articles', $img->getClientOriginalName());

            $donate->update([
                'image' => $img->getClientOriginalName() ?? null,
                'title' => $req->title,
                'slug' => Str::slug($req->title),
                'content' => $req->content,
                'category_id' => $req->content,
            ]);
        }
    }
}
