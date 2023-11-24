<?php
session_start();
 include 'config.php';

$sql = "SELECT students.*, groupes.name AS group_name FROM students LEFT JOIN groupes ON students.group_id = groupes.id";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM groupes";
$result2 = $conn->query($sql2);

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<?php include 'head.php'; ?>
<!-- datatable-->
<script>
    $(document).ready(function() {
        $('#tablestudent').DataTable({
        columnDefs: [
            {  "targets": [0], "searchable": false, "orderable": false} ,{"visible": true }
        ],buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
                                <button  type="button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" >
                                <table class="table my-0 table-striped" id="tablestudent">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;" ></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Age</th>
                                            <th>Num</th>
                                            <th>Matricule</th>
                                            <th>Email</th>
                                            <th>Classe</th>
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
                                              "</td><td>" . $row["email"]. 
                                              "</td><td>".$row["group_name"]."</td></tr>";
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
                                            <td><strong>Classe</strong></td>
                                        </tr>
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
            <div class="modal fade" id="popup-add" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="addStudentForm" method="post" action="addstudent.php">
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
                                    <input type="email" class="form-control" id="studentEmail" name="studentEmail" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="studentGroupe" class="form-label">Groupe</label>
                                    <select  class="form-control" id="studentGroupe" name="studentgroupe" value="" required>
                                        <?php
                                            
                                            if ($result2->num_rows > 0) {
                                                while($row2 = $result2->fetch_assoc()) {
                                                    echo "<option value='" . $row2["id"] . "'>" .$row2["name"] . "</option>";
                                                }
                                            } else {
                                            echo "0 results";
                                            }
                                            $result2 = $conn->query($sql2);

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div id="message" class=" alert" ></div>
                                <div >
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" value="Submit">Add</button>
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
                        <form id="editStudentForm" method="post" action="editstudent.php">
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
                                    <label for="studentmatriculeedit" class="form-label">Matricule</label>
                                    <input type="text" class="form-control readonly-disabled" id="studentmatriculeedit" name="studentmatriculeedit" value="" readonly>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="studentEmailedit" class="form-label">Email</label>
                                    <input type="email" class="form-control readonly-disabled" id="studentEmailedit" name="studentemailedit" value="" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="studentGroupeedit" class="form-label">Groupe</label>
                                    <select  class="form-control" id="studentGroupeedit" name="studentgroupeedit" value="" required>
                                        <?php
                                            
                                            if ($result2->num_rows > 0) {
                                                while($row2 = $result2->fetch_assoc()) {
                                                    echo "<option value='" . $row2["id"] . "'>" .$row2["name"] . "</option>";
                                                }
                                            } else {
                                            echo "0 results";
                                            }
                                            $result2 = $conn->query($sql2);
                                        ?>
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

</body>


<script>

    $(document).ready(function() {
    $('#addStudentForm').on('submit', function(matunique) {
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
        $('#studentFirstName').val('');
        $('#studentLastName').val('');
        $('#studentAge').val('');
        $('#studentNum').val('');
        $('#studentMatricule').val('');
        $('#studentEmail').val('');
        $('#message').html('');
        $('#studentGroupeedit').html('');
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
            var group =row.find('td:eq(7)').text();
            $('#popup-edit').modal('show');
            $('#studentFirstNameedit').val(firstName);
            $('#studentLastNameedit').val(lastName);
            $('#studentAgeedit').val(age);
            $('#studentNumedit').val(num);
            $('#studentmatriculeedit').val(mat);
            $('#studentEmailedit').val(email);
            $('#studentGroupeedit').val(group);

            
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
                    url: 'deletestudent.php',
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