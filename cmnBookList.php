<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    
    <?php include 'partials/_navbar.php'; ?>
   

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                        <input type="hidden" name="registration" value="<?php echo $registration; ?>">

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
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "partials/_dbconnect.php";
                $bid = $_GET['bid'];
                $sql = "SELECT * FROM `books` WHERE branch='$bid'";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    $username = $row['book'];
                    // $report = $row['snoBook'];
                    $quantity = $row['quantity'];
                    echo '<tr>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <th scope="row">' . $sno . '</th>
                    <td scope="row">' . $row["book"] . '</td>
                    <td>' . $row["author"] . '</td>
                    <td>' . $row["quantity"] . '</td>
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