<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['dashboard'] != true) {
        header("Location: /library");
    }
    ?>
    <?php include 'partials/_navbar.php'; ?>

    <div class="container my-4">
        <h2 class="text-center">Books to be Issued</h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Reg No</th>
                    <th scope="col">Book</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'partials/_dbconnect.php';
                $sql = "SELECT * FROM `issued_books` WHERE `status` = 0";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    $registration = $row['registration'];
                    $status = $row['status'];
                    echo '<tr>
  <th scope="row">' . $sno . '</th>
  <td>' . $row["registration"] . '</td>
  <td>' . $row["name"] . '</td>
  <td><button type="button" class="edit btn btn-sm btn-secondary">Approve</button>
  </td>
</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


    <div class="modal" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="form-group">
                        <label for="title">Username </label>
                        <input type="text" readonly class="form-control" id="registrationEdit" name="registrationEdit"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="title">Date of Birth </label>
                        <input type="text" readonly class="form-control" id="bookEdit" name="bookEdit"
                            aria-describedby="emailHelp">
                    </div>               
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Doctor Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="approved_documents.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="form-group">
                        <label for="title">Username </label>
                        <input type="text" readonly class="form-control" id="registrationEdit" name="registrationEdit"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="title">Date of Birth </label>
                        <input type="text" readonly class="form-control" id="bookEdit" name="bookEdit"
                            aria-describedby="emailHelp">
                    </div>               
                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="document" class="btn btn-primary">Disapprove</button>
                </div>
            </form>
        </div>
    </div>
</div> -->


    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                registration = tr.getElementsByTagName("td")[0].innerText;
                book = tr.getElementsByTagName("td")[1].innerText;
                console.log(registration, book);
                // doctor = tr.getElementsByTagName("td")[2].innerText;
                registrationEdit.value = registration;
                bookEdit.value = book;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
        </script>

  

</body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        </script>

</html>