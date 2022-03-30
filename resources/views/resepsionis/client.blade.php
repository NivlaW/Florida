<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/client.css') }}">
    <title>Resepsionis - eHotel</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <link rel="shortcut icon" href="{{ asset('image/f.png') }}" type="image/x-icon">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('simplidata/style.css') }}">
    <link rel="stylesheet" href="{{ asset('j-query/jquery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('simplidata/simple-datatables.js') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables-classic@latest/dist/style.css" rel="stylesheet"
        type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables-classic@latest" type="text/javascript"></script>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    -->
    {{-- <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container-lg" id="navbar">
        <nav id="noprint"
            class="d-print-none nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 ps-4 text-dark text-decoration-none">
                <span class="nm">Florida</span>
            </a>

            <div class="nav-menu">

            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center text-black-50">
                <ul class="nav col-12 col-sm-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-3 active nav-link">Client</a>
                    </li>
                    <li class="knn">
                        <a class="nav-link" href="{{ url('/admin/logout') }}">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="topo"></div>
    <div class="container-fluid">
        <div class="lstbs" id="listbus">
            <div class="d-flex justify-content-center align-center">
                <h1>Data Client</h1>
            </div>
            <div class="d-print-none d-flex justify-content-end">
                <button type="button" class=" btn add text-black shadow-sm " media="print" onclick="window.print()">
                    <i class="fa-solid fa-file-pdf"></i>
                    <b class="px-2">Print</b>
                </button>
            </div>
            <div class="row mt-4">
                <table class="table text-center table-hover tabel-reservasi" id="tabel-client">
                    <thead id="tabel-client">
                        <tr class="text-center">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Pemesan</th>
                            <th scope="col" class="text-center">Tipe Kamar</th>
                            <th scope="col" class="text-center">Tipe Bed</th>
                            <th scope="col" class="text-center">Check in</th>
                            <th scope="col" class="text-center">Check Out</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="d-print-none text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanan as $item)
                            <tr>
                                <th class="text-center" scope="col">{{ $loop->iteration }}</th>
                                <td>{{ $item->client->nama }}</td>
                                <td>{{ $item->room->jenis->nama }}</td>
                                <td>{{ $item->room->bed }}</td>
                                <td>{{ $item->mulai }}</td>
                                <td>{{ $item->selesai }}</td>
                                <td>Rp {{ $item->room->harga }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="d-print-none">
                                    <form action="/resepsionis/client" method="POST">
                                        @csrf
                                        <select onchange="this.form.submit()" name="status">
                                            <option value="" disabled selected hidden>-Pilih Status-</option>
                                            <option value="diproses">diproses</option>
                                            <option value="dipesan">dipesan</option>
                                            <option value="dibatalkan">dibatalkan</option>
                                            <option value="selesai">selesai</option>
                                        </select>
                                        <input type="hidden" name="id_kamar" value="{{ $item->room->id }}">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <button onclick="window.print()">Print this page</button> --}}
    <script src="{{ asset('j-query/jquery.min.js') }}"></script>
    <script src="{{ asset('simplidata/simple-datatables.js') }}"></script>
    <script>
        const tabel = document.querySelector('#tabel-client');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script>
        const dataTable = new DataTable("#tabel-client");
    </script> --}}
</body>

</html>
