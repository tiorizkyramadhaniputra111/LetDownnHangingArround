@extends('admin.layouts.app')

@section('title', 'Table')

@section('page-title', 'Table')
@section('page-subtitle', 'Berbagai variasi tabel Bootstrap')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Table</li>
@endsection

@section('content')
<section class="section">
    <div class="row" id="basic-table">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Table with outer spacing</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Using the most basic table up, here's how
                            <code>.table</code>-based tables look in Bootstrap.
                        </p>
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>RATE</th>
                                        <th>SKILL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">Michael Right</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">UI/UX</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Morgan Vanblum</td>
                                        <td>$13/hr</td>
                                        <td class="text-bold-500">Graphic concepts</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Tiffani Blogz</td>
                                        <td>$15/hr</td>
                                        <td class="text-bold-500">Animation</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Table without outer spacing</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Table without spacing using <code>.mb-0</code> class.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>RATE</th>
                                    <th>SKILL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">UI/UX</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>$13/hr</td>
                                    <td class="text-bold-500">Graphic concepts</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tiffani Blogz</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Striped Table -->
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Striped rows</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Use <code>.table-striped</code> to add zebra-striping to any table row.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PHONE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>michael@email.com</td>
                                    <td>+62 812 3456 7890</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>morgan@email.com</td>
                                    <td>+62 813 9876 5432</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tiffani Blogz</td>
                                    <td>tiffani@email.com</td>
                                    <td>+62 821 1234 5678</td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hover Table -->
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hoverable rows</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <p class="card-text">Add <code>.table-hover</code> to enable a hover state on table rows.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>RATE</th>
                                    <th>SKILL</th>
                                    <th>TYPE</th>
                                    <th>LOCATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Michael Right</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">UI/UX</td>
                                    <td>Remote</td>
                                    <td>Jakarta</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Morgan Vanblum</td>
                                    <td>$13/hr</td>
                                    <td class="text-bold-500">Graphic Design</td>
                                    <td>Remote</td>
                                    <td>Bandung</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Tiffani Blogz</td>
                                    <td>$15/hr</td>
                                    <td class="text-bold-500">Animation</td>
                                    <td>On-site</td>
                                    <td>Surabaya</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
