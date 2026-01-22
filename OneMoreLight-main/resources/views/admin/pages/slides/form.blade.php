@extends('admin.layouts.app')

@section('title', $slide ? 'Edit Slide' : 'Tambah Slide')

@section('page-title', $slide ? 'Edit Slide' : 'Tambah Slide')
@section('page-subtitle', 'Form untuk ' . ($slide ? 'mengubah' : 'menambah') . ' slide carousel')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.slides.index') }}">Slides</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $slide ? 'Edit' : 'Tambah' }}</li>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $slide ? 'Edit Slide' : 'Tambah Slide Baru' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $slide ? route('admin.slides.update', $slide['id']) : route('admin.slides.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if($slide)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $slide['title'] ?? '') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $slide['description'] ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Gambar Background</label>
                            @if($slide && isset($slide['image']))
                                <div class="mb-2">
                                    <img src="{{ asset($slide['image']) }}" alt="Current image" 
                                         class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, GIF. Max 2MB</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> {{ $slide ? 'Simpan Perubahan' : 'Simpan' }}
                    </button>
                    <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
