<?php
session_start();
 include 'config.php';
$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <?php include 'head.php';?>
<script>
    $(document).ready(function() {
        $('#tableteacher').DataTable({
        columnDefs: [
            {  "targets": [0], "searchable": false, "orderable": false} ,{"visible": true }
        ],
        order: [[ 1,'asc']],
        language: {
            search:"",
            searchPlaceholder: "Search",
            paginate: {
            previous: '<span class="fa fa-chevron-left"></span>',   
            next: '<span class="fa fa-chevron-right"></span>'
            },
            lengthMenu: 'Show <select class="form-control input-sm">'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">All</option>'
        }
    })  
    } );
</script>   
</head>
<body id="page-top">
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'header.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4 fw-bold">teachers</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">teachers Info</p>
                            </div>
                            <div class="btn-group float-end" role="group">
                                <button id="add-btn" type="button" class="btn btn-primary"  >Add</button>
                                <button id="edit-btn" type="button"class="btn btn-primary"  >Edit</button>
                                <button id="delete-btn" type="button"class="btn btn-primary" >Delete</button>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" >
                                <table class="table my-0 table-striped" id="tableteacher">
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
                                            <td class="col"  ><input id="check-all" class="form-check-input" type="checkbox"  <?php if ($result->num_rows === 0){ echo' disabled';} ?>/> Check All</td>
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
                    <form id="addteacherForm" method="POST" action="addteacher.php">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="teacherFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="teacherFirstName" name="teacherFirstName" value="" required>
                            </div>
                            <div class="mb-3">  
                                <label for="teacherLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="teacherLastName" name="teacherLastName" value="" >
                            </div>
                            <div class="mb-3">
                                <label for="teacherAge" class="form-label">Age</label>
                                <input type="date" class="form-control" id="teacherAge" name="teacherAge" value="" >
                            </div>
                            <div class="mb-3">
                                <label for="teacherNum" class="form-label">Num</label>
                                <input type="number" class="form-control" id="teacherNum" name="teacherNum" value="">
                            </div>
                            <div class="mb-3">
                                <label for="teacherMatricule" class="form-label">Matricule</label>
                                <input type="text" class="form-control" id="teacherMatricule" name="teacherMatricule" value="" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="teacherEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="teacherEmail" name="teacherEmail" value="" required >
                            </div>
                            <div class="mb-3">
                                        <label for="teachergroups" class="form-label" >Groups</label>
                                        <select id="teachergroups" name="group_ids[]" class="form-control" multiple >
                                            <?php
                                                $sql3 = "SELECT * FROM groupes";
                                                $result3 = $conn->query($sql3);
                                                if ($result3->num_rows > 0) {
                                                    while($row3 = $result3->fetch_assoc()) {
                                                        echo '<option value="'.$row3["id"].'">'.$row3["name"].'</option>';
                                                    }
                                                } else {
                                                    echo "<option value='0'>0 results</option>";
                                                }
                                            ?>*
                                        </select>
                                    </div>  
                        </div>
                        <div class="modal-footer">
                            <div id="message" class=" alert" ></div>
                            <div >
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Submit">Save changes</button>
                            </div>
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
                        <form id="editteacherForm" method="POST" action="editteacher.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="teacherFirstNameedit" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="teacherFirstNameedit" name="teacherFirstNameedit" value="" required>
                                </div>
                                <div class="mb-3">  
                                    <label for="teacherLastNameedit" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="teacherLastNameedit" name="teacherLastNameedit" value="" >
                                </div>
                                <div class="mb-3">
                                    <label for="teacherAgeedit" class="form-label">Age</label>
                                    <input type="date" class="form-control" id="teacherAgeedit" name="teacherAgeedit" value="" >
                                </div>
                                <div class="mb-3">
                                    <label for="teacherNumedit" class="form-label">Num</label>
                                    <input type="number" class="form-control" id="teacherNumedit" name="teacherNumedit" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="teacherMatriculeedit" class="form-label">Matricule</label>
                                   
                                    <input type="text" class="form-control readonly-disabled" id="teachermatriculeedit" name="teacherMatriculeedit" value="" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="teacherEmailedit" class="form-label">Email</label>
    
                                    <input type="email" class="form-control readonly-disabled" id="teacherEmailedit" name="teacherEmailedit" value="" readonly>
                                </div>
                                <div class="mb-3">
                                        <label for="teachergroups" class="form-label" >Groups</label>
                                        <select id="teachergroups" name="group_ids[]" class="form-control" multiple >
                                            <?php
                                                $sql3 = "SELECT * FROM groupes";
                                                $result3 = $conn->query($sql3);
                                                if ($result3->num_rows > 0) {
                                                    while($row3 = $result3->fetch_assoc()) {
                                                        echo '<option value="'.$row3["id"].'">'.$row3["name"].'</option>';
                                                    }
                                                } else {
                                                    echo "<option value='0'>0 results</option>";
                                                }
                                            ?>*
                                        </select>
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
        <div id="popupdelete" >
            <div class="modal fade" id="staticBackdrop"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>are you sure to delete </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="delete-btn" class="btn btn-primary">delete</button>
                        </div>
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
    $(document).ready(function() {
    $('#addteacherForm').on('submit', function(matunique) {
        matunique.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.indexOf("The")===0){
                    $('#message').html(response);
                }else{
                    location.reload();
                }
                
            }
        });
    });
});
    document.getElementById('check-all').addEventListener('change', function() {
    var checkboxes = document.querySelectorAll('.form-check-input');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
});
 
    $('#add-btn').click(function() {
        $('#teacherFirstName').val('');
        $('#teacherLastName').val('');
        $('#teacherAge').val('');
        $('#teacherNum').val('');
        $('#teacherMatricule').val('');
        $('#teacherEmail').val('');
        $('#message').html('');
        $('#popup-add').modal('show');
    });
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
            $('#teacherFirstNameedit').val(firstName);
            $('#teacherLastNameedit').val(lastName);
            $('#teacherAgeedit').val(age);
            $('#teacherNumedit').val(num);
            $('#teacherMatriculeedit').val(mat);
            $('#teachermatriculeedit').val(mat);
            $('#teacherEmailedit').val(email);

        }
        else if(checkbox.length > 1){
        alert('select just one row');
        }
        else {
        alert('No row selected');
        }
    });
    $('#delete-btn').click(function() {
        var checkboxes = $('input[type="checkbox"]:checked');
        if(checkboxes.length > 0) { 
            if(confirm('Are you sure you want to delete ')) {
                checkboxes.each(function() {
                    var row = $(this).closest('tr');
                    var mat = row.find('td:eq(5)').text();
                    var email= row.find('td:eq(6)').text(); 
                    $.ajax({
                    url: 'deleteteacher.php',
                    type: 'POST',
                    data: { mat: mat, email:email  },
                    success :function(response){
                        location.reload();
                    }
                });
                });
            }
        } else {
            alert('No row selected');
        }
    });
</script>
</html>