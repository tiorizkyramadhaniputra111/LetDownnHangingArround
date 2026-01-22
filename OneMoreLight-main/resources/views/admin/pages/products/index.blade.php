@extends('admin.layouts.app')

@section('title', 'Kelola Produk')

@section('page-title', 'Products')
@section('page-subtitle', 'Kelola produk yang ditampilkan di halaman utama')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Products</li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/assets/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daftar Produk</h4>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="100">Gambar</th>
                        <th>Judul</th>
                        <th>Subtitle</th>
                        <th>Tags</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" 
                                 class="rounded" style="width: 80px; height: 60px; object-fit: cover;">
                        </td>
                        <td class="fw-bold">{{ $product['title'] }}</td>
                        <td>{{ $product['subtitle'] }}</td>
                        <td>
                            @foreach($product['tags'] as $tag)
                                <span class="badge bg-light-primary">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product['id']) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product['id']) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
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
