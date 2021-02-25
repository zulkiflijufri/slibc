@extends('layouts.admin.main')

@section('title', 'List artikel')

@section('content')
<div class="col">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">List Article</h3>
                </div>
                <div class="col-4 text-right text-white">
                    <a class="btn btn-default btn-sm" href="{{ route('articles.create') }}">Buat artikel</a>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
            <table class="table table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Content</th>
                        <th scope="col">Penulis</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($articles as $item)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <img alt="{{ $item->title }}" src="/upload_articles/{{ $item->image }}" class="avatar mr-3">
                            </div>
                        </th>
                        <td class="title">
                            {{ $item->title }}
                        </td>
                        <td class="category">
                            {{ $item->category->name }}
                        </td>
                        <td class="content">
                            {{ $item->content }}
                        </td>
                        <td class="title">
                            Zulkifli
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="{{ route('articles.destroy', $item->slug) }}" onclick="event.preventDefault();
                                    document.getElementById('delete-article').submit();">Delete</a>
                                </div>

                                <form id="delete-article" action="{{ route('articles.destroy', $item->slug) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
