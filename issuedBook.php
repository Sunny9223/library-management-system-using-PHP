<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['student'] != true) {
        header("location: /");
        exit;
    }
    ?>
    <?php include 'partials/_navbar.php'; ?>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['returnStatus']))  {
        $returnStatus = $_GET['returnStatus'];
        if ($returnStatus == 'success') {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Success!</strong> Please wait until you are confirmed by the college.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
}
    ?>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['getBook'])) {
        $getBook = $_GET['getBook'];
        if ($getBook == 'success') {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Success!</strong> Issued Successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        if ($getBook == 'notAvailable') {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> Book is not in Stock.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        if ($getBook == 'error') {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> You have already issued 4 books.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
    }
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
    ?>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="partials/_bookReturn.php" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" readonly class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <?php $registration = $_SESSION['registration']; ?>
                        <input type="hidden" name="registration" value="<?php echo $registration; ?>" id="snoEdit">
                        
                        <label for="exampleFormControlInput1" class="form-label">Book Sno</label>
                        <input type="text" readonly class="form-control" id="bookSnoEdit" name="bookSnoEdit" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Time when the book issued</label>
                        <input type="text" readonly class="form-control" id="tstampEdit" name="tstampEdit" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Return</button>
                </div>
            </div>
        </div>
        </form>
    </div>


    <div class="container my-4">
        <h2 class="text-center">
            List of Books
        </h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col" hidden>Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Book S.No.</th>
                    <th scope="col">Time</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "partials/_dbconnect.php";
                $sql = "SELECT * FROM `issued_books` WHERE `registration` = '$registration' AND `status`='1'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $row['sno'];
                    $username = $row['name'];
                    echo '<tr>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <th scope="row" hidden>' . $row["sno"] . '</th>
                    <td scope="row">' . $row["name"] . '</td>
                    <td>' . $row["bookSno"] . '</td>
                    <td>' . $row["tstamp"] . '</td>
                <td><button type="submit" class="edit btn-sm btn-danger">Return</button></td>
              </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName("td")[0].innerText;
                bookSno = tr.getElementsByTagName("td")[1].innerText;
                tstamp = tr.getElementsByTagName("td")[2].innerText;
                nameEdit.value = name;
                bookSnoEdit.value = bookSno;
                tstampEdit.value = tstamp;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>