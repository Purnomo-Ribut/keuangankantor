@extends('direktur.layouts.master')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Anggaran Perusahaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Anggaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- main content here --}}
                <div class="card col-lg-6" style="height: 300px">
                    <div class="card-header border-0">
                        <h3 class="card-title">Anggaran</h3>
                        <div class="card-tools">
                            {{-- tools --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mb-0" id="data-table-divisi">
                            <thead>
                                <tr class="text-center">
                                    <th class="col-1">No</th>
                                    <th>Divisi</th>
                                    <th>Kategori</th>
                                    <th>Rencana</th>
                                    <th>Aktualisasi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggarans as $anggaran)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $anggaran->divisi->nama_divisi }}</td>
                                        <td class="text-center">{{ $anggaran->kategori->nama_kategori }}</td>
                                        <td class="text-right">Rp.
                                            {{ number_format($anggaran->rencana_anggaran, 2, ',', '.') }}</td>
                                        <td class="text-right">Rp.
                                            {{ number_format($anggaran->aktualisasi_anggaran, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $anggaran->tgl_anggaran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-3">
                        <div class="card-header border-0 pb-0">
                            <div class="card-tools">
                                {{--  card Tools --}}
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span
                                        class="text-bold text-lg {{ $aktualisasiBulanans[0] - $rencanaBulanans[0] >= 0 ? 'text-danger' : ' text-success' }}"><i
                                            class="fa {{ $aktualisasiBulanans[0] - $rencanaBulanans[0] >= 0 ? 'fa-plus' : ' fa-minus' }} mr-lg-1"></i>Rp.
                                        {{ number_format($aktualisasiBulanans[0] - $rencanaBulanans[0], 2, ',', '.') }}
                                    </span>
                                    <span class="text-sm">Dari rencana</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="{{ ($perbandinganAnggaran >= 0) ? 'text-danger' : 'text-success' }}">
                                        <i class="fa {{ ($perbandinganAnggaran >= 0) ? 'fa-arrow-up' : 'fa-arrow-down' }} "></i>
                                        {{ number_format($perbandinganAnggaran, 2) }} %
                                    </span>
                                    <span class="text-muted">Keuntungan di bulan ini</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="280"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fa fa-square text-primary"></i> Aktualisasi
                                </span>

                                <span>
                                    <i class="fa fa-square" style="color: #20c997"></i> Rencana
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script>
        $(function() {
            $("#data-table-divisi").DataTable({
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 2, 3, 4, 5],
                }],
                paging: true,
                scrollCollapse: true,
                scrollY: '350px',
            });
        });
    </script>
    <script>
        $(function() {
            var tanggalBulanans = @json($tanggalBulanans);
            for (const key in tanggalBulanans) {
                if (tanggalBulanans.hasOwnProperty(key)) {
                    const element = tanggalBulanans[key];
                }
            }

            var rencanaBulanans = @json($rencanaBulanans);
            for (const key in rencanaBulanans) {
                if (rencanaBulanans.hasOwnProperty(key)) {
                    const element = rencanaBulanans[key];
                }
            }

            var aktualisasiBulanans = @json($aktualisasiBulanans);
            for (const key in aktualisasiBulanans) {
                if (aktualisasiBulanans.hasOwnProperty(key)) {
                    const element = aktualisasiBulanans[key];
                }
            }

            // Chart
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }
            var mode = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart')
            // eslint-disable-next-line no-unused-vars
            var salesChart = new Chart($visitorsChart, {
                type: 'bar',
                data: {
                    labels: [tanggalBulanans[6], tanggalBulanans[5], tanggalBulanans[4], tanggalBulanans[3],
                        tanggalBulanans[2], tanggalBulanans[1], tanggalBulanans[0]
                    ],
                    datasets: [{
                            type: 'line',
                            data: [aktualisasiBulanans[6], aktualisasiBulanans[5], aktualisasiBulanans[
                                    4],
                                aktualisasiBulanans[3],
                                aktualisasiBulanans[2], aktualisasiBulanans[1], aktualisasiBulanans[
                                    0]
                            ],
                            backgroundColor: 'transparent',
                            borderColor: '#007bff',
                            pointBorderColor: '#007bff',
                            pointBackgroundColor: '#007bff',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'bar',
                            data: [rencanaBulanans[6], rencanaBulanans[5], rencanaBulanans[
                                    4],
                                rencanaBulanans[3],
                                rencanaBulanans[2], rencanaBulanans[1], rencanaBulanans[
                                    0]
                            ],
                            backgroundColor: '#20c997',
                            borderColor: '#ced4da',
                            pointBorderColor: '#ced4da',
                            pointBackgroundColor: '#ced4da',
                            fill: false,
                            barPercentage: 0.5,
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }
                    ]
                },
                options: {
                    // responsive: true,
                    maintainAspectRatio: false, // Set this to true to maintain aspect ratio                                        
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: '#c7c7c7',
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function(value) {
                                    // if (value >= 1000) {
                                    //     value /= 1000
                                    //     value += 'k'
                                    // }
                                    value = new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR'
                                    }).format(value);

                                    return value;
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle,
                            // barPercentage: 0.5, // Deprecated
                            // categoryPercentage: 0.5 // Deprecated
                        }]
                    }
                }
            })
        });
    </script>
@endsection