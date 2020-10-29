
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
    <!--header start-->
   
    
    <!--header end-->

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

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       
        <!-- page start-->
       
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                User Table
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i>  Name</th>
                    <th><i class="icon_calendar"></i> Email</th>
                    <th><i class="icon_mail_alt"></i> Phone</th>
                    <th><i class="icon_pin_alt"></i> DOB</th>
                    <th><i class="icon_mobile"></i> Sex</th>
                    <th><i class="icon_mobile"></i> Created Date</th>
                    <th><i class="icon_mobile"></i> Modified Date</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php
                  include 'connection.php';
                  $user_vals = array();
                  $sel = array();
                  $sel=mysqli_query($con,"SELECT  *  FROM mUsers");

                  WHILE($rows=mysqli_fetch_array($sel)){
                    $user_vals[] = $rows;
                  
                  }
                  foreach ($user_vals as $user_val){
                    
                    
                  ?>
                  <tr>
                    <td><?php echo $user_val['Name']; ?></td>
                    <td><?php echo $user_val['Email']; ?></td>
                    <td><?php echo $user_val['Phone']; ?></td>
                    <td><?php echo $user_val['DOB']; ?></td>
                    <td><?php echo $user_val['Sex']; ?></td>
                    <td><?php echo date('d-m-Y',$user_val['CreatedDate']); ?></td>
                    <td><?php  if(!empty($user_val['ModifiedDate'])){
                    echo date('d-m-Y',$user_val['ModifiedDate']);}else{
                      echo 'Nil';
                    } ?></td>
                    <td>
                      <div class="btn-group">
                      <form  id="fupForm" name="form1" method="post" action="">
                        <a class="btn btn-primary" href="user_edit.php?id=<?php echo $user_val['UserID'];?>">Edit</a>
                        <a class="btn btn-danger delete" class='delete' data-id='<?php echo $user_val['UserID']; ?>' 
                        href="#">Delete</a>
                       
                       
                       </form>
                      </div>
                    </td>
                  </tr>
              <?php } ?>
                 
                </tbody>
              </table>
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

  <script>
$(document).ready(function() {
	$('.delete').on('click', function() {
    var el = this;
  
  // Delete id
  var deleteid = $(this).data('id');
    
   var dataString = 'deleteid=' + deleteid;
   console.log(dataString); 
   if(deleteid!=""){
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
            alert("Data Deleted successfully !");
										
					}
					else if(dataResult.statusCode==101){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Something Wrong !');
		}
	});
});
</script>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <!-- <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script> -->
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
