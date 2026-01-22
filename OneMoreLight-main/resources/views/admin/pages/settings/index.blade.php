@extends('admin.layouts.app')

@section('title', 'Pengaturan')

@section('page-title', 'Pengaturan Website')
@section('page-subtitle', 'Kelola informasi perusahaan dan visi misi')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Settings</li>
@endsection

@section('content')
<section class="section">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <!-- Company Info -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Perusahaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="company_name" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" 
                                           value="{{ old('company_name', $settings['company_name'] ?? '') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="company_since" class="form-label">Sejak Tahun <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="company_since" name="company_since" 
                                           value="{{ old('company_since', $settings['company_since'] ?? '') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_tagline" class="form-label">Tagline <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="company_tagline" name="company_tagline" rows="2" required>{{ old('company_tagline', $settings['company_tagline'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Vision Mission -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Visi & Misi</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="vision" class="form-label">Visi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="vision" name="vision" rows="2" required>{{ old('vision', $settings['vision'] ?? '') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mission_intro" class="form-label">Pengantar Misi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="mission_intro" name="mission_intro" rows="2" required>{{ old('mission_intro', $settings['mission_intro'] ?? '') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mission_items" class="form-label">Daftar Misi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="mission_items" name="mission_items" rows="5" required 
                                      placeholder="Satu item per baris">{{ old('mission_items', isset($settings['mission_items']) ? implode("\n", $settings['mission_items']) : '') }}</textarea>
                            <small class="text-muted">Masukkan satu item misi per baris</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Vision Image -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gambar Visi</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($settings['vision_image']) && $settings['vision_image'])
                            <div class="mb-3 text-center">
                                <img src="{{ asset($settings['vision_image']) }}" alt="Vision Image" 
                                     class="img-thumbnail" style="max-height: 180px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="vision_image" name="vision_image" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Max 2MB</small>
                    </div>
                </div>

                <!-- Company Profile PDF -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Company Profile PDF</h4>
                    </div>
                    <div class="card-body">
                        @if(isset($settings['company_profile_pdf']) && $settings['company_profile_pdf'])
                            <div class="mb-3">
                                <a href="{{ asset($settings['company_profile_pdf']) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-file-earmark-pdf"></i> Lihat PDF Saat Ini
                                </a>
                            </div>
                        @else
                            <p class="text-muted mb-3">Belum ada PDF yang diupload</p>
                        @endif
                        <input type="file" class="form-control" id="company_profile_pdf" name="company_profile_pdf" accept=".pdf">
                        <small class="text-muted">Format: PDF. Max 10MB</small>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-save"></i> Simpan Pengaturan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
