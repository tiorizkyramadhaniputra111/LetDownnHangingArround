@extends('admin.layouts.app')

@section('title', 'Kelola Management')

@section('page-title', 'Management - ' . $categoryLabel)
@section('page-subtitle', 'Kelola data personil perusahaan')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Management</li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/assets/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h4 class="card-title mb-0">{{ $categoryLabel }}</h4>
                <div class="d-flex gap-2 flex-wrap">
                    <div class="mb-3">
                        <a href="{{ route('admin.management.create', ['category' => $category]) }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Tambah Anggota
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body mt-0 mb-0.5">
             <!-- Category Tabs -->
                    @foreach($categories as $cat)
                        <a href="{{ route('admin.management.index', ['category' => $cat]) }}" 
                           class="btn btn-sm {{ $category === $cat ? 'btn-primary' : 'btn-outline-primary' }}">
                            {{ $management[$cat]['label'] }}
                        </a>
                    @endforeach
            </div>
            <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th width="80">Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Bio</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $index => $member)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" 
                                     class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="fw-bold">{{ $member['name'] }}</td>
                            <td><span class="badge bg-light-primary">{{ $member['role'] }}</span></td>
                            <td>{{ Str::limit($member['bio'], 50) }}</td>
                            <td>
                                <a href="{{ route('admin.management.edit', ['management' => $member['id'], 'category' => $category]) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.management.destroy', ['management' => $member['id'], 'category' => $category]) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
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
