<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('beranda-assets') }}/style.css">

    {{-- iconscout --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    {{-- bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    {{-- datatable ---}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

    {{-- summernotes --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">


    <title>Admin Dashboard Panel</title>
</head>

<body>
    @include('beranda.nav');

    @yield('konten')

    <script src="{{ asset('beranda-assets') }}/script.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    {{-- tokenfield --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    
    @stack('child-scripts') --}}

    <script>
        const selectBtn = document.querySelector(".select-btn");
        const selectBtnUs = document.querySelector(".select-btn-us");
        const selectBtnMarguna = document.querySelector(".select-btn-marguna");
        const selectBtnIntrafood = document.querySelector(".select-btn-intrafood");
        const selectBtnStrive = document.querySelector(".select-btn-strive");
        const selectBtnHni = document.querySelector(".select-btn-hni");
        const selectBtnMdj = document.querySelector(".select-btn-mdj");
        const selectBtnCandy = document.querySelector(".select-btn-candy");

        items = document.querySelectorAll(".item");

        selectBtn.addEventListener("click", () => {
            selectBtn.classList.toggle("open");
        });
        selectBtnUs.addEventListener("click", () => {
            selectBtnUs.classList.toggle("open");
        });
        selectBtnMarguna.addEventListener("click", () => {
            selectBtnMarguna.classList.toggle("open");
        });
        selectBtnIntrafood.addEventListener("click", () => {
            selectBtnIntrafood.classList.toggle("open");
        });
        selectBtnStrive.addEventListener("click", () => {
            selectBtnStrive.classList.toggle("open");
        });
        selectBtnHni.addEventListener("click", () => {
            selectBtnHni.classList.toggle("open");
        });
        selectBtnMdj.addEventListener("click", () => {
            selectBtnMdj.classList.toggle("open");
        });
        selectBtnCandy.addEventListener("click", () => {
            selectBtnCandy.classList.toggle("open");
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('#briefing').summernote({
            placeholder: '',
            tabsize: 3,
            height: 320,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script>
        $('#meeting').summernote({
            placeholder: '',
            tabsize: 3,
            height: 320,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    <script>
        var latitude = document.getElementById("latitude");
        var longitude = document.getElementById("longitude");
        var kota = document.getElementById("kota");
        var kecamatan = document.getElementById("kecamatan");
        var provinsi = document.getElementById("provinsi");

        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                // console.log('ok')
            } else {
                latitude.value = "Geolocation is not supported by this browser.";
                longitude.value = "Geolocation is not supported by this browser.";
                // console.log('no')
            }
        }

        function showPosition(position) {
            latitude.value = position.coords.latitude;
            longitude.value = position.coords.longitude;
            accuracy.value = position.coords.accuracy;
            // console.log(latitude.value)
            // console.log(longitude.value)

            fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=` + latitude.value + `&longitude=` + longitude.value + `&localityLanguage=en`)

                // console.log(x)

                .then((response) => response.json())
                .then(
                    (data) => {
                        // console.log(data['city'])
                        provinsi.value = data['principalSubdivision'];
                        kota.value = data['city'];
                        kecamatan.value = data['locality'];
                    }

                );

        }

        // console.log(lat)

        // x = latitude;
        // console.log(latitude)
        // console.log(longitude)
        // console.log(accuracy)



        // fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=` + latitude + `&longitude=` + longitude + `&localityLanguage=en`)

        //     // console.log(x)

        //     .then((response) => response.json())
        //     .then(
        //         (data) => {
        //             console.log(data['city'])
        //             provinsi.value = data['principalSubdivision'];
        //             kota.value = data['city'];
        //             kecamatan.value = data['locality'];
        //         }

        //     );
    </script>




</body>

</html>