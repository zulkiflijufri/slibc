@extends('layouts.client.main')

@section('title', 'Artikel')

@section('content')
<section id="blog" class="blog" data-aos="fade-up" data-aos-delay="150">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="/upload_articles/{{ $article->image ?? 'default_article.webp'}}" width="100%" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        {{ $article->title }}
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> Admin</li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">{{ $article->created_at->diffForHumans() }}</time></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        {{ $article->content }}
                    </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                        <form action="#">
                            <input type="text" autocomplete="off">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->

                    <h3 class="sidebar-title">{{ $categories->count() > 0 ? 'Categories' : '' }}</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach($categories as $item)
                            <li><a href="#">{{ $item->name }} <span>({{ $item->articles->count() }})</span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- End sidebar categories-->

                    <h3 class="sidebar-title">{{ $recent_posts->count() > 1 ? 'Recent Posts' : '' }}</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach($recent_posts as $item)
                        @if($item->title != $article->title)
                        <div class="post-item clearfix">
                            <img src="/upload_articles/{{ $item->image ?? 'default_article.webp'}}" title="{{ $item->title }}">
                            <h4><a href="{{ route('home.article', $item->slug) }}">{{ Str::limit($item->title, 40) }}</a></h4>
                            <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                        </div>
                        @endif
                        @endforeach

                    </div><!-- End sidebar recent posts-->

                    <h3 class="sidebar-title">{{ $recent_events->count() > 0 ? 'Recent Events' : '' }}</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach($recent_events as $item)
                        <div class="post-item clearfix">
                            <img src="/upload_articles/{{ $item->image ?? 'default_article.webp'}}" title="{{ $item->plan }}">
                            <h4><a href="{{ route('home.event', $item->slug) }}">{{ Str::limit($item->plan, 40) }}</a></h4>
                            <time>{{ $item->created_at->diffForHumans() }}</time>
                        </div>
                        @endforeach

                    </div><!-- End sidebar event-->

                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section>
@endsection
