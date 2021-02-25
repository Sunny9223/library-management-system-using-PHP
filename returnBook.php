<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['admin'] != true) {
        header("Location: /");
    }
    ?>
    <?php include 'partials/_navbar.php'; 
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['success'])) {
    $success = $_GET['success'];
    if ($success == 'success') {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Success!</strong> Returned successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    }
    }
    ?>
    <!-- modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="partials/_takeReturn.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <label for="exampleFormControlInput1" class="form-label">Registration Number</label>
                            <input type="email" class="form-control" readonly name="registrationEdit"
                                id="registrationEdit" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Book Name</label>
                            <input type="email" class="form-control" readonly name="bookEdit" id="bookEdit"
                                placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Book S.No.</label>
                            <input type="email" class="form-control" readonly name="bookSnoEdit" id="bookSnoEdit"
                                placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Take Return</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- modal -->

    <div class="container my-4">
        <h2 class="text-center">Books to be Returned</h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Registration</th>
                    <th scope="col">Book</th>
                    <th scope="col">Book S.No.</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'partials/_dbconnect.php';
                $sql = "SELECT * FROM `issued_books` WHERE `status` = 2";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $registration = $row['registration'];
                    $status = $row['status'];
                    echo '<tr>
                    <td>' . $row["registration"] . '</td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["bookSno"] . '</td>
                    <td><button type="button" class="edit btn btn-sm btn-secondary">Approve</button>
                    </td>
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
            registration = tr.getElementsByTagName("td")[0].innerText;
            book = tr.getElementsByTagName("td")[1].innerText;
            bookSno = tr.getElementsByTagName("td")[2].innerText;
            console.log(registration, book, bookSno);
            registrationEdit.value = registration;
            bookEdit.value = book;
            bookSnoEdit.value = bookSno;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>