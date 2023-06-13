@extends('layouts.app')
@section('title', 'Input Daftar Getah')

@section('title-header', 'Input Daftar Getah')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('getah-list.index') }}">Data Getah</a></li>
    <li class="breadcrumb-item active">Input Daftar Getah</li>
@endsection

@section('c_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        #map {
            height: 380px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Input Daftar Getah</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('getah-list.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        id="tanggal" placeholder="Tanggal " value="{{ old('tanggal') }}" name="tanggal">

                                    @error('tanggal')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="uraian">Uraian </label>
                                    <textarea class="form-control @error('uraian') is-invalid @enderror" id="uraian" placeholder="Isikan uraian kegiatan"
                                        name="uraian" cols="30" rows="10">{{ old('uraian') }}</textarea>

                                    @error('uraian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama_penyadap">Nama Mandor</label>
                                    <input type="text" class="form-control @error('nama_penyadap') is-invalid @enderror"
                                        id="nama_penyadap" placeholder="isikan nama mandor "
                                        value="{{ old('nama_penyadap') }}" name="nama_penyadap">

                                    @error('nama_penyadap')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="petak">Petak</label>
                                    <input type="text" class="form-control @error('petak') is-invalid @enderror"
                                        id="petak" placeholder="isikan kegiatan pada petak " value="{{ old('petak') }}"
                                        name="petak">

                                    @error('petak')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="luas">Luas</label>
                                    <input type="number" class="form-control @error('luas') is-invalid @enderror"
                                        id="luas" placeholder="isikan dlm jumlah hektar" value="{{ old('luas') }}"
                                        name="luas">

                                    @error('luas')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jml_pohon">Jumlah Pohon</label>
                                    <input type="number" class="form-control @error('jml_pohon') is-invalid @enderror"
                                        id="jml_pohon" placeholder="Jumlah" value="{{ old('jml_pohon') }}"
                                        name="jml_pohon">

                                    @error('jml_pohon')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="target">Target</label>
                                    <input type="number" class="form-control @error('target') is-invalid @enderror"
                                        id="target" placeholder="Target dalam kg" value="{{ old('target') }}"
                                        name="target">

                                    @error('target')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="realisasi">Realisasi</label>
                                    <input type="number" class="form-control @error('realisasi') is-invalid @enderror"
                                        id="realisasi" placeholder="Realisasi dlm kg" value="{{ old('realisasi') }}"
                                        name="realisasi">

                                    @error('realisasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="foto_keterangan">Foto Keterangan</label>
                                    <input type="file"
                                        class="form-control @error('foto_keterangan') is-invalid @enderror"
                                        id="foto_keterangan" placeholder="Foto Keterangan Daftar Getah"
                                        name="foto_keterangan">

                                    @error('foto_keterangan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Map leaflet -->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <div id="map"></div>
                            </div>
                        </div>
                        <!-- Map leaflet end -->

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12">
                                <button type="button" class="btn btn-sm btn-primary" onclick="getLocation()">
                                    <i class="fas fa-map-marker-alt"></i> Dapatkan
                                    Lokasi Saya</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="nama_lokasi">Nama Lokasi</label>
                                    <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror"
                                        id="nama_lokasi" placeholder="Nama lokasi" value="{{ old('nama_lokasi') }}"
                                        name="nama_lokasi">

                                    @error('nama_lokasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                        id="longitude" placeholder="Longitude " value="{{ old('longitude') }}"
                                        name="longitude">

                                    @error('longitude')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                        id="latitude" placeholder="Latitude" value="{{ old('latitude') }}"
                                        name="latitude">

                                    @error('latitude')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Input</button>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        var map = L.map('map').setView([-6.1754, 106.8272], 13); // Koordinat Jakarta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Untuk mengambil posisi saat ini
        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(map).bindPopup("Lokasi Anda saat ini").openPopup();
            L.circle(e.latlng, radius).addTo(map);
        }

        // jik terjadi error
        function onLocationError(e) {
            alert(e.message);
        }

        // fungsi ketika tombol ambil posisi di penect
        function getLocation() {
            if (navigator.geolocation) {
                map.locate({
                    setView: true,
                    maxZoom: 16
                });
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);
        // end

        // buat fungsi popup saat map diklik
        var currentMarker = null;

        function onMapClick(e) {
            let longitude = document.getElementById('longitude').value = e.latlng.lng;
            let latitude = document.getElementById('latitude').value = e.latlng.lat;
            if (currentMarker != null) {
                map.removeLayer(currentMarker);
            }
            let long = e.latlng.lng;
            let lat = e.latlng.lat;
            // tambahkan marker baru
            //value pada form latitde, longitude akan berganti secara otomatis
            currentMarker = L.marker([lat, long], {
                draggable: true
            }).addTo(map);

            currentMarker.on('dragend', function(event) {
                var marker = event.target;
                var position = marker.getLatLng();
                console.log(position);

                let longitude = document.getElementById('longitude');
                let latitude = document.getElementById('latitude');

                longitude.value = position.lng;
                latitude.value = position.lat;
            });
        }

        map.on('click', onMapClick); //jalankan fungsi
    </script>
@endsection
