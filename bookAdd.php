<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['admin'] != true) {
        header("Location: /library");
    }
    ?>
    <?php include 'partials/_navbar.php'; ?>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['bookAdd'])) {
                if (isset($_GET['bookAdd']) == 'true') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Added a book successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                else if (isset($_GET['bookAdd']) == 'false') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Something went wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
            }
        }
    ?>
    <div class="container my-4">
        <form action="partials/_addBook.php" method="post">
            <h2 class="text-center">Add a Book</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name of the Book</label>
                <input type="text" class="form-control" name="book" id="exampleFormControlInput1"
                    placeholder="Enter the name of the Book">
            </div>
            <!-- <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sno of the book</label>
                <input type="text" class="form-control" name="snoBook" id="exampleFormControlInput1">
            </div> -->
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                <input type="text" class="form-control" name="author" id="exampleFormControlInput1"
                    placeholder="Name of the author">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Choose your Branch</label>
                <select class="form-select" name="branch" aria-label="Default select example">
                    <option selected>Choose your Branch</option>
                    <option value="1">Computer Science Engineering</option>
                    <option value="2">Mechanical Engineering</option>
                    <option value="3">Electrical Engineering</option>
                    <option value="4">Metallurgy Engineering</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="exampleFormControlInput1">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
            <button type="reset" class="btn btn-info">Reset</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>