<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{isset($pageTitle) ? $pageTitle : 'Page'}} | CarUs</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">CarUs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cars">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link authentication" href="/admin">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="input-group-append row mr-4 w-50">
            <form action="/cars" method="GET" style="margin-left: 10px">
                <div class="input-group">
                    <input type="search" name="search" placeholder="Search for..." class="form-control">
                    <select class="custom-select" name="search_by" id="searchBy">
                        <option value="year" selected>Search by year</option>
                        <option value="model">Search by model</option>
                        <option value="manufacturer">Search by manufacturer</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; CarUs 2021</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.navbar-nav a').parent().removeClass('active');
            var url = window.location;
            $('.navbar-nav a').filter(function() {
                return this.href === url.href;
            }).parent().addClass('active');
        });
    </script>
</body>

</html>