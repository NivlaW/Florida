<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/edit.css') }}">
    <title>Edit Room - eHotel</title>
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
                    <li><a href="#listbus" class="px-3 active nav-link">Edit</a></li>
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
        <div class="rstt"></div>
        <div class="rst shadow">
            <div class="row d-flex">
                <div class="col-lg-6 p-5 z-1">
                    <img src="{{ asset('image/kamar/' . $room->gambar) }}" alt="" class="kmr">
                </div>
                <div class="txt col-lg-6 py-5">
                    <div class="col-lg-6">
                        <p class=" ps-2">No {{ $room->no }}</p>
                    </div>
                    <h2 class="">{{ $room->jenis->nama }}<span>.</span></h2>
                    <h3 class="px-1">{{ $room->bed }}</h3>
                    <h3 class="px-1">Rp {{ $room->harga }},- /Malam</h3>
                </div>
                <p class="desk">{{ $room->deskripsi }}</p>
            </div>
        </div>
        <div class="lstbs" id="listbus">
            <div class="d-flex justify-content-center align-center">
                <h1>Edit Database</h1>
            </div>
        </div>
        <form action="/admin/dashboard/{{ $room->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flt shadow bg-white">
                <div class="py-5 px-5">
                    <div class="form-floating pb-3">
                        <input type="text" class="form-control frm" id="floatingInput" name="no" required
                            placeholder="No" value="{{ $room->no }}">
                        <label for="floatingInput">No</label>
                    </div>
                    <div class="form-floating pb-3">
                        <input type="text" class="form-control frm" id="floatingInput" name="jenis" required
                            placeholder="Tipe Room" value="{{ $room->id_jenis }}">
                        <label for="floatingInput">Tipe Room</label>
                    </div>
                    <div class="form-floating pb-3">
                        <input type="text" class="form-control frm" id="floatingInput" name="bed" required
                            placeholder="Amount Bed" value="{{ $room->bed }}">
                        <label for="floatingInput">Amount Bed</label>
                    </div>
                    <div class="form-floating pb-3">
                        <textarea type="text" class="form-control frm" id="floatingInput" name="deskripsi" required placeholder="Description"
                            rows="10" cols="55">{{ $room->deskripsi }}</textarea>
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating pb-3">
                        <input type="text" class="form-control frm" id="floatingInput" name="harga" required
                            placeholder="Harga" value="{{ $room->harga }}">
                        <label for="floatingInput">Harga</label>
                    </div>
                    <div class="form-floating pb-3">
                        <input type="file" class="form-control frm custom-file-input" id="floatingInput" name="gambar"
                            id="gambar" value="{{ $room->gambar }}">
                        <input type="hidden" class="form-control frm custom-file-input" id="floatingInput"
                            name="gambarLama" id="gambar" value="{{ $room->gambar }}">
                        <img src="{{ asset('image/kamar/' . $room->gambar) }}" class="gmbredt" alt="">
                        <label for="floatingInput">Gambar</label>
                    </div>
                    <div class="d-flex justify-content-end align-right tmbl">
                        <button class="btn btncncl btn-secondary ">Cancel</button>
                        <button type="submit" class="btn btnadd btn-primary ms-2">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
