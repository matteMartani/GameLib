<!DOCTYPE html>
<html>
<!-- header -->
<head>
    <title>@yield('titolo')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="{{url("/")}}/css/MyCSS.css" rel="stylesheet" type="text/css">

    <!-- Javascript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ url('/') }}/js/script.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

</head>

@yield('body')

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="{{url("/")}}/img/Logo.png" width="50" height="30" alt=""> GameLib </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- spazio fra il tag ul -->
            @yield('navbar')
        </div>
    </div>
</nav>


@yield('breadcrumb')


@yield('content')

<br>

<footer class="container">
    @yield('footer')
</footer>


</body>
</html>
