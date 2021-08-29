<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commere</title>
    <!-- CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .custom-login {
            height: 500px;
            padding-top: 100px;
        }

        .carousel-inner {
            width: 800px;
            margin: 0 auto;

        }

        .carousel-caption.d-none.d-md-block {
            background-color: #90979573;
        }

        .carousel-control-prev-icon {
            background-color: brown;
            /* change fill="currentColor" to %23fff to make it white  */
            background-image: url('data:image/svg+xml,<svg class="bi bi-camera" width="1em" height="1em" viewBox="0 0 20 20" fill="%23fff " xmlns="http://www.w3.org/2000/svg"><path d="M11 7c-1.657 0-4 1.343-4 3a4 4 0 014-4v1z"/><path fill-rule="evenodd" d="M16.333 5h-2.015A5.97 5.97 0 0011 4a5.972 5.972 0 00-3.318 1H3.667C2.747 5 2 5.746 2 6.667v6.666C2 14.253 2.746 15 3.667 15h4.015c.95.632 2.091 1 3.318 1a5.973 5.973 0 003.318-1h2.015c.92 0 1.667-.746 1.667-1.667V6.667C18 5.747 17.254 5 16.333 5zM3.5 7a.5.5 0 100-1 .5.5 0 000 1zm7.5 8a5 5 0 100-10 5 5 0 000 10z" clip-rule="evenodd"/><path d="M4 5a1 1 0 011-1h1a1 1 0 010 2H5a1 1 0 01-1-1z"/></svg>') !important;
        }

        .carousel-control-next-icon {
            background-color: brown;
            /* change fill="currentColor" to %23fff to make it white  */
            background-image: url('data:image/svg+xml,<svg class="bi bi-bootstrap-fill" viewBox="0 0 20 20" fill="%23fff" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.002 2a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4V6a4 4 0 00-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.543-2.11H7.063V14zm1.313-4.875V6.658h1.78c.974 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H8.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H8.375v2.725z" clip-rule="evenodd"/></svg>') !important;
        }


        .carousel-control-next-icon,
        .carousel-control-prev-icon {
            /* Use to adjust size of icons */
            width: 3rem;
            height: 3rem;
        }

        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

    </style>
</head>

<body>
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>
