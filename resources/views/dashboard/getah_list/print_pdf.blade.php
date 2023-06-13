<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Getah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <table class="table table-bordered table-main" id="tbl-getah">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th colspan="6">Lokasi Sadapan yang Diperiksa</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
