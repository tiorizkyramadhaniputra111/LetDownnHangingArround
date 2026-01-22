@extends('admin.layouts.app')

@section('title', $member ? 'Edit Anggota' : 'Tambah Anggota')

@section('page-title', $member ? 'Edit Anggota' : 'Tambah Anggota')
@section('page-subtitle', 'Form untuk ' . ($member ? 'mengubah' : 'menambah') . ' data personil')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.management.index') }}">Management</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $member ? 'Edit' : 'Tambah' }}</li>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $member ? 'Edit Data Anggota' : 'Tambah Anggota Baru' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ $member ? route('admin.management.update', $member['id']) : route('admin.management.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if($member)
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $member['name'] ?? '') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('role') is-invalid @enderror" 
                                           id="role" name="role" value="{{ old('role', $member['role'] ?? '') }}" required>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('category') is-invalid @enderror" 
                                    id="category" name="category" required>
                                <option value="komisaris" {{ $category === 'komisaris' ? 'selected' : '' }}>Komisaris</option>
                                <option value="direksi" {{ $category === 'direksi' ? 'selected' : '' }}>Direksi</option>
                                <option value="audit" {{ $category === 'audit' ? 'selected' : '' }}>Komite Audit</option>
                                <option value="nominasi" {{ $category === 'nominasi' ? 'selected' : '' }}>KNR</option>
                                <option value="sekretaris" {{ $category === 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="bio" class="form-label">Biografi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="5" required>{{ old('bio', $member['bio'] ?? '') }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Foto</label>
                            @if($member && isset($member['image']))
                                <div class="mb-2 text-center">
                                    <img src="{{ asset($member['image']) }}" alt="Current image" 
                                         class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, GIF. Max 2MB. Rasio 1:1 disarankan.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> {{ $member ? 'Simpan Perubahan' : 'Simpan' }}
                    </button>
                    <a href="{{ route('admin.management.index', ['category' => $category]) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
