<!-- This is the header with some scripts that gives me more efficiency like bootstrap template. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<!-- Setup of the classes to be called later with the POST method. -->    
<body>
<div class="container">
  <h2>Sign In</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" placeholder="Name" name="user_name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="user_password">
    </div>
        <div class="form-group">
        <label>Image:</label>
      <input type="file" class="form-control" placeholder="Name" name="image">
    </div>
    <div class="form-group">
        <label>Details:</label>
        <textarea class="form-control" name="user_details"></textarea>
    </div>
      
<!-- Buttons to submit the data or return to login page (after subscribed).  --> 
      <input type="submit" name="insert-btn" class="btn btn-primary"/>
        <a class="btn btn-primary" href="login.php">Login</a>
  </form>
    
<!-- Database connection + definition of the variables to be inserted using a mysql query (INSERT). -->     
    <?php 
    $conn = mysqli_connect('localhost', 'root', '', 'webster');
    
    if (isset($_POST['insert-btn'])) {
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //$image = $_FILES['user_image'] ['name'];
    //$tmp_name = $_FILES['user_image'] ['tmp_name'];
    $user_details = $_POST['user_details'];
    
    $insert = "INSERT INTO user (user_name, user_email, user_password, user_image, user_details) VALUES('$user_name', '$user_email', '$user_password', '', '$user_details')";
         $run_insert = mysqli_query($conn, $insert);
        if($run_insert === true){
            echo "Data Inserted";
            //move_upload_file($tmp_name, "upload/$image");
        }else{
            echo "Failed, try again";
        }
        
    }
    
    ?>
    </div>
</body>
</html>
