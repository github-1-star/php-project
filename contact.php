<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>

 <?php
//////////////////////This is for online one/////////////
            // the message
// $msg = "First line of text\nSecond line of text";

//         // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

//             // send email
// mail("someone@example.com","My subject",$msg);
//////////////above code is for online smtp/////////////
    if(isset($_POST['submit']))
    {
        global $connect;
        // echo "it's working";

        $to           =   "support@userperson.com";
        $subject      =   wordwrap($_POST['subject'],70);
        $body         =   $_POST['body'];
        $header       =   "From:" . $_POST['email'];

        mail($to,$subject,$body,$header);
    }
       
           
?>


    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                      
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="50" rows="6"></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
