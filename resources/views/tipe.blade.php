<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tipe.css') }}">
    <title>eHotel</title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
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

<body>
    <div class="container-lg" id="navbar">
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
                    <li>
                        <a href="#listfasilitas" class="px-2 nav-link">Fasilitas</a>
                    </li>
                    <li><a href="#listbus" class="px-3 active nav-link">List Room</a></li>
                    <li class="knn">
                        <a class="nav-link" href="/login">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="topo"></div>
    <div class="container-lg">
        <img src="{{ asset('image/htl1.jpg') }}" class="htl" alt="">
        {{-- <div class="rst"></div> --}}
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
        <form action="/kamar" method="GET">
            @csrf
            <div class="flt justify-content-center shadow-lg bg-white">
                <div class="py-5 px-5 d-flex">
                    <div class="select me-3">
                        <label>Tipe Room</label>
                        <select class="jnsbs" id="jns" aria-label="Default select example"
                            onchange="location = this.value">
                            <option value="" disabled selected hidden>-Pilih Tipe-</option>
                            @foreach ($jenis as $item)
                                <option @if ($item->id == $id) value="{{ $item->id }}"  selected @endif
                                    value="/jenis/{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="select me-3">
                        <label>Amount Bed</label>
                        <select class="jnsbs" id="jns" aria-label="Default select example">
                            <option value="1">-Amount Bed-</option>
                            <option value="1">Single Bed</option>
                            <option value="2">Double Bed</option>
                            <option value="3">Twin Bed</option>
                        </select>
                    </div> --}}
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
                    <div class="align-middle float-center d-flex justify-content-center">
                        <a href="#listbus" class="align-self-center text-center slnjt shadow-lg">
                            <i class=" fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="lstbs" id="listbus">
                <div class="d-flex justify-content-center align-center">
                    <h1>Explore More Room</h1>
                </div>
                <div class="row listroom d-flex justify-content-center">
                    @foreach ($room as $item)
                        @if ($item->status == '1')
                            <div class="col-xxl-4 col-sm-5 crd ">
                                <img src="{{ asset('image/kamar/' . $item->gambar) }}" class="ftkmr rsrvd" alt="">
                                <div class="txtlist text-center">
                                    <p class="jdl">{{ $item->jenis->nama }}</p>
                                    <p>No {{ $item->no }} | {{ $item->bed }} | Rp {{ $item->harga }}</p>
                                </div>
                            </div>
                        @else
                            <div class="col-xxl-4 col-sm-5 my-0 mx-0">
                                <input name="id_kamar[]" type="checkbox" class="btn-check"
                                    id="btn-check-{{ $loop->iteration }}" value="{{ $item->id }}"
                                    autocomplete="off">
                                <label class="btn p-0 crd" for="btn-check-{{ $loop->iteration }}">
                                    <img src="{{ asset('image/kamar/' . $item->gambar) }}" class="ftkmr"
                                        alt="">
                                    <div class="txtlist">
                                        <p class="jdl">{{ $item->jenis->nama }}</p>
                                        <p>No {{ $item->no }} | {{ $item->bed }} | Rp {{ $item->harga }}</p>
                                    </div>
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="btm fixed-bottom w-100">
                <div class="container">
                    <div class="psn d-flex justify-content-end">
                        <button type="submit" class="m-2 btn-lg btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="lstfsl" id="listfasilitas">
            <div class="d-flex justify-content-center align-center">
                <h1>Fasilitas</h1>
            </div>
            <div class="row mt-4  d-flex justify-content-center">
                @foreach ($fasilitas as $item)
                    <div class="col-5 crd ">
                        <img src="{{ asset('image/fasilitas/' . $item->gambar) }}" class="ftfsl" alt="">
                        <div class="txtfsl text-center">
                            <p class="jdl">{{ $item->nama }}</p>
                            <p>{{ $item->deskripsi }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    @if ('success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Anda berhasil memilih tipe kamar selanjutnya pilih kamar yang tersedia',
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih kamar dan tanggal terlebih dahulu',
            })
        </script>
    @endif
</body>

</html>
