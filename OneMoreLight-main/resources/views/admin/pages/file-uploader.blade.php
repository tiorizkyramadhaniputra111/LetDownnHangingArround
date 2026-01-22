@extends('admin.layouts.app')

@section('title', 'File Uploader')

@section('page-title', 'File Uploader')
@section('page-subtitle', 'Upload file dengan drag & drop menggunakan FilePond')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">File Uploader</li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/assets/vendors/toastify/toastify.css') }}">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@section('content')
<section class="section">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Basic File Uploader</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Upload file dasar menggunakan <code>.basic-filepond</code>.</p>
                        <input type="file" class="basic-filepond">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Multiple Files</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Upload multiple file dengan <code>.multiple-files-filepond</code>.</p>
                        <input type="file" class="multiple-files-filepond" multiple>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">With Validation</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">File uploader dengan validasi ukuran maksimum 1MB dan maksimal 3 file.</p>
                        <input type="file" class="with-validation-filepond" required multiple data-max-file-size="1MB" data-max-files="3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Image Preview</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Preview gambar saat upload dengan <code>.image-preview-filepond</code>.</p>
                        <input type="file" class="image-preview-filepond">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Image Crop</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Crop gambar otomatis dengan rasio 1:1.</p>
                        <input type="file" class="image-crop-filepond" image-crop-aspect-ratio="1:1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<!-- toastify -->
<script src="{{ asset('mazer/assets/vendors/toastify/toastify.js') }}"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    // register desired plugins
    FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType,
        FilePondPluginImageCrop,
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
    );
    
    // Filepond: Basic
    FilePond.create(document.querySelector('.basic-filepond'), { 
        allowImagePreview: false,
        allowMultiple: false,
        allowFileEncode: false,
        required: false
    });

    // Filepond: Multiple Files
    FilePond.create(document.querySelector('.multiple-files-filepond'), { 
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: false
    });

    // Filepond: With Validation
    FilePond.create(document.querySelector('.with-validation-filepond'), { 
        allowImagePreview: false,
        allowMultiple: true,
        allowFileEncode: false,
        required: true,
        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            resolve(type);
        })
    });

    // Filepond: Image Preview
    FilePond.create(document.querySelector('.image-preview-filepond'), { 
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            resolve(type);
        })
    });

    // Filepond: Image Crop
    FilePond.create(document.querySelector('.image-crop-filepond'), { 
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: true,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            resolve(type);
        })
    });
</script>
@endpush
