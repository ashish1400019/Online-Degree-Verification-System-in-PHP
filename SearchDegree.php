<?php
$connect = mysqli_connect("localhost","root","","login");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to the DIAT degree Verification System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="Icon" type="Icon/jpg" href="DIAT_Logo.jpg"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .container{
      padding-top: 5%;
      padding-right: 15%;
      padding-left: 15%;
    }
    #place[placeholder] {
    font-size:18px;
    }
	td img{
		margin-top:5%;
	}
	.detail{
		text-align:center;
		font-size:20px;
		width:50%;
		border:2px solid #ddd;
		background:#b4c66b;
		color:#fff;
	}
	.table-info th{
		text-align:center;
		font-size:20px;
		font-weight:bold;
		border:2px solid #ddd;
		background:#95a35e;
		color:#fff;
	}
	.table-info tr{
		height:50px;
	}
  </style>
</head>
<body>
  
<div class="container">
  <form method= "POST" enctype="multipart/form-data">
    <div class="input-group">
      <input type="text" class="form-control" id="place" placeholder="Plese Enter your Degree Identifier" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" name="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
</div>
<?php
 $query = "SELECT * FROM degreestudent";
 $result = mysqli_query($connect,$query);
 $num_rows = mysqli_num_rows($result);
 if(isset($_POST["submit"])){
	 $search = $_POST['search'];
	 $search = stripcslashes($search);
	 $search = mysql_real_escape_string($search);
	 while($row = mysqli_fetch_array($result)){
		 $id = $row['id'];
	     $degreeIdentifier = $row['degreeIdentifier'];
	     $student = $row['student'];
		 $course = $row['course'];
		 $yearofcompletion = $row['completion_year'];
		 if($degreeIdentifier == $search){
			echo ' <h2 align="center" style="color:#30662b;">
			 <img src="green-tick-shield.png" width="100px" height="100px"/>
			 Congratulations,</h2>
	         <h3 align="center">Your degree has been successfully Verified.</h3><br/><br/><br/>';
			 echo '
			    <table style="width:80%;margin:0px auto;" class="table-info">
				<tr>
				<th colspan="2">Student Information</th>
				</tr>
			    <tr>
				    <td class ="detail">
					Student name :
					</td>
					<td class ="detail">
					'.$student .'
					</td>
				</tr>
				<tr>
				    <td class ="detail">
					Course name :
					</td>
					<td class ="detail">
					'.$course .'
					</td>
				</tr>
				<tr>
				    <td class ="detail">
					Passing Year :
					</td>
					<td class ="detail">
					'.$yearofcompletion .'
					</td>
				</tr>
				</table><br/><br/><br/>
			 ';
			 echo '<div align="center">
    			
    			        <img src="data:image/jpeg;base64,'.base64_encode($row['degree_image']).'" width="600px" height="500px" />
    			    </div>  
    			';
            break;				
		 } 
	 }
	 if ($degreeIdentifier != $search){
			 echo ' <h2 align="center" style="color:red;font-weight:bold;">
			 <img src="cross.png" width="100px" height="100px"/>
			 Sorry,</h2>
	         <h3 align="center" style="font-weight:bold;">Your provided information is not correct.</h3>';
		 }
 }
 /*<table class="table table bordered" class="display"><tr>
    			        <td>
						
						  </td>
    			    </tr>
 while($row = mysqli_fetch_array($result)){
	 $id = $row['id'];
	 $secret_key = $row['secret_key'];
	 $student = $row['student'];
	 if(isset($_POST["submit"])){
		 $search = $_POST['search'];
		 $search = stripcslashes($search);
		 $search = mysql_real_escape_string($search);
		 if($secret_key == $search){
			 echo ' <h2 align="center" style="color:#30662b;">
			 <img src="green-tick-shield.png" width="100px" height="100px"/>
			 Congratulations,</h2>
	         <h3 align="center">Your degree has been successfully Verified.</h3>';
			 echo '
    			    <tr>
    			        <td align="center">
    			        <img src="data:image/jpeg;base64,'.base64_encode($row['degree_image']).'" width="400px" height="300px"/>
    			        </td>
    			    </tr>
    			';  
		 }else{
			  echo ' <h2 align="center" style="color:red;font-weight:bold;">
			 <img src="cross.png" width="100px" height="100px"/>
			 Sorry,</h2>
	         <h3 align="center" style="font-weight:bold;color:red;">Your entered information is not correct.</h3>';
		 }
		 break;
	 }</table>
 } */
?>

</body>
</html>
