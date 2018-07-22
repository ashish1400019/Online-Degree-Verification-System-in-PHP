<?php


$connect = mysqli_connect("localhost","root","","login");

if(isset($_POST["insert"]))
{   
    $degree_identifier = $_POST["identifier"];
    $student_name = $_POST["name"];	
	$yearofcompletion = $_POST["yearofcompletion"];
	$course = $_POST["course"];
	$degree_identifier = stripcslashes($degree_identifier);
	$student_name = stripcslashes($student_name);
	$yearofcompletion = stripcslashes($yearofcompletion);
	$course = stripcslashes($course);
	$degree_identifier = mysql_real_escape_string($degree_identifier);
	$student_name = mysql_real_escape_string($student_name);
	$yearofcompletion = mysql_real_escape_string($yearofcompletion);
	$course = mysql_real_escape_string($course);
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$query = "INSERT INTO degreestudent( degreeIdentifier, student, course, completion_year, degree_image) VALUES('$degree_identifier','$student_name','$course', '$yearofcompletion', '$file')";
	if(mysqli_query($connect,$query))
	{   
		echo '<script> confirm("Degree successfully added into the database.")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Online Degree Verification System </title>
	<link rel="Icon" type="Icon/jpg" href="DIAT_Logo.jpg"/> 
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style type="text/css">
     #logoutbutton{
     	float: right;
     	margin-right:2%;
     }
	 form{
		  font-weight:bold;
		 font-size:20px;
	 }
	 form input{
		 margin-right:20%;
		 text-align:center;
		 border-radius:5px;
	 }
    </style>
</head>
<body>
    <br /><br />
    <a href="login.php" class="btn btn-info btn-sm" id="logoutbutton">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
    <div class="container" style="width: 500px;">
    	<h3 align="center">Welcome admin now you can carryout</h3>
    	<br />
    	<form method="post" enctype="multipart/form-data">
		    Degree Indentifier : <input type="text" name="identifier" id="identifier"/><br/><br/>
    	    Student Name : <input type="text" name="name" id="name"/><br/><br/>
			Completion Year : <input type="text" name="yearofcompletion" id="yearofcompletion"/><br/><br/>
			Course Registered : <input type="text" name="course" id="course"/><br/><br/>
    	    Upload Degree : <input type="file" name="image" id="image"/> <br />	<br/>
    	    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary active btn-md "/>
    	</form>
    	<br />
    	<br />
    	<table class="table table-bordered">
    	    <tr>
    	    	<th style="text-align:center;">Image</th>
    	    </tr>
    		<?php
    		$query = "SELECT * FROM degreestudent ORDER BY id DESC";
    		$result = mysqli_query($connect,$query);
    		while($row = mysqli_fetch_array($result))
    		{
    			echo '
    			    <tr>
    			        <td style="width:700px; height:1000px;">
    			        <img src="data:image/jpeg;base64,'.base64_encode($row['degree_image']).'" width="600px" height="500px" align="center"/>
    			        </td>
    			    </tr>
    			';
    		}
    		?>
    	</table>
    </div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#insert').click(function(){
			var image_name = $('#image').val();
			if(image_name == '') {
				alert("Please Select Image");
				return false;
			}
			else
			{
				var extension = $('#image').val().split('.').pop().toLowerCase();
				if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
				{
					alert('Invalid Image file');
					$('#image').val('');
					return false;
				}
			}
		});
	});
</script>