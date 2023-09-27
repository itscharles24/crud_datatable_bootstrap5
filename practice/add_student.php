    <?php

    include 'db_conn.php';
    
    if(isset($_POST['add_student'])){
        
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        if($fname == "" || empty($fname)){
            header('location:index.php?message=YO need to fill in the firstname!');
        }   

        else{

            $query = "insert into `student` (`first_name`,`last_name`,`age`) value ('$fname',' $lname','$age')";

            $result = mysqli_query($conn,$query);

            if(!$result){
                die ("Query Failed".mysqli_error());
            }

            else{
                header ('location:index.php?insert_msg=Your data has been added successfully');
            }
        }
    }

    ?>
        