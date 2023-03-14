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

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    @include('beranda.nav');

    @yield('konten')

    <script src="{{ asset('beranda-assets') }}/script.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
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

        items = document.querySelectorAll(".item");

        selectBtn.addEventListener("click", () => {
            // console.log('aaaa')
            selectBtn.classList.toggle("open");
        });

        selectBtnUs.addEventListener("click", () => {
            // console.log('us')
            selectBtnUs.classList.toggle("open");
        });
    </script>


</body>
</html>