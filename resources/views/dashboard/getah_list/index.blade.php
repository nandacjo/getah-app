@extends('layouts.app')
@section('title', 'Daftar Getah')

@section('title-header', 'Daftar Getah')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Daftar Getah</li>
@endsection

@section('action_btn')
    <a href="{{ route('getah-list.create') }}" class="btn btn-default">Input Daftar Getah</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Filter Daftar Getah</h2>

                    <form action="" method="get">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="date_from">Periode Awal</label>
                                    <input type="date" class="form-control @error('date_from') is-invalid @enderror"
                                        id="date_from" placeholder="Periode Awal" value="{{ old('date_from') }}"
                                        name="date_from">

                                    @error('date_from')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <label for="date_to">Periode Akhir</label>
                                    <input type="date" class="form-control @error('date_to') is-invalid @enderror"
                                        id="date_to" placeholder="Periode Akhir" value="{{ old('date_to') }}"
                                        name="date_to">

                                    @error('date_to')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                    @php
                                        $date_from = request()->get('date_from');
                                        $date_to = request()->get('date_to');
                                        
                                        $isFilter = false;
                                        $routePdf = route('getah-list.print-pdf');
                                        $routeExcel = route('getah-list.print-excel');
                                        if ($date_from && $date_to) {
                                            $isFilter = true;
                                            $routePdf .= "?date_from=$date_from&date_to=$date_to";
                                            $routeExcel .= "?date_from=$date_from&date_to=$date_to";
                                        }
                                    @endphp
                                    <a target="_blank" href="{{ $routePdf }}" class="btn btn-sm btn-danger">PDF</a>
                                    <a href="{{ $routeExcel }}" target="_blank" class="btn btn-sm btn-success">Excel</a>
                                    <button type="reset" class="btn btn-sm btn-secondary">Reset Form</button>
                                    <a href="{{ route('getah-list.index') }}" class="btn mt-1 btn-sm btn-danger">Batalkan
                                        Filter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Daftar Getah</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-main" id="tbl-getah">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Uraian</th>
                                    <th colspan="9">Lokasi Sadapan yang Diperiksa</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Nama Penyadap</th>
                                    <th>Petak</th>
                                    <th>Luas</th>
                                    <th>Jumlah Pohon</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Nama Lokasi</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getahList as $item)
                                    <tr>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->uraian }}</td>

                                        <td>{{ $item->nama_penyadap }}</td>
                                        <td>{{ $item->petak }}</td>
                                        <td>{{ $item->luas }}</td>
                                        <td>{{ $item->jml_pohon }}</td>
                                        <td>{{ $item->target }}</td>
                                        <td>{{ $item->realisasi }}</td>
                                        <td>{{ $item->nama_lokasi }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>
                                            <img src="{{ asset('/uploads/images/' . $item->foto_keterangan) }}"
                                                alt="{{ $item->nama_penyadap }}" width="100">
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('getah-list.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('getah-list.destroy', $item->id) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $item->id }}')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id) {
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
