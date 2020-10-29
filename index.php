<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Form Page</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Form Page</span>
                      </a>
          </li>
          
          <li><a class="" href="basic_table.php">User List</a></li>

         

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Page
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form validations
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="fupForm" name="form1" method="post" action="">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="name" name="name"  type="text" value="" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="email" name="email" value="" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Phone</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="phone" name="phone"  type="text" value="" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">DOB <span class="required">*</span></label>
                      <div class="col-lg-10">
                      <input class="form-control" id="DOB" name="DOB"  type="date" value="" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Sex</label>
                      <div class="col-lg-10">
                      <input class="form-control" id="Sex" name="Sex"  type="text" value="" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" id="save" type="button">Submit</button>
                        
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
        
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
         
        </div>
    </div>
  </section>
  <!-- container section end -->

  <!-- javascripts -->

 

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
 
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <!-- <script src="js/form-validation-script.js"></script> -->
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <script>
$(document).ready(function() {
	$('#save').on('click', function() {
  
		var name = $('#name').val();
		var email = $('#cemail').val();
		var phone = $('#phone').val();
		var dob = $('#DOB').val();
    var Sex = $('#Sex').val();
    
   var dataString = 'insert=' + 'insert' + '&name=' + name + '&email=' + email + '&phone=' + phone + '&dob=' + dob + '&Sex=' + Sex;
   //console.log(dataString); 
   if(name!="" && email!="" && phone!="" && dob!="" && Sex!=""){
			$.ajax({
				url: "crud.php",
				type: "POST",
        data: dataString,
        //dataType: 'JSON',
        cache: false,
       
				success: function(dataResult){
          console.log(dataResult);
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==100){
            alert("Data added successfully !");
										
					}
					else if(dataResult.statusCode==101){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
<script src="js/jquery.scrollTo.min.js"></script>
  <!-- <script src="js/jquery.nicescroll.js" type="text/javascript"></script> -->
</body>

</html>
