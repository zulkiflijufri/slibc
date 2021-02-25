@extends('layouts.admin.main')

@section('title', 'List kategori')

@section('content')
<div class="col-xl-8 order-xl-1 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-0">Buat Kategori</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <!-- Address -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title">Kategori</label>
                                <input type="text" class="form-control" name="name" required>
                                @error('name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-xl-8 order-xl-1 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">List Kategori</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-flush" id="list-category">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Artikel</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        @foreach($categories as $item)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <span class="badge badge-pill badge-primary">2</span>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('categories.edit', $item->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('categories.destroy', $item->id) }}" onclick="event.preventDefault();
                                    document.getElementById('delete-category').submit();">Delete</a>
                                    </div>

                                    <form id="delete-category" action="{{ route('categories.destroy', $item->id) }}" method="post">
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
</div>
@endsection
