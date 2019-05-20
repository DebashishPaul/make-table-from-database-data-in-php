<html>
<head>
    <title>get data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    
    <body>
    
    
<form action="" method="post">
  <div class="form-group">
    
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" name="name">
    
  </div>
  <div class="form-group">
    
    <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="email">
  </div>
  <div class="form-group">
    
    <input type="mobile" class="form-control" name="mobile" id="exampleInputPassword1" placeholder="mobile">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
        

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, email, mobile FROM student";
$result = $conn->query($sql);
echo '<table class="table bg-success">
<thead class="thead-light">
    <tr>
      
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">mobile</th>
    </tr>
  </thead>
</table>';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        
        
        echo '<table class="table table-striped bg-success">

<tr>
<td style="color:white";>'.$row["name"].'</td>
<td style="color:#F5F553";>'.$row["email"].'</td>
<td style="color:53F5EB";>'.$row["mobile"].'</td>
</tr>
</table>';
        
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>
        
        
        
        
<?php
       
        
        
        if(isset($_POST['submit'])){
		
		
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		
		$error = 0;
		$msg = "error!!!";
		
		if($name == ""){
			$error = $error+1;
			$user_error = "<span style='color:#f00'>* trip type required</span>";
			$msg .= "<p style='color:#f00'>* name Required</p>";
		}
		if($email == ""){
			$error = $error+1;
			$msg .= "<p style='color:#f00'>* email Required</p>";
		}
		if($mobile == ""){
			$error = $error+1;
			$msg .= "<p style='color:#f00'>* mobile number Required</p>";
		}
		
		if($error == 0){
		
			$insert = "INSERT INTO student VALUES('$name', '$email', '$mobile')";
			if($insert){
				try{
					$object = new apps;
					$object->insert($insert);
					echo "Not inserted";
				}catch(exception $e){
					echo "inserted";
					
				}
			}
		
		
		}else{
			echo $msg;
		}
	}

        
        
        
?>
   
        
        
        
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         </body>
</html>


