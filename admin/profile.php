<?php include "includes/admin_header.php" ;?>


<?php 
                        
    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)){
            
            
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            
        }
    }
                        
                        
?>
                    

<?php 

        
    if(isset($_POST['edit_user'])){


    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    //        $post_image = $_FILES['image']['name'];
    //        $post_image_temp = $_FILES['image']['tmp_name'];


    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //        $post_date = date('d-m-y');



    //        move_uploaded_file($post_image_temp, "../images/$post_image" );
    //        
    //        

    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role =  '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}' ";


    $edit_user_query = mysqli_query($connection,$query);
    confirmQuery($edit_user_query);



    }
        
            









?>              
                    
                     



<body>

    <div id="wrapper">
        
        <!--<?php if($connection) echo "fuck"; ?> -->

        <?php include "includes/admin_navigation.php" ;?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                        
                        <form action="" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    
     <div class="form-group">
        <label for="status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    
    
    
    <div class="form-group">
        
        <select name="user_role" id="" class="form-control ">
           
            <option value="subscriber"><?php echo $user_role; ?></option>
            
            
            <?php
            
                if($user_role == 'admin'){
                    
                    echo "<option value='subscriber'>subscriber</option>";
                    
                } else {
                    
                    echo "<option value='admin'>admin</option>";
                }
            
            
            
            ?>
            
            
            
            
            
            
<!--
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
-->
        
        </select>
        
    </div>
    

    
     <div class="form-group">
        <label for="author">User Name</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    
     <div class="form-group">
        <label for="status">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    
<!--
     <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file"  name="image">
    </div>
-->
    
     <div class="form-group">
        <label for="tag">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    

    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
    

</form>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

