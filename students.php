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
                                <button id="add-btn" type="button" class="btn btn-primary"  >Add</button>
                                <button id="edit-btn" type="button"class="btn btn-primary"  >Edit</button>
                                <button id="delete-btn" type="button"class="btn btn-primary" >Delete</button>
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
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        <label class="form-label">
                                            <input type="search" id="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;" ></th>
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
                                            <td class="col" ><input id="check-all" class="form-check-input" type="checkbox" /> Check All</td>
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
    
<div id="popup" >
    <div id="popupadd">
        <div class="modal fade" id="popup-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <input type="text" class="form-control" id="studentLastName" name="studentLastName" value="" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="studentAge" class="form-label">Age</label>
                                                    <input type="date" class="form-control" id="studentAge" name="studentAge" value="" >
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
                                                    <input type="email" class="form-control" id="studentEmail" name="studentEmail" value="" >
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
    <div id="popupedit">
        <div class="modal fade" id="popup-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">edit Item</h5>
                                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form id="addStudentForm" method="POST" action="edit.php">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="studentFirstNameedit" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="studentFirstNameedit" name="studentFirstNameedit" value="" required>
                                                </div>
                                                <div class="mb-3">  
                                                    <label for="studentLastNameedit" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="studentLastNameedit" name="studentLastNameedit" value="" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="studentAgeedit" class="form-label">Age</label>
                                                    <input type="date" class="form-control" id="studentAgeedit" name="studentAgeedit" value="" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="studentNumedit" class="form-label">Num</label>
                                                    <input type="number" class="form-control" id="studentNumedit" name="studentNumedit" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="studentMatriculeedit" class="form-label">Matricule</label>
                                                    <input type="text" class="form-control" id="studentMatriculeedit" name="studentMatriculeedit" value="" required>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="studentEmailedit" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="studentEmailedit" name="studentEmailedit" value="" >
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
</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>


<script>
    //search
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

//ccheckalll
    document.getElementById('check-all').addEventListener('change', function() {
    var checkboxes = document.querySelectorAll('.form-check-input');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
});

    //addd
    $('#add-btn').click(function() {
        $('#studentFirstName').val('');
        $('#studentLastName').val('');
        $('#studentAge').val('');
        $('#studentNum').val('');
        $('#studentMatricule').val('');
        $('#studentEmail').val('');
        $('#popup-add').modal('show');
    });
    //edit
    $('#edit-btn').click(function() {
        var checkbox = $('input[type="checkbox"]:checked');
        if(checkbox.length === 1  ) { 
            var row = checkbox.closest('tr');
            var firstName = row.find('td:eq(1)').text();
            var lastName = row.find('td:eq(2)').text(); 
            var age = row.find('td:eq(3)').text();
            var num = row.find('td:eq(4)').text();
            var mat = row.find('td:eq(5)').text();
            var email = row.find('td:eq(6)').text();
            $('#popup-edit').modal('show');
            $('#studentFirstNameedit').val(firstName);
            $('#studentLastNameedit').val(lastName);
            $('#studentAgeedit').val(age);
            $('#studentNumedit').val(num);
            $('#studentMatriculeedit').val(mat);
            $('#studentEmailedit').val(email);
            
        }
        else if(checkbox.length > 1){
        alert('select just one row');
        }
        else {
        alert('No row selected');
        }
    });

    //delete
    $('#delete-btn').click(function() {
        var checkboxes = $('input[type="checkbox"]:checked');
        if(checkboxes.length > 0) { 
            if(confirm('Are you sure you want to delete ' + checkboxes.length + ' row(s)?')) {
                checkboxes.each(function() {
                    var row = $(this).closest('tr');
                    var mat = row.find('td:eq(5)').text(); 
                    console.log(mat);
                    $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { mat: mat },
                    success :function(response){
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors
                        console.log(textStatus, errorThrown);
                    },
                });

                });
            }
        } else {
            alert('No row selected');
        }
    });
</script>


</html>