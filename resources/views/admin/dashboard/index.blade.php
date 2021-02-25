@extends('layouts.admin.main')

@section('title', 'Dashboard SLIBC')

@section('content')
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5 class="card-title text-uppercase text-muted mb-0">Kategori</h5>
                    <span class="h2 font-weight-bold mb-0">{{ App\Category::count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5 class="card-title text-uppercase text-muted mb-0">Artikel</h5>
                    <span class="h2 font-weight-bold mb-0">{{ App\Article::count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5 class="card-title text-uppercase text-muted mb-0">Event</h5>
                    <span class="h2 font-weight-bold mb-0">{{ App\Event::count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <h5 class="card-title text-uppercase text-muted mb-0">List Startup</h5>
                    <span class="h2 font-weight-bold mb-0">0</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
