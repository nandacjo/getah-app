@extends('layouts.app')
@section('title', 'Dashboard')
@php
    $auth = Auth::user();
@endphp

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-20">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 text-dark">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Penyadap 19 orang</p>
                                        <h5 class="font-weight-bolder">
                                          
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fas fa-users text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-dark">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pohon (phn)</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['jumlah_pohon'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-dark">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Target (kg)</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['jumlah_target'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-dark">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Realisasi (kg)</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['jumlah_realisasi'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
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
                    <canvas id="myChart" style="width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const cfg = {
            type: 'line',
            data: {
                labels: ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'oktober', 'november', 'desember'],
                datasets: [{
                    label: 'Target',
                    data: [
                        @foreach ($data as $item)
                            '{{ $item->target }}',
                        @endforeach
                    ],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgb(255, 99, 132)',
                    fill: false,
                    tension: 0.1
                }, {
                    label: 'Realisasi',
                    data: [
                        @foreach ($data as $item)
                            '{{ $item->realisasi }}',
                        @endforeach
                    ],
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgb(54, 162, 235)',
                    fill: false,
                    tension: 0.1
                }]
            },
        }

        const myChart = new Chart("myChart", cfg);
    </script>
@endsection
