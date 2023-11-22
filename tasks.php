<?php 
session_start();
include 'config.php';
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<!-- data table -->
<script>
    $(document).ready(function() {
        $('#tabletasks').DataTable({
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
<body id="page-top">
    <div id="wrapper" >
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'header.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4 fw-bold">tasks</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block " role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3 flex-row justify-content-between align-items-center">
                            <div class="col-auto float-start pt-2">
                                <p class="text-primary fw-bold">tasks info</p>
                            </div>
                            <div class="btn-group float-end" role="group">
                                <button id="add-btntask" type="button" class="btn btn-primary"  >Add</button>
                                <button id="edit-btntask" type="button"class="btn btn-primary"  >Edit</button>
                                <button id="delete-btn" type="button"class="btn btn-primary" >Delete</button>
                            </div>
                            
                        </div>
                        <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" >
                                <table class="table my-0 table-striped" id="tabletasks">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;" ></th>
                                            <th>task name</th>
                                            <th>teacher task</th>
                                            <th>task started</th>
                                            <th>task deadline</th>
                                            <th>description</th>
                                            <!-- <th>task status</th>
                                            <th>action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                              echo '<tr><td><input class="form-check-input" type="checkbox" /></td>
                                              <td>' . $row["task_title"]. 
                                              "</td><td>" . $row["teachertask_name"]. 
                                              "</td><td>" . $row["task_started"]. 
                                              "</td><td>" . $row["task_deadline"]. 
                                              "</td><td>" . $row["description"]."</td></tr>";
                                            }
                                          } else {
                                            echo "<tr>0 results</tr>";
                                          }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="col"  ><input id="check-all" class="form-check-input" type="checkbox" /> Check All</td>
                                            <td><strong>task name</strong></td>
                                            <td><strong>teacher task</strong></td>
                                            <td><strong>task started</strong></td>
                                            <td><strong>task deadline</strong></td>
                                            <td><strong>description</strong></td>
                                            <!-- <td><strong>task status</strong></td>
                                            <td><strong>action</strong></td> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <footer class="bg-white sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>Copyright ©2023 designed By Med Arafet khadraoui</span></div>
                        </div>
                    </footer>
                </div>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>

    <div id="popup" >
        <div id="popupadd">
            <div class="modal fade" id="popup-addtask" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="addtaskForm" method="post" action="addtask.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="tasktitle" class="form-label">tasktitle</label>
                                    <input type="text" class="form-control" id="tasktitle" name="tasktitle" value="" required>
                                </div>
                                <div class="mb-3">  
                                    <label for="taskstarted" class="form-label">taskstarted</label>
                                    <input type="date" class="form-control" id="taskstarted" name="taskstarted" value=""  >
                                </div>
                                <div class="mb-3">
                                    <label for="taskdeadline" class="form-label">taskdeadline</label>
                                    <input type="date" class="form-control" id="taskdeadline" name="taskdeadline" value="" >
                                </div>
        
                                <div class="mb-3">
                                    <label for="description" class="form-label">description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="" required>
                                </div>                          
                                
                                <div class="mb-3">
                                    <label for="taskGroupe" class="form-label">Groupe</label>
                                    <select  class="form-control" id="taskGroupe" name="taskgroupe" value="" required>
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
            <div class="modal fade" id="popup-edittask" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">edit Item</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="edittaskForm" method="post" action="edittask.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="tasktitleedit" class="form-label">tasktitle</label>
                                    <input type="text" class="form-control" id="tasktitleedit" name="tasktitleedit" value="" required>
                                </div>
                                <div class="mb-3">  
                                    <label for="taskstartededit" class="form-label">taskstarted</label>
                                    <input type="date" class="form-control" id="taskstartededit" name="taskstartededit" value=""  >
                                </div>
                                <div class="mb-3">
                                    <label for="taskdeadlineedit" class="form-label">taskdeadline</label>
                                    <input type="date" class="form-control" id="taskdeadlineedit" name="taskdeadlineedit" value="" >
                                </div>
        
                                <div class="mb-3">
                                    <label for="descriptionedit" class="form-label">description</label>
                                    <input type="text" class="form-control" id="descriptionedit" name="descriptionedit" value="" required>
                                </div>                          
                                
                                <div class="mb-3">
                                    <label for="taskGroupeedit" class="form-label">Groupe</label>
                                    <select  class="form-control" id="taskGroupeedit" name="taskgroupeedit" value="" required>
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
                                    <button type="submit" class="btn btn-primary" value="Submit">edit</button>
                                </div>
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
//         document.getElementById('check-all').addEventListener('change', function() {
//     var checkboxes = document.querySelectorAll('.form-check-input');
//     for (var i = 0; i < checkboxes.length; i++) {
//         checkboxes[i].checked = this.checked;
//     }
// });
$(document).ready(function() {
    $('#add-btntask').click(function() {
        console.log('Add button clicked');
       
    });
});
    // $('#edit-btn').click(function() {
    //     var checkbox = $('input[type="checkbox"]:checked');
    //     if(checkbox.length === 1  ) { 
    //         var row = checkbox.closest('tr');
    //         var tasktitle = row.find('td:eq(1)').text();
    //         var taskstarted = row.find('td:eq(2)').text(); 
    //         var taskdeadline = row.find('td:eq(3)').text();
    //         var description = row.find('td:eq(4)').text();
    //         var taskGroupe = row.find('td:eq(5)').text();
    //         var email = row.find('td:eq(6)').text();
    //         var group =row.find('td:eq(7)').text();
    //         $('#popup-edittask').modal('show');
    //         $('#studentFirstNameedit').val(firstName);
    //         $('#studentLastNameedit').val(lastName);
    //         $('#studentAgeedit').val(age);
    //         $('#studentNumedit').val(num);
    //         $('#studentmatriculeedit').val(mat);
    //         $('#studentEmailedit').val(email);
    //         $('#studentGroupeedit').val(group);

            
    //     }
    //     else if(checkbox.length > 1){
    //     alert('select just one row');
    //     }
    //     else {
    //     alert('No row selected');
    //     }
    // });

    // $('#delete-btn').click(function() {
    //     var checkboxes = $('input[type="checkbox"]:checked');
    //     if(checkboxes.length > 0) { 
    //         if(confirm('Are you sure you want to delete ')) {
    //             checkboxes.each(function() {
    //                 var row = $(this).closest('tr');
    //                 var mat = row.find('td:eq(5)').text();
    //                 var email= row.find('td:eq(6)').text(); 
    //                 $.ajax({
    //                 url: 'deletestudent.php',
    //                 type: 'POST',
    //                 data: { mat: mat, email:email  },
    //                 success :function(response){
    //                     location.reload();
    //                 }
    //             });

    //             });
    //         }
    //     } else {
    //         alert('No row selected');
    //     }
    // });
</script>
</html>