<?php include('header.php'); ?>
    <div class="box1">
        <h2 style="color:blue;margin-left:40%;">ALL STUDENTS</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="padding-left:10px;padding-right:0px;margin-right:20px;">ADD STUDENTS</button>
    </div>
    <div class="container mt-5 py-5">
    <table id="example" style="width:100%" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>

                <th>ID</th>
                <th>first Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th style="text-align:center;">ACTION</th>
                
            </tr>
        </thead>
        <tbody>
           <?php
           include 'db_conn.php';

            $query = "select * from `student`";

            $result = mysqli_query($conn,$query);
            $number = 1;

            if(!$result){
                die("query failed" . mysqli_error());
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                 <tr>
                <td><?php echo $number ?></td>
                <td><?php echo $row['first_name'];  ?></td>
                <td><?php echo $row['last_name'];  ?></td>
                <td><?php echo $row['age'];  ?></td>
                <td style="text-align: center;"><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                <a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                 </tr>
                    <?php
                    $number++;
                }
            }

                   ?>
        </tbody>
                   <tfoot>
                <tr>
                    <th>id</th>
                    <th>firstname</th>
                     <th>lastname</th>
                     <th>age</th>
                     <th style="text-align:center;">action</th>
                </tr>
            </tfoot>
    </table>
     </div>





<!-- Modal -->
<form action="add_student.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  class="form-group">
            <label for="">First Name</label>
            <input type="text" name="f_name" class="form-control">
         </div>
        <div  class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="l_name" class="form-control">
        </div>
        <div  class="form-group">
            <label for="">Age</label>
            <input type="text" name="age" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_student" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
    
    <?php include('footer.php'); ?>
    