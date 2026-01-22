@extends('admin.layouts.app')

@section('title', 'DataTable')

@section('page-title', 'DataTable')
@section('page-subtitle', 'Tabel interaktif dengan fitur search, sorting dan pagination')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">DataTable</li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/assets/vendors/simple-datatables/style.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Simple Datatable</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Graiden</td>
                        <td>graiden@example.com</td>
                        <td>076 4820 8838</td>
                        <td>Jakarta</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Dale</td>
                        <td>dale@example.com</td>
                        <td>0500 527693</td>
                        <td>Bandung</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Nathaniel</td>
                        <td>nathaniel@example.com</td>
                        <td>(012165) 76278</td>
                        <td>Surabaya</td>
                        <td><span class="badge bg-danger">Inactive</span></td>
                    </tr>
                    <tr>
                        <td>Darius</td>
                        <td>darius@example.com</td>
                        <td>0309 690 7871</td>
                        <td>Yogyakarta</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Oleg</td>
                        <td>oleg@example.com</td>
                        <td>0500 441046</td>
                        <td>Semarang</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Kermit</td>
                        <td>kermit@example.com</td>
                        <td>(01653) 27844</td>
                        <td>Medan</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Jermaine</td>
                        <td>jermaine@example.com</td>
                        <td>0800 528324</td>
                        <td>Makassar</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Ferdinand</td>
                        <td>ferdinand@example.com</td>
                        <td>(016977) 4107</td>
                        <td>Palembang</td>
                        <td><span class="badge bg-danger">Inactive</span></td>
                    </tr>
                    <tr>
                        <td>Kuame</td>
                        <td>kuame@example.com</td>
                        <td>(0151) 561 8896</td>
                        <td>Denpasar</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Deacon</td>
                        <td>deacon@example.com</td>
                        <td>07740 599321</td>
                        <td>Batam</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Channing</td>
                        <td>channing@example.com</td>
                        <td>0845 46 49</td>
                        <td>Pontianak</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                    <tr>
                        <td>Aladdin</td>
                        <td>aladdin@example.com</td>
                        <td>0800 1111</td>
                        <td>Manado</td>
                        <td><span class="badge bg-success">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('mazer/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endpush
