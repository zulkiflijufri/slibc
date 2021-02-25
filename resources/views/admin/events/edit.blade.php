@extends('layouts.admin.main')

@section('title', 'Edit event')

@section('content')
<div class="col-xl-8 order-xl-1 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-0">Edit Event</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('events.update', $event->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Address -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title">Gambar</label>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Judul</label>
                                <input type="text" class="form-control" name="plan" required autocomplete="off" value="{{ old('plan', $event->plan) }}">
                                @error('plan')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Deskripsi</label>
                                <textarea name="description" class="form-control" cols="5">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Lokasi</label>
                                <input type="text" class="form-control" name="location" required autocomplete="off" value="{{ old('location', $event->location) }}">
                                @error('location')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Tanggal mulai</label>
                                <input type="date" class="form-control" name="start_date" required autocomplete="off" value="{{ old('start_date', $event->start_date) }}">
                                @error('date_start')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Tanggal selesai</label>
                                <input type="date" class="form-control" name="end_date" required autocomplete="off" value="{{ old('end_date', $event->end_date) }}">
                                @error('date_end')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
