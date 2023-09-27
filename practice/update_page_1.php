<?php 

include('header.php');
include 'db_conn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

     $query = "select * FROM `student` WHERE `id` = '$id'";

     $result = mysqli_query($conn,$query);

         if(!$result){
                die("query failed" . mysqli_error());
            }   
            else{
                $row = mysqli_fetch_assoc($result);
            }
}

?>

    
<?php

    if(isset($_POST['update_student'])){
        
        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        $query = "UPDATE `student` set  `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE   `id` = '$idnew'";

          $result = mysqli_query($conn,$query);

         if(!$result){
                die("query failed" . mysqli_error());
            } 
            else{
                header ('location:index.php?update_msg=You have successfully updated the data.');
            }
    }
?>
   <form action="update_page_1.php?id_new=<?php echo $id; ?>" method="POST">
       <div class="container" style="width:50%;text-align:center;">
       <H2 style="color:blue;">UPDATE STUDENT</H2>
   <div  class="form-group" >
            <label for="" style="float:left;">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>">
         </div>
        <div  class="form-group">
            <label for="" style="float:left;">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>">
        </div>
        <div  class="form-group">
            <label for="" style="float:left;">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
            </div>
            <input type="submit"  class="btn btn-success" name="update_student" value="UPDATE">
</div>
</form>

<?php  include('footer.php'); ?>
  