<?php

?>

<!--feedback_db.php -->

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Hidden Cafe @SJCQC</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <div class="header">
      <div class="container-fluid">
         <div class="row d_flex">
            <div class=" col-md-2 col-sm-3 logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html"><img src="images/Untitled-2.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-8 col-md-10 col-sm-9">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="menu.html">Menu</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="testimonial.html">Testimonial</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="contact.html">contact us</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="col-md-2 d_none">
               <ul class="email text_align_right">
                  <li><a href="Javascript:void(0)">Login <img src="images/use.png" alt="#" /></a></li>
                  <li><a href="Javascript:void(0)"><img src="images/sho.png" alt="#" /></a></li>
                  <li><a href="Javascript:void(0)"><img src="images/sea.png" alt="#" /></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!-- end header inner -->
   <!-- contact -->

   <!-- PHP -->
   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      uploadData();
   }

   function uploadData()
   {
      // Updated input names to match the form
      $name = $_POST['Name'];
      $phone = $_POST['Phone'];
      $email = $_POST['Email'];
      $feedback = $_POST['Feedback'];

      // Submitting the database
      $servername = "localhost";
      $username = "root";
      $password = "blopblop11";
      $database = "feedback_db";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $database);

      // Check connection
      if (!$conn) {
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Connection Failed!</strong> ' . mysqli_connect_error() . '</div>';
      } else {
         mysqli_select_db($conn, $database); // Explicitly select the database

         $sql = "INSERT INTO `feedback_table2` (`name`, `phone`, `email`, `feedback`, `submission_time`) VALUES ('$name', '$phone', '$email', '$feedback', current_timestamp())";
         $result = mysqli_query($conn, $sql);

         if ($result) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Feedback is submitted from ' . $email . '. Thank You!!</div>';
         } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error uploading data</strong></div>' . mysqli_error($conn);
         }
      }
   }
   ?>
   <!-- PHP -->

   <div class="contact">
      <div class="container">
         <div class="row d_flex">
            <div class="col-md-6">
               <form action="contacts.php" class="main_form" data-aos="fade-right" method="POST">
                  <!-- Updated input names in the form -->
                  <div class="col-md-12">
                     <input class="contactus" placeholder="name" type="text" name="Name">
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="phone" type="text" name="Phone">
                  </div>
                  <div class="col-md-12">
                     <input class="contactus" placeholder="email" type="text" name="Email">
                  </div>
                  <div class="col-md-12">
                     <textarea style="color: #adafb0;" class="textarea" placeholder="feedback" type="text" name="Feedback"></textarea>
                  </div>
                  <div class="col-md-12">
                     <button class="send_btn" type="submit">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end contact -->

   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6">
                  <a class="logo_footer" href="index.html"><img src="images/logogo.png" alt="#" /></a>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="headimg_fooh3">
                     <h3>LATEST POST</h3>
                     <p>Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                        sentence structures, to generate Lorem </p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="headimg_fooh3">
                     <h3>Opening time </h3>
                     <ul class="opening">
                        <li>Monday <span>1pm – 10pm</span></li>
                        <li>Tuesday <span>1pm – 10pm</span></li>
                        <li>Wednesday <span>1pm – Midnight</span></li>
                        <li>Thursday <span>1pm – 10pm</span></li>
                        <li>Friday <span>1pm – Midnight</span></li>
                        <li>Suturday <span>1pm – 10pm</span></li>
                        <li>Suturday <span>1pm – 10pm</span></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="headimg_fooh3">
                     <h3>Contact Us</h3>
                     <ul class="conta">
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Call +01 1234567890</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)">
                              demo@gmail.com</a></li>
                     </ul>
                     <ul class="social_icon text_align_left">
                        <li><a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="Javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="Javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2023 All Rights Reserved. Designed by <a href="#"> SJCQC BSIT BATCH 23-24</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/jquery.nice-select.min.js"></script>
   <!-- sidebar -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/custom.js"></script>
   <script>
      AOS.init();
   </script>
</body>

</html>