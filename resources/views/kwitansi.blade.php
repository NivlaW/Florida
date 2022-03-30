<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/kwitansi.css') }}">
    <title>eBusparwis</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <link rel="shortcut icon" href="{{ asset('image/f.png') }}" type="image/x-icon">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    -->
    <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body /onload="window.print()">
    <div>
        @foreach ($reserved as $item)
            <div class="page">
                <a href="/" class="nav-link text-black header p-4 mx-4">
                    <h2>Florida</h2>
                </a>
                <div class="kwtn mx-4">
                    <div class="atas px-5 py-5 d-flex justify-content-between">
                        <div class="nama float-left">
                            <h3 class="text-black-50">Client</h3>
                            <h2>{{ $item->client->nama }}</h2>
                        </div>
                        <div class="d-flex logo2 float-right tex-right align-self-end">
                            <div class="kanan text-end">
                                <h3 class="text-black-50">Kamar</h3>
                                <h2 class="align right">No {{ $item->room->no }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="blt d-flex justify-content-between">
                        <span class="kiri"></span>
                        <span class="kanan"></span>
                    </div>
                    <div class="tengah px-5 py-5">
                        <div class="mb-5 d-flex justify-content-between">
                            <div class="kiri">
                                <h3 class="text-black-50">Check In</h3>
                                <h2>{{ $item->mulai }}</h2>
                            </div>
                            <div class="kanan">
                                <h3 class="text-black-50 text-end">Check Out</h3>
                                <h2>{{ $item->selesai }}</h2>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="kiri col-4">
                                <h3 class="text-black-50">Jenis Room</h3>
                                <h2>{{ $item->room->jenis->nama }}</h2>
                            </div>
                            <div class="kanan col justify-content-center text-center">
                                <h3 class="text-black-50 text-center">Tipe Bed</h3>
                                <h2>{{ $item->room->bed }}</h2>
                            </div>
                            <div class="kanan col text-end">
                                <h3 class="text-black-50 ">Harga</h3>
                                <h2>{{ $item->room->harga }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="blt d-flex justify-content-between">
                        <span class="kiri"></span>
                        <span class="kanan"></span>
                    </div>
                    <div class="bawah px-5 py-5">
                        Terimakasih Telah memesan hotel kami di florida.com dan kami akan segera menghubungi anda
                        untuk melakukan pembayaran. Terima kasih.
                    </div>
                </div>
            </div>
        @endforeach
        <div class="page mx-4">
            <div class="header p-4 mx-4"></div>
            <div class="atas mt-4 px-5 py-5 d-flex justify-content-between">
                <div class="nama float-left">
                    <h3 class="text-black-50">Total Harga</h3>
                    <h2>Rp {{ $item->hargatotal }}</h2>
                </div>
                <div class="d-flex logo2 float-right tex-right align-self-end">
                    <div class="kanan text-end">
                        <h3 class="text-black-50">Jumlah Kamar</h3>
                        <h2 class="align right">{{ $jumlahkamar }}</h2>
                    </div>
                </div>
            </div>
            <div class="blt d-flex justify-content-between">
                <span class="kiri"></span>
                <span class="kanan"></span>
            </div>
            <div class="bawah px-5 py-5 dash">
                Terimakasih Telah memesan hotel kami di florida.com dan kami akan segera menghubungi anda
                untuk melakukan pembayaran. Terima kasih.
            </div>
        </div>
    </div>
    {{-- <div class="container-lg" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 ps-4 text-dark text-decoration-none">
                <span class="nm">Florida</span>
            </a>

            <div class="nav-menu">

            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center text-black-50">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-2 nav-link">Support</a>
                    </li>
                    <li><a href="#listbus" class="px-3 active nav-link">List Room</a></li>
                    <li class="knn">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="topo"></div>
    <div class="container-lg">
        <div class="rst"></div>
        <div class="tx">
            <div class="row">
                <div class="col-lg-6 px-5 py-4">
                    <h2 class="text-white">Comfort Room<span>.</span></h2>
                    <div class="col-lg-8">
                        <p class="text-white-50 ps-2">Comfort Your Turu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flt shadow-lg bg-white">
            <div class="py-5 px-5 d-flex">
                <div class="select me-3">
                    <label>Tipe Room</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example">
                        <option value="1">-Tipe Room-</option>
                        <option value="Big bus">Standard Room</option>
                        <option value="Medium Bus">Deluxe Room</option>
                    </select>
                </div>
                <div class="select me-3">
                    <label>Amount Bed</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example">
                        <option value="1">-Amount Bed-</option>
                        <option value="1">Single Bed</option>
                        <option value="2">Double Bed</option>
                        <option value="3">Twin Bed</option>
                    </select>
                </div>
                <div class="select me-3">
                    <label>Mulai</label>
                    <input type="date" class="tgl" required id="floatingInput" placeholder="mulai"
                        name="mulai">
                </div>
                <div class="select me-3">
                    <label>Selesai</label>
                    <input type="date" class="tgl" required id="floatingInput" placeholder="Selesai"
                        name="selesai">
                </div>
            </div>
            <a href="#listbus" class="slnjt shadow-lg">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="lstbs" id="listbus">
            <div class="d-flex justify-content-center align-center">
                <h1>Explore More Room</h1>
            </div>
            <div class="row mt-4">
                @foreach ($ebus as $item)
                    @if ($item->status == '1')
                        <div class="nav-link col-4 crd ">
                            <img src="{{ asset('image/kamar/' . $item->gambar) }}" class="ftkmr rsrvd" alt="">
                            <div class="txtlist">
                                <p class="jdl">{{ $item->jenis }}</p>
                                <p>No {{ $item->no }} | {{ $item->bed }} | Rp {{ $item->harga }}</p>
                            </div>
                        </div>
                    @else
                        <a href="/kamar/{{ $item->id }}" class="nav-link col-4 crd">
                            <img src="{{ asset('image/kamar/' . $item->gambar) }}" class="ftkmr" alt="">
                            <div class="txtlist">
                                <p class="jdl">{{ $item->jenis }}</p>
                                <p>No {{ $item->no }} | {{ $item->bed }} | Rp {{ $item->harga }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div> --}}
</body>

</html>
