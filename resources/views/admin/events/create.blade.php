@extends('layouts.admin.main')

@section('title', 'Buat event')

@section('content')
<div class="col-xl-8 order-xl-1 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-0">Buat Event</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                <input type="text" class="form-control" name="plan" required>
                                @error('plan')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Deskripsi</label>
                                <textarea name="description" class="form-control" cols="5"></textarea>
                                @error('description')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Lokasi</label>
                                <input type="text" class="form-control" name="location" required>
                                @error('location')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Tanggal mulai</label>
                                <input type="date" class="form-control" name="start_date" required>
                                @error('date_start')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="title">Tanggal selesai</label>
                                <input type="date" class="form-control" name="end_date" required>
                                @error('date_end')
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
@endsection
