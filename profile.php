<?php

session_start();
$email=$_SESSION['email'];
//ggdgmrdkgd
//$firstname=$_SESSION['fistname'];
//$lastname=$_SESSION['lastname'];
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    	<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
</head>

<body id="page-top">
    
    <div id="wrapper">
        <?php include 'navbar.php';?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include 'header.php';?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <div class="image_area">
                                        <form method="post">
                                            <label for="upload_image">
                                                <img class="rounded-circle mb-3 mt-4 img-responsive"  id="uploaded_image" src="assets/img/dogs/image2.jpeg" width="160" height="160"  class="img-responsive img-circle" />
                                                <input type="file" name="image" class="image" id="upload_image" style="display: none;" >
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small fw-bold">Server migration<span class="float-end">20%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="visually-hidden">20%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Sales tracking<span class="float-end">40%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="visually-hidden">40%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Customer Database<span class="float-end">60%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="visually-hidden">60%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Payout Details<span class="float-end">80%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="visually-hidden">80%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Account setup<span class="float-end">Complete!</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="updatesettings.php" method="post" >
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="matricule">
                                                                <strong>Matricule</strong>
                                                            </label>
                                                            <input class="form-control " type="text" name="matri" id="matricule" placeholder="matricule" disabled  value=<?php echo" $mat "?>></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email">
                                                                <strong>Email Address</strong>
                                                            </label>
                                                            <input class="form-control formuser" name="emaile" type="email" id="email" placeholder="user@example.com" disabled  value=<?php echo" $email "?>></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="first_name">
                                                                <strong>First Name</strong>
                                                            </label>
                                                            <input class="form-control formuser" type="text" id="first_name" name="first_name" placeholder="John" disabled value=<?php echo" $firstname "?>></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="last_name">
                                                                <strong>Last Name</strong>
                                                            </label>
                                                            <input class="form-control formuser" type="text" id="last_name" name="last_name" placeholder="Doe" disabled  value=<?php echo" $lastname "?>></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button id="saveuser" class="btn btn-primary btn-sm" type="submit" disabled>Save Settings</button>
                                                    <button class="btn btn-secondary btn-sm" id="edituser" >Edit</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control formcontact" disabled type="text" id="address" placeholder="Sunset Blvd, 38" name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control formcontact" disabled type="text" id="city" placeholder="Los Angeles" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control formcontact" disabled type="text" id="country" placeholder="USA" name="country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                <button id="savecontact" class="btn btn-primary btn-sm" type="submit" disabled>Save Settings</button>
                                                <button class="btn btn-secondary btn-sm" id="editcontact" >Edit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Forum Settings</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form>
                                        <div class="mb-3"><label class="form-label" for="signature"><strong>Signature</strong><br></label><textarea class="form-control formforum" id="signature" rows="4" name="signature"></textarea></div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Notify me about new replies</strong></label></div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                    </form>
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

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">x</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        		<button type="button" class="btn btn-primary" id="crop">Crop</button>
			      		</div>
			    	</div>
			  	</div>
			</div>	
    <script>



$("#edituser").click(function(){
    $(".formuser ").prop('disabled', false);
    $("#matricule").prop('disabled',false);
    $("#matricule").prop('readonly',true);
    $("#saveuser ").prop('disabled', false);
    $(this).prop('disabled', true);

});

$("#editcontact").click(function(){
    $(".formcontact ").prop('disabled', false);
    $("#savecontact ").prop('disabled', false);
    $(this).prop('disabled', false);

});





</script>

<script>

$(document).ready(function(){	
	var $modal = $('#modal');
	var image = document.getElementById('sample_image');
	var cropper;
    $('#upload_button').click(function() {
    $('#upload_image').click();
}); 

	$('#upload_image').change(function(event){
    	var files = event.target.files;
    	var done = function (url) {
      		image.src = url;
      		$modal.modal('show');
    	};
    	if (files && files.length > 0)
    	{
			reader = new FileReader();
			reader.onload = function (event) {
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});
	$modal.on('shown.bs.modal', function() {
    	cropper = new Cropper(image, {
    		aspectRatio: 1,
    		viewMode: 3,
    		preview: '.preview'
    	});
	}).on('hidden.bs.modal', function() {
   		cropper.destroy();
   		cropper = null;
	});
	$("#crop").click(function(){
    	canvas = cropper.getCroppedCanvas({
      		width: 400,
      		height: 400,
    	});
    	canvas.toBlob(function(blob) {
        	var reader = new FileReader();
         	reader.readAsDataURL(blob); 
         	reader.onloadend = function() {
            	var base64data = reader.result;  

            	$.ajax({
            		url: "upload.php",
                	method: "POST",                	
                	data: {image: base64data},
                	success: function(data){
                    	console.log(data);
                    	$modal.modal('hide');
                    	$('#uploaded_image').attr('src', data);
                        $('#header_image').attr('src', data);
                	}
              	});
         	}
    	});
    });
	
});
</script>


</body>

</html>