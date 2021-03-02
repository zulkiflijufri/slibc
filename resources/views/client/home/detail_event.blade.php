@extends('layouts.client.main')

@section('title', 'Artikel')

@section('content')
<section id="blog" class="blog" data-aos="fade-up" data-aos-delay="150">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="/upload_events/{{ $event->image ?? 'default_event.webp'}}" width="100%" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        {{ $event->plan }}
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-calendar-event"></i>{{ $event->end_date > $event->start_date ?
                            'Mulai: ' . date('d-m-Y', strtotime($event->start_date)) : '' }}</li>
                            @if($event->end_date > $event->start_date)
                            <li class="d-flex align-items-center"><i class="bi bi-calendar-check"></i>{{ 'Berakhir: ' . date('d-m-Y', strtotime($event->end_date)) }}</li>
                            @endif
                            <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i>{{ $event->location }}</li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        {{ $event->description }}
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
                        <div class="post-item clearfix">
                            <img src="/upload_articles/{{ $item->image ?? 'default_article.webp'}}" title="{{ $item->title }}">
                            <h4><a href="{{ route('home.event', $item->slug) }}">{{ Str::limit($item->title, 40) }}</a></h4>
                            <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                        </div>
                        @endforeach

                    </div><!-- End sidebar recent posts-->

                    <h3 class="sidebar-title">{{ $recent_events->count() > 1 ? 'Recent Events' : '' }}</h3>
                    <div class="sidebar-item recent-posts">
                        @foreach($recent_events as $item)
                        @if($item->plan != $event->plan)
                        <div class="post-item clearfix">
                            <img src="/upload_events/{{ $item->image ?? 'default_event.webp'}}" title="{{ $item->plan }}">
                            <h4><a href="{{ route('home.event', $item->slug) }}">{{ Str::limit($item->plan, 40) }}</a></h4>
                            <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                        </div>
                        @endif
                        @endforeach

                    </div><!-- End sidebar event-->

                </div><!-- End sidebar -->

            </div><!-- End blog sidebar -->

        </div>

    </div>
</section>
@endsection
