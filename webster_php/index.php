<!-- This script aims to start de session after the login succesfully done --> 
<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'webster');

    if(!isset($_SESSION['email'])){
        echo "<script>window.open('login.php','_self');</script>";
    }
?>

<!-- This is the header with some scripts that gives me more efficiency like bootstrap template. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<!-- Setup the button LOGOUT with the proper dimensions. -->
    <a class="btn btn-danger" style="margin-top: 25px; margin-left: 1330px; margin-right: 215px" href="logout.php">Logout</a> 
<div class="container">
  <h2>STUDENT DAHSBOARD</h2>
    
<!-- Connection with database + delete function. -->
    <div>    
     <?php        
        $conn = mysqli_connect('localhost', 'root', '', 'webster');
        if(isset($_GET['del'])) {
            $del_id = $_GET['del'];
        $delete = "DELETE FROM user WHERE user_id='$del_id'";
        $run_delete = mysqli_query($conn, $delete);
            if($run_delete === true){
                echo "record deleted";
            }else{
                echo "Failed, tru again";
            }
        }
    ?>
<!-- Table layout use from bootstrap with variables to be shown in the screen.  -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Details</th>
      </tr>
    </thead>
      
<!-- Connection with database + setup of function select select (array) with which informations mas be searched and displayed. -->
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'webster');
      
      $select = "SELECT * FROM user";
      $run = mysqli_query($conn, $select);
      while($row_user = mysqli_fetch_array($run)) {
          $user_name = $row_user['user_name'];
          $user_image = $row_user['user_image'];
          $user_details = $row_user['user_details'];
      
      ?>
      
<!-- Informations to be displayed and image dimensions. -->
      <tr>
        <td><?php echo $user_name;?></td>
        <td><img src="upload/<?php echo $user_image;?>"style="margin-top: 5px; margin-left: 30px; margin-right: -115px" height="170px;"></td>
        <td><?php echo $user_details;?></td>
      </tr>
      <?php } ?>
  </table>
        
<!-- Button that goes to another section (user details). -->
        <a class="btn btn-primary" href="view_user.php">User Details</a>

</div>
</div>
</body>
</html>
