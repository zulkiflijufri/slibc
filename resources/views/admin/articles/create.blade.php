@extends('layouts.admin.main')

@section('title', 'Buat artikel')

@section('content')
<div class="col-xl-8 order-xl-1 mx-auto">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-0">Buat artikel</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="title" required autocomplete="off">
                                @error('title')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            @if(count($categories) > 0)
                            <div class="form-group">
                                <label class="form-control-label" for="title">Kategori</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="form-control-label" for="title">Konten</label>
                                <textarea name="content" class="form-control" rows="10" required id="editor"></textarea>
                                @error('content')
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
{{-- @push('script')
<script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>
<script>
    // Replace the textarea #example with SCEditor
    let textarea = document.getElementById('editor');
    sceditor.create(textarea, {
        format: 'xhtml'
        , style: 'https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/content/default.min.css'
    });

</script>
@endpush --}}
@endsection
