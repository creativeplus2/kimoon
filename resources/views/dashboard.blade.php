@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">{{ trans('dashboard.welcome') }} {{ Auth::user()->name }}
                                    </h4>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                <a href="" style="color: #A8AAB5" role="button"
                                                    id="btn_work_order_modal">Total member</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $countMember }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning rounded fs-3">
                                                <i class="fa fa-users"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                <a href="" style="color: #A8AAB5" role="button"
                                                    id="btn_equipment_modal">Total produk</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $countProduk }}"></span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success rounded fs-3">
                                                <i class="mdi mdi-cube"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                <a href="" style="color: #A8AAB5" role="button"
                                                    id="btn_employee_modal">Total Kategori Produk</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $countKategori }}"></span>
                                            </h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info rounded fs-3">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                <a href="" style="color: #A8AAB5" role="button"
                                                    id="btn_vendor_modal">Total Sub Kategori Produk</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                    data-target="{{ $countSubKategori }}"></span>
                                            </h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-danger rounded fs-3">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- grafik Total --}}
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card" style="height: 500px">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">
                                        <a href="" role="button" class="text-dark" id="btn_wo_by_status_modal">Grafik
                                            member berdasarkan type</a>
                                    </h4>
                                </div>

                                <div class="card-body"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <div style="height: 300px;">
                                        <canvas id="myChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card" style="height: 500px">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">
                                        <a href="" role="button" class="text-dark" id="btn_wo_by_category_modal">Grafik
                                            member berdasarkan status</a>
                                    </h4>
                                </div>
                                <div class="card-body"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <div style="height: 300px; ">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- 1 --}}
<script>
    var ctx1 = document.getElementById("myChart1").getContext('2d');
    var myChart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ["Seller", "Subdis", "Distributor"],
            datasets: [{
                label: '# of Votes',
                data: [
                    {{ totalMemberByType('Seller') }},
            {{ totalMemberByType('Subdis') }},
                        {{ totalMemberByType('Distributor') }}
                    ],
    backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(69, 203, 133, 0.2)'
    ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(69, 203, 133,1)'
        ],
            borderWidth: 1
                }]
            },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
        });
</script>
{{-- 2 --}}
<script>
    var ctx2 = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ["Pending", "Approved", "Rejected"],
            datasets: [{
                label: '# of Votes',
                data: [
                    {{ totalMemberByStatus('Pending') }},
            {{ totalMemberByStatus('Approved') }},
                        {{ totalMemberByStatus('Rejected') }}
                    ],
    backgroundColor: [
        'rgba(255, 206, 86, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 99, 132, 0.2)'
    ],
        borderColor: [
            'rgba(255, 206, 86, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255,99,132,1)'
        ],
            borderWidth: 1
                }]
            },
    options: {
        plugins: {
            legend: {
                display: false
            },
        },
        responsive: true, // Mengizinkan grafik menyesuaikan ukuran
            maintainAspectRatio: false, // Tidak mempertahankan aspek rasio
                scales: {
            y: {
                beginAtZero: true
            }
        }
    }
        });
</script>
@endpush