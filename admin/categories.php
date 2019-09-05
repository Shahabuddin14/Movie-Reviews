<?php include "includes/admin_header.php" ;?>

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
                        
                        <div class="col-xs-6">
                           
                        <?php insert_categories(); ?>
                     
                           
                            
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>
                            
                            <?php  // Update Query
                            
                                if(isset($_GET['edit'])) {
                                    
                                    $cat_id = $_GET['edit'];
                                    
                                    include"includes/update_categories.php";
                                    
                                }
      
                            
                            ?>
                            
                            
                            
                            
                        </div> <!--Add Category form-->
                        
                        <div class="col-xs-6">
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                       <!-- Find all Categories-->
                                                                             
                                        <?php findAllCategories(); ?>
                                        
                                        <!--Delete Query-->
                                        <?php deleteCategories(); ?>
                                    
                                </tbody>
                            </table>
                           
                        </div>
                        
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

</html>
