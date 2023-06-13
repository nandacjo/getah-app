@extends('layouts.app')
@section('title', 'Ubah Daftar Getah')

@section('title-header', 'Ubah Daftar Getah')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('getah-list.index') }}">Data Getah</a></li>
    <li class="breadcrumb-item active">Ubah Daftar Getah</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Daftar Getah</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('getah-list.update', $getah->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tanggal">Tanggal Daftar Getah</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        placeholder="Tanggal Daftar Getah" value="{{ old('tanggal', $getah->tanggal) }}" name="tanggal">

                                    @error('tanggal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="uraian">Uraian Daftar Getah</label>
                                    <textarea class="form-control @error('uraian') is-invalid @enderror" id="uraian"
                                    placeholder="Uraian Daftar Getah" name="uraian" cols="30" rows="10">{{ old('uraian', $getah->uraian) }}</textarea>

                                    @error('uraian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama_penyadap">Nama Penyadap Daftar Getah</label>
                                    <input type="text" class="form-control @error('nama_penyadap') is-invalid @enderror" id="nama_penyadap"
                                        placeholder="Nama Penyadap Daftar Getah" value="{{ old('nama_penyadap', $getah->nama_penyadap) }}" name="nama_penyadap">

                                    @error('nama_penyadap')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="petak">Petak Daftar Getah</label>
                                    <input type="text" class="form-control @error('petak') is-invalid @enderror" id="petak"
                                        placeholder="Petak Daftar Getah" value="{{ old('petak', $getah->petak) }}" name="petak">

                                    @error('petak')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="luas">Luas Daftar Getah</label>
                                    <input type="number" class="form-control @error('luas') is-invalid @enderror" id="luas"
                                        placeholder="Luas Daftar Getah" value="{{ old('luas', $getah->luas) }}" name="luas">

                                    @error('luas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jml_pohon">Jumlah Pohon Getah</label>
                                    <input type="number" class="form-control @error('jml_pohon') is-invalid @enderror" id="jml_pohon"
                                        placeholder="Jumlah Pohon Getah" value="{{ old('jml_pohon', $getah->jml_pohon) }}" name="jml_pohon">

                                    @error('jml_pohon')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="target">Target Pohon Getah</label>
                                    <input type="number" class="form-control @error('target') is-invalid @enderror" id="target"
                                        placeholder="Target Pohon Getah" value="{{ old('target', $getah->target) }}" name="target">

                                    @error('target')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="realisasi">Realisasi Pohon Getah</label>
                                    <input type="number" class="form-control @error('realisasi') is-invalid @enderror" id="realisasi"
                                        placeholder="Realisasi Pohon Getah" value="{{ old('realisasi', $getah->realisasi) }}" name="realisasi">

                                    @error('realisasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="foto_keterangan">Foto Keterangan Daftar Getah</label>
                                    <input type="file" class="form-control @error('foto_keterangan') is-invalid @enderror"
                                        id="foto_keterangan" placeholder="Foto Keterangan Daftar Getah"
                                        name="foto_keterangan">

                                    @error('foto_keterangan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
