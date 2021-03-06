<?php include "include/db.php"?>
<?php include "include/header.php"?>
<?php include "include/navigation.php"?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <?php

                    $per_page = 2;
                    if(isset($_GET['page']))
                    {

                        $page = $_GET['page'];
                    }
                    else
                    {
                        $page = "";
                    }

                    if($page == "" || $page == 1)
                    {
                        $page_1 = 0;
                    }
                    else
                    {
                        $page_1 = ($page * $per_page) - $per_page;
                    }


                    $post_query_count = "SELECT * FROM posts WHERE post_status= 'published'";
                    $find_count = mysqli_query($connect,$post_query_count);
                    $count = mysqli_num_rows($find_count);

                    if($count<1)
                    {
                        echo "No posts to show";
                    }
                    else
                    {

                    

                    $count = ceil($count/$per_page);


                    $query = "SELECT * FROM posts LIMIT $page_1, $per_page ";
                    // $query = "SELECT * FROM posts WHERE post_status = 'published' $page_1, 5 ";   //We can use this direct insteaqd of below loop
                    $select_all_posts_query = mysqli_query($connect,$query);


                    echo "<br/>" . "<h4>The value of page is:  <span class='highlight'>" . $page . "</span></h4>"; // this will show the number of page on top


                    // if(mysqli_num_rows($select_all_posts_query) == 0)
                    // {
                            
                    //     echo "<h2>Sorry, No posts to display.</h2>";
                        
                    // }
                    // else 
                    // {
                    while($row = mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_id = $row ['post_id'];
                        $post_title = $row ['post_title'];
                        $post_author = $row ['post_user'];
                        $post_date = $row ['post_date'];
                        $post_image = $row ['post_image'];
                        $post_content = substr($row ['post_content'], 0,50);
                        $post_status = $row['post_status'];

                        //  if($post_status == 'published')
                        //  {
                         

                        // if($post_status !== 'published')
                        // {
                        //         echo "<h1 class ='text-center'> NO POST</h1>";
                        // }
                        // else{
                            
                        
                ?>


                    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <!-- <h1><?php echo $count?></h1> -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
              
                <p class="lead">
                    by 
                    <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
                </p>
              
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
              
                <hr>
                <a  href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
              
                
                <p><?php echo $post_content ?>.</p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                 <?php 
}
                }
            
                ?>
                
            </div>

            <?php include "include/sidebar.php"?>

            
        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
        <?php

                for($i=1;$i<=$count;$i++)
                {

                    if($i == $page)
                    {
                        echo "<li><a class ='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                    }
                    else
                    {
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
            }
        ?>


        </ul>

       <?php include "include/footer.php"?>