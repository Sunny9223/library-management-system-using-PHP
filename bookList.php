<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true || $_SESSION['student']!=true) {
    header("location: /library");
    exit;
}
?>
    <?php include 'partials/_navbar.php'; ?>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Doctor Approval</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="partials/_getBook.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Name </label>
                            <input type="text" readonly class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
                        </div>
                        <?php $registration = $_SESSION['registration']; ?>
                        <input type="hidden" name="registration" value="<?php echo $registration; ?>" id="snoEdit">

                        <!-- <div class="form-group">
                            <label for="title" hidden>Sno Book</label>
                            <input type="text" hidden class="form-control" id="snoBookEdit" name="snoBookEdit" aria-describedby="emailHelp">
                        </div> -->
                        <div class="form-group">
                            <label for="title">Author Name </label>
                            <input type="text" readonly class="form-control" id="authorEdit" name="authorEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="address">Quantity</label>
                            <input type="text" readonly class="form-control" id="quantityEdit" name="quantityEdit" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="document" class="btn btn-primary">Grab</button>
                    </div>
                </form>
            </div>
        </div>
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
                    <th scope="col">Author</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "partials/_dbconnect.php";
                $sql = "SELECT * FROM `books` WHERE branch=1";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $row['sno'];
                    $username = $row['book'];
                    // $report = $row['snoBook'];
                    $quantity = $row['quantity'];
                    //   $username = $row['comment'];

                    // $description = strval($row["description"]);
                    echo '<tr>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <th scope="row" hidden>' . $row["sno"] . '</th>
                    <td scope="row">' . $row["book"] . '</td>
                    <td>' . $row["author"] . '</td>
                    <td>' . $row["quantity"] . '</td>
                <td><button type="submit" class="edit btn-sm btn-danger">Grab</button></td>
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
                console.log(name, author, quantity);
                nameEdit.value = name;
                authorEdit.value = author;
                quantityEdit.value = quantity;
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