<?php
 include 'config.php';
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
session_start();

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="assets/js/jquery.min.js"></script>
</head>

<body id="page-top">
    
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include 'header.php'; ?>
                <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-2">
                    <h3 class="text-dark mb-4 fw-bold">Students</h3>
                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">Students Info</p>
                            </div>
                            <div class="btn-group float-end" role="group">
                                <button id="add-btn" type="button" class="btn btn-primary" onclick=" $('#exampleModal').modal('toggle');" >Add</button>
                                <button id="edit-btn" class="btn btn-primary" type="button" >Edit</button>
                                <button id="delete-btn" class="btn btn-primary" type="button">Delete</button>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                                      <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form id="addStudentForm" method="POST" action="add.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="studentFirstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="studentFirstName" name="studentFirstName" value="" required>
                                            </div>
                                            <div class="mb-3">  
                                                <label for="studentLastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="studentLastName" name="studentLastName" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="studentAge" class="form-label">Age</label>
                                                <input type="date" class="form-control" id="studentAge" name="studentAge" value="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="studentNum" class="form-label">Num</label>
                                                <input type="number" class="form-control" id="studentNum" name="studentNum" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="studentMatricule" class="form-label">Matricule</label>
                                                <input type="text" class="form-control" id="studentMatricule" name="studentMatricule" value="" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="studentEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="studentEmail" name="studentEmail" value="" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th ></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Age</th>
                                            <th>Num</th>
                                            <th>Matricule</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                              echo '<tr><td><input class="form-check-input" type="checkbox" /></td>
                                              <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg" />' . $row["firstname"]. 
                                              "</td><td>" . $row["lastname"]. 
                                              "</td><td>" . $row["age"]. 
                                              "</td><td>" . $row["num"]. 
                                              "</td><td>" . $row["matricule"]. 
                                              "</td><td>" . $row["email"]. "</td></tr>";
                                            }
                                          } else {
                                            echo "<tr>0 results</tr>";
                                          }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="col" ><input class="form-check-input" type="checkbox" /> Check All</td>
                                            <td><strong>First Name</strong></td>
                                            <td><strong>Last Name</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Num</strong></td>
                                            <td><strong>Matricule</strong></td>
                                            <td><strong>Email</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"></p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright ©2023 designed By Med Arafet khadraoui</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    // Handle checkbox change event
    document.querySelectorAll('.row-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', (event) => {
            if(event.target.checked) {
                // Checkbox is checked..
                var rowId = event.target.getAttribute('data-id');
                // Now you have the id of the row (assuming your table has a column 'id')
                // You can use this id to select the row in your database
            }
        });
    });

    // Handle edit button click event
    document.getElementById('edit-btn').addEventListener('click', (event) => {
        var checkedCheckboxes = document.querySelectorAll('.row-checkbox:checked');
        if(checkedCheckboxes.length > 0) {
            // At least one checkbox is checked
            var rowId = checkedCheckboxes[0].getAttribute('data-id');
            // Now you have the id of the first selected row
            // You can use this id to get the row data and fill the form

            // For example, if you have an input field with id 'studentFirstName' in your form:
            var firstName = document.querySelector('tr[data-id="' + rowId + '"] td:nth-child(3)').innerText;
            document.getElementById('studentFirstName').value = firstName;
            // and so on for the other fields...

        } else {
            // No checkbox is checked
            alert('No row selected');
        }
    });
});
</script>

</html>