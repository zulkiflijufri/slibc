<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(8);
        $events = Event::latest()->paginate(8);

        return view('client.home.index', compact('articles', 'events'));
    }

    public function article(Article $article)
    {
        $categories = Category::latest()->get();
        $recent_posts = Article::latest()->take(5)->get();
        $recent_events = Event::latest()->take(5)->get();

        return view('client.home.detail_article', compact('article', 'categories', 'recent_posts', 'recent_events'));
    }

    public function event(Event $event)
    {
        $categories = Category::latest()->get();
        $recent_posts = Article::latest()->take(5)->get();
        $recent_events = Event::latest()->take(5)->get();

        return view('client.home.detail_event', compact('event', 'categories', 'recent_posts', 'recent_events'));
    }
}
