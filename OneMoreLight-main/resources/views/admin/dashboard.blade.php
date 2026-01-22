@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang di panel admin PT Charoen Pokphand Indonesia')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Page Views</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Visitors</h6>
                            <h6 class="font-extrabold mb-0">183.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldAdd-User"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Products</h6>
                            <h6 class="font-extrabold mb-0">80</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">News</h6>
                            <h6 class="font-extrabold mb-0">112</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Traffic Overview</h4>
                </div>
                <div class="card-body">
                    <div id="chart-profile-visit"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Activities</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Activity</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('mazer/assets/images/faces/5.jpg') }}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Admin User</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">Updated product catalog</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">5 minutes ago</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('mazer/assets/images/faces/2.jpg') }}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Editor</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">Published new article</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">1 hour ago</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('mazer/assets/images/faces/1.jpg') }}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">Manager</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="mb-0">Approved content update</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-muted">3 hours ago</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4>Quick Stats</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('mazer/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('mazer/assets/js/pages/dashboard.js') }}"></script>
@endpush
