<?php 
// Start output buffering

require_once("connection.php");

// Select the property elements to display


?>

<html lang="en">
<head>
 
  <title>RRE - Properties</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>



<header>
	<center><a href="index.php"><img src="images/logo_full.png" alt="Ruthless Real Estate" id="top" /></a></center>
</header>

<?php include("navbar.php"); ?>
  
<div class="container-fluid text-center" id="content">
	<div class="row content">
		<div class="col-sm-2 sidenav">
		  <!-- Blank for spacing -->
		</div>
		<div class="col-sm-8 text-left content-div">
	  <!-- ALL CONTENT GOES INSIDE THIS DIV -->
  	  
  	  <center><h1 class="page-title">Properties</h1></center>
  	  <?php
        require_once("propertyDAO.php");
            
            
        ?>
            
            
  	  <div class="col-md-6 col-md-offset-2">
	  <a href="create_property.php" class="btn btn-default btn-md col-md-5 custbutton">Create New Property</a>
	  <div class="input-group input-right">
      <input type="text" class="form-control" placeholder="Search for..." id="property-search">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="search()" id="search-button"><p class="button-icon"><span class="glyphicon glyphicon-search"></span></p></button>
      </span>
      </div>
	  </div>
  	  
	  	
		</div>
		<div class="col-sm-2 sidenav">
		  <!-- Blank for spacing -->
		</div>
	</div>
</div>

<a href="display_source.php?page=property.php" target="_blank"><img src="images/property.png" alt="property"/></a>

<?php include("footer.php"); ?>

</body>
</html>

<?php
	oci_free_statement($stmt);
	oci_close($conn);
?>
