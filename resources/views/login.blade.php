<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body>
        <div class="container-fluid w-100 min-vh-100 p-0 m-0 ">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">TL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/">Register</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="http://127.0.0.1:8000/login">Login<span
                                    class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="d-flex align-items-center justify-content-center bg-light w-100 min-vh-100 p-0">
                <div class="d-flex align-items-center justify-content-center w-100 h-75">
                    <form class="col-sm-12 col-md-6 col-lg-4 col-xl-3" method="post" action="/auth/login">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-flex justify-content-center w-100 mt-5">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
                crossorigin="anonymous"></script>
    </body>

</html>
