@extends('admin.layouts.app')

@section('title', 'Kelola Slides')

@section('page-title', 'Hero Slides')
@section('page-subtitle', 'Kelola carousel di halaman utama')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Slides</li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/assets/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daftar Slides</h4>
            <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Slide
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="120">Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $index => $slide)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset($slide['image']) }}" alt="{{ $slide['title'] }}" 
                                 class="rounded" style="width: 80px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="fw-bold">{{ $slide['title'] }}</td>
                        <td>{{ Str::limit($slide['description'], 60) }}</td>
                        <td>
                            <a href="{{ route('admin.slides.edit', $slide['id']) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.slides.destroy', $slide['id']) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus slide ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('mazer/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1, {
        perPage: 10,
        searchable: true,
        sortable: true
    });
</script>
@endpush
