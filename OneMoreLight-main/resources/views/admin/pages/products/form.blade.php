@extends('admin.layouts.app')

@section('title', $product ? 'Edit Produk' : 'Tambah Produk')

@section('page-title', $product ? 'Edit Produk' : 'Tambah Produk')
@section('page-subtitle', 'Form untuk ' . ($product ? 'mengubah' : 'menambah') . ' produk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $product ? 'Edit' : 'Tambah' }}</li>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $product ? 'Edit Produk' : 'Tambah Produk Baru' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $product ? route('admin.products.update', $product['id']) : route('admin.products.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if($product)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $product['title'] ?? '') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="subtitle" class="form-label">Subtitle <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                   id="subtitle" name="subtitle" value="{{ old('subtitle', $product['subtitle'] ?? '') }}" required>
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $product['description'] ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" 
                                           id="link" name="link" value="{{ old('link', $product['link'] ?? '/produk/') }}" required>
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                                           id="tags" name="tags" 
                                           value="{{ old('tags', isset($product['tags']) ? implode(', ', $product['tags']) : '') }}"
                                           placeholder="Tag1, Tag2, Tag3">
                                    <small class="text-muted">Pisahkan dengan koma</small>
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            @if($product && isset($product['image']))
                                <div class="mb-2">
                                    <img src="{{ asset($product['image']) }}" alt="Current image" 
                                         class="img-thumbnail" style="max-height: 180px;">
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
                        <i class="bi bi-save"></i> {{ $product ? 'Simpan Perubahan' : 'Simpan' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
