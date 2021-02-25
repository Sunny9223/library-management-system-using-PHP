<!doctype html>
<html lang="en">
<?php
    session_start();
    if ($_SESSION['admin'] != true) {
        header("Location: /library");
    }
    ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>

    <?php include 'partials/_navbar.php'; ?>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['edit']))  {
        $edit = $_GET['edit'];
        if ($edit == 'success') {
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Success!</strong> Changed the details.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
}
    ?>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/library/partials/_bookEdit.php" method="POST">
                <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameEdit" name="nameEdit"
                                aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="authorEdit" name="authorEdit"
                                aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantityEdit" name="quantityEdit"
                                aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" hidden class="form-label">Quantity</label>
                        <input type="text" hidden class="form-control" id="snoVal" name="snoVal"
                                aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" hidden>Email address</label>
                        <input type="text" hidden class="form-control" id="bookVal" name="bookVal"
                                aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="container my-4">
        <h2 class="text-center">
            List of Books
        </h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col" hidden>Name</th>
                    <th scope="col" hidden>Name</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "partials/_dbconnect.php";
                $sql = "SELECT * FROM `books`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $username = $row['book'];
                    $quantity = $row['quantity'];
                    echo '<tr>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <td scope="row">' . $row["book"] . '</td>
                    <td>' . $row["author"] . '</td>
                    <td>' . $row["quantity"] . '</td>
                    <td hidden>' . $row["sno"] . '</td>
                    <td hidden>' . $row["book"] . '</td>
                    <td><button type="button" class="edit btn btn-sm btn-dark">Edit</button>
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
            name = tr.getElementsByTagName("td")[0].innerText;
            author = tr.getElementsByTagName("td")[1].innerText;
            quantity = tr.getElementsByTagName("td")[2].innerText;
            sno = tr.getElementsByTagName("td")[3].innerText;
            book = tr.getElementsByTagName("td")[4].innerText;
            console.log(name, author, quantity, sno, book);
            nameEdit.value = name;
            authorEdit.value = author;
            quantityEdit.value = quantity;
            snoVal.value = sno;
            bookVal.value = book;
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