<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>eHotel</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
    <link rel="shortcut icon" href="{{ asset('image/f.png') }}" type="image/x-icon">
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script>
    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
</head>

<body>
    <div class="container-lg" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 ps-4 text-dark text-decoration-none">
                <span class="nm">Florida</span>
            </a>

            <div class="col d-flex justify-content-end align-items-center text-black-50">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-2 nav-link">Support</a>
                    </li>
                    <li>
                        <a href="#listfasilitas" class="px-3 active nav-link">Fasilitas</a>
                    </li>
                    <li><a href="#listbus" class="px-2 disabled nav-link">List Room</a></li>
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
    <div class="container">
        <img src="{{ asset('image/htl1.jpg') }}" class="htl" alt="">
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
        <div class="d-flex flt shadow-lg bg-white">
            <div class="py-5 px-5 d-flex">
                <div class="select me-3">
                    <label>Tipe Room</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example"
                        onchange="location = this.value">
                        <option value="" disabled selected hidden>-Pilih Tipe-</option>
                        @foreach ($jenis as $item)
                            <option value="/jenis/{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="select me-3">
                    <label>Amount Bed</label>
                    <select class="jnsbs" id="jns" aria-label="Default select example">
                        <option value="" disabled selected hidden>-Amount Bed-</option>
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
        <div class="lstfst" id="listfasilitas">
            <h1 class="text-center">Fasilitas</h1>
        </div>
        <div class="row mt-4 d-flex justify-content-center">
            @foreach ($fasilitas as $item)
                <div class="col-5 p-2 crd ">
                    <img src="{{ asset('image/fasilitas/' . $item->gambar) }}" class="ftkmr" alt="">
                    <div class="txtlist text-center">
                        <p class="jdl">{{ $item->nama }}</p>
                        <p>{{ $item->deskripsi }} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
