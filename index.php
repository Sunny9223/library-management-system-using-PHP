<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        .w-100 {
            height: 550px;
        }

        @media only screen and (max-width: 600px) {
            .w-100 {
                height: 340px;
            }
        }
    </style>
</head>

<body>
    <?php include 'partials/_navbar.php'; ?>
    <?php
    $loginStatus = 'none';
    $signupsuccess = 'none';
    $signuperror = 'none';
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['loginStatus'])) {
        $loginStatus = $_GET['loginStatus'];
        if ($loginStatus == 'true') {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Loggedin successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else if ($loginStatus == 'false') {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Error!</strong> Registration number or password is incorrect.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['adminPass'])) {
        $adminPass = $_GET['adminPass'];
        if ($adminPass == 'false') {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Error!</strong> Username or password is incorrect.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['signuperror']))  {
            $signuperror = $_GET['signuperror'];
            if ($signuperror == 'user') {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Error!</strong> User already exists.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
            else if($signuperror == 'wpass'){
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Error!</strong> Password doesnot matched.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        }
        if (isset($_GET['signupsuccess']))  {
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Account created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if (isset($_GET['logout']) == 'success')  {
                echo '<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Logged out successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if (isset($_GET['adminlogout']) == 'success')  {
                echo '<div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Logged out successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/3.png" height="565px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/2.png" height="565px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/1.png" height="565px" height="340px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-4">
        <h2 class="text-center mb-3">Find books by Branch</h2>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="img/cse.png" width="268px" alt="">
                        <h5 class="card-title">Computer Science Engineering</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="img/mechanical.png" width="268px" alt="">
                        <h5 class="card-title">Mechanical Engineering</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="img/metallurgy.png" width="268px" alt="">
                        <h5 class="card-title">Metallurgy Engineering</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="img/electrical.png" width="268px" alt="">
                        <h5 class="card-title">Electrical Engineering</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'partials/_footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>