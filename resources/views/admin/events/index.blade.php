@extends('layouts.admin.main')

@section('title', 'List Event')

@section('content')
<div class="col">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">List Event</h3>
                </div>
                <div class="col-4 text-right text-white">
                    <a class="btn btn-default btn-sm" href="{{ route('events.create') }}">Buat event</a>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
            <table class="table table-flush" id="table-event">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Event</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list" id="list">
                    @foreach($events as $item)
                    <tr>
                        <td>
                            <div class="media align-items-center">
                                <img src="/upload_events/{{ $item->image ?? 'default_event.webp'}}" alt="{{ $item->title }}" class="avatar mr-3">
                            </div>
                        </td>
                        <td class="event">
                            {{ Str::limit($item->plan, 50) }}
                        </td>
                        <td class="description">
                            {{ Str::limit($item->description, 50) }}
                        </td>
                        <td class="start_date">
                            {{ $item->start_date }}
                        </td>
                        <td class="end_date">
                            {{ $item->end_date }}
                        </td>
                        <td class="location">
                            {{ $item->location }}
                        </td>
                        <td>
                            <span class="badge badge-{{ $item->start_date == date('Y-m-d') ? 'danger' : 'success' }}">
                                {{ $item->start_date == date('Y-m-d') ? 'Close' : 'Open' }}
                            </span>
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('events.edit', $item->slug) }}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('events.destroy', $item->id) }}" onclick="event.preventDefault();
                                    document.getElementById('delete-event-{{ $item->id }}').submit();">Delete</a>
                                </div>

                                <form id="delete-event-{{ $item->id }}" action="{{ route('events.destroy', $item->slug) }}" method="post">
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
