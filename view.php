<?php
include('conect.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM profile WHERE id='$id'";
    $select_query=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($select_query)){
        $name=$row['name'];
        $phone=$row['phonenumber'];
        $email=$row['email'];
        $uid=$row['id'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>view</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>Horizontal form</h2>
  <form class="form-horizontal" action="" method="POST">
  
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Id</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"   name="id" value="<?php echo $uid;?>" readOnly>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"   name="name" value="<?php echo $name;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">phonenumber:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd"  name="phone" value="<?php echo $phone;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email"  name="email" value="<?php echo $email;?>">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <a href="database_record.php" class="btn  btn-success" role="button">back</a>
      </div>
    </div>
  </form>
</div>
</body>
</html>
<?php
  include('conect.php');
  if(isset($_POST['update'])){
     $upname=$_POST['name'];
     $uphone=$_POST['phone'];
     $uemail=$_POST['email'];
     $queryupdate=mysqli_query($conn,"update profile set name='$upname',phonenumber='$uphone',email='$uemail' where id='$id'")or die(mysqli_error($conn));
     if($queryupdate){
        echo'<script>window.alert("record updated succesifully")</script>';
        header('refresh:0;url=database_record.php');
        } else{
        echo'<script>window.alert("record not updated. Please try again.")</script>';
        header('refresh:0;url=database_record.php');			
        }
  }
?>
