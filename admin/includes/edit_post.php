<?php


    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }



    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_posts_by_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

    }

    if(isset($_POST['update_post'])){

        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        
        
        move_uploaded_file($post_image_temp, "../images/$post_image" );
        
        
        
        if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
        
        
    }
        
        
        $query = "UPDATE posts SET ";
        $query .="post_title  = '{$post_title}', ";
        $query .="post_category_id = '{$post_category_id}', ";
        $query .="post_date   =  now(), ";
        $query .="post_author = '{$post_author}', ";
        $query .="post_status = '{$post_status}', ";
        $query .="post_tags   = '{$post_tags}', ";
        $query .="post_content= '{$post_content}', ";
        $query .="post_image  = '{$post_image}' ";
        $query .= "WHERE post_id = {$the_post_id} ";


        $update_post = mysqli_query($connection,$query);
        confirmQuery($update_post);
        
        
        echo "<p class='bg-success'>Your Post have been Updated. <a href='../post.php?p_id={$the_post_id}'>View The Updated Post </a>Or <a href='posts.php'>Edit More Post</a></p>";
        
        
    }

?>
   

   
   
<form action="" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    
     <div class="form-group">
        
        <select name="post_category" id="" class="form-control">
            
            <?php
            
                $query = "SELECT * FROM categories ";
                $select_categories = mysqli_query($connection,$query);
            
            
                confirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    
                    echo "<option value='$cat_id'>{$cat_title}</option>";
            
                }
            ?>
            
        </select>
        
    </div>
    
     <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
    
    
    <div class="form-group">
       
       <label for="author">Post Status</label>
        
        <select name="post_status" id="" class="form-control">
            
            <option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>
            
            <?php 
                
                if($post_status == 'published'){
                    
                    echo "<option value='draft'>Draft</option>";
                } else {
                    
                    echo "<option value='published'>Published</option>";
                }
            
            
            ?>
            
        </select>
        
    </div>
    
    
    
<!--
     <div class="form-group">
        <label for="status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
-->
    
     <div class="form-group">
        <label for="image">Post Image</label><br>
        <img width="140" src="../images/<?php echo $post_image; ?>" alt="Image">
        <input  type="file" name="image" >
    </div>
    
     <div class="form-group">
        <label for="tag">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="tag">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
    </div>
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
    

</form>