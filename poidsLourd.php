<?php
    
    $servname = 'localhost';
    $dbname = 'kyllit';
    $user = 'root';
    $pass = 'passer';

$dbco = NULL;
try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    
   
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
	

	$stmt = $dbco->prepare('SELECT * from Participants where Categories_idCat=1');
   $categories = $dbco->query('SELECT * from Categories');
   $state = $stmt->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
        'id' => intval($_GET['idCat'])
    ));
   $stmtImg = $dbco->prepare('SELECT * from Images where Participants_idP =:id'); 
      
?>

<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   <title>Game Info</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="" type="image/x-icon" />
   <link rel="apple-touch-icon" href="">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->	
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- font family -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="kyllit1.gif" alt="">
      </div>
      <!-- END LOADER -->
      <section id="top">
         <header>
            <div class="container">
               <div class="header-top">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="full">
                           <div class="logo">
                              <a href="index.html"><img src="kyllit.gif" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="right_top_section">
                           <!-- social icon -->
                           <ul class="social-icons pull-left">
                              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                              <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                           </ul>
                           <!-- end social icon -->
                           <!-- button section -->
                           <ul class="login">
                              <li class="login-modal">
                                 <a href="index.html" class="login"><i class="fa fa-home"></i>Accueil</a>
                              </li>
                              <li>
                                 <div class="cart-option">
                                    <a href="contact.php"><i class="fa fa-phone" aria-hidden="true"></i>Contacter</a>
                                 </div>
                              </li>
                           </ul>
                           <!-- end button section -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="header-bottom">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="full">
                           <div class="main-menu-section">
                              <div class="menu">
                                 <nav class="navbar navbar-inverse">
                                    <div class="navbar-header">
                                       <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                                       <span class="sr-only">Toggle navigation</span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       </button>
                                       <a class="navbar-brand" href="#">Menu</a>
                                    </div>
                                    <div class="collapse navbar-collapse js-navbar-collapse">
                                       <ul class="nav navbar-nav">
                                          <li class="active"><a href="index.html">Galerie</a></li>
                                          <li class="active"><a href="index.html">Poids lourds</a></li>
                                          <li class="active"><a href="index.html">Poids moyens</a></li>
                                          <li class="active"><a href="index.html">Poids legers</a></li>
                                          <li class="active"><a href="index.html">Trophes du mois</a></li>
                                          <li class="active"><a href="index.html">Ligue Feminine</a></li>
                                          <li class="active"><a href="index.html">Communaute kyllit</a></li>
                                          
                                       </ul>
                                    </div>
                                    <!-- /.nav-collapse 
                                 </nav>
                                 <div class="search-bar">
                                    <div id="imaginary_container">
                                       <div class="input-group stylish-input-group">
                                          <input type="text" class="form-control"  placeholder="Search" >
                                          <span class="input-group-addon">
                                          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>  
                                          </span>
                                       </div>
                                    </div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <div class="inner-page-banner">
            <div class="container">
            </div>
         </div>
         <div class="inner-information-text">
            <div class="container">
               <h3>Participants</h3>
               <ul class="breadcrumb">
                  
                  <li class="active">Poids lourds </li>
               </ul>
            </div>
         </div>
      </section>
      <section id="contant" class="contant main-heading team">
         
         <div class="row">
            <div class="container">
            <?php 
                        while ($prod = $stmt->fetch()) { 
							$stmtImg->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
								'id' => $prod['idP']
							));	
							$img = $stmtImg->fetch();
						?>
                <div class="col-md-3 column">
                  <div class="card"> 
                     <img class="img-responsive" src="images/shop/<?php echo $img['nomImg']; ?>" style="width:100%">
                     <div class="">
                        <h4><?php echo $prod['nom']; ?></h4>
                        <p class="title">Age:<?php echo $prod['age']; ?>ans</p>
                        <p class="title">Poids:<?php echo $prod['poids']; ?>kg</p>
                        <p>
                        <div class="center">
                        <button class="button"><a href="profil.php?codeParticipant=<?php echo $prod['idP']; ?>">Profil</a></button>
                           </div>	
                        </p>
                     </div>
                  </div>
               </div><?php } ?>
            </div>
         </div>
      </section>
      <footer id="footer" class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="full">
                     <div class="footer-widget">
                        <div class="footer-logo">
                           <a href="#"><img src="kyllit.png" alt="" /></a>
                        </div>
                        <p>Most of our events have hard and easy route choices as we are always keen to encourage new riders.</p>
                        <ul class="social-icons style-4 pull-left">
                           <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                           <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="full">
                     <div class="footer-widget">
                        <h3>Menu</h3>
                        <ul class="footer-menu">
                           <li class="active"><a href="index.html">Galerie</a></li>
                           <li class="active"><a href="index.html">Poids lourds</a></li>
                           <li class="active"><a href="index.html">Poids moyens</a></li>
                           <li class="active"><a href="index.html">Poids legers</a></li>
                           <li class="active"><a href="index.html">Trophes du mois</a></li>
                           <li class="active"><a href="index.html">Ligue Feminine</a></li>
                           <li class="active"><a href="index.html">Communaute kyllit</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="full">
                     <div class="footer-widget">
                        <h3>Contact us</h3>
                        <ul class="address-list">
                           <li><i class="fa fa-map-marker"></i> Lorem Ipsum is simply dummy text of the printing..</li>
                           <li><i class="fa fa-phone"></i> 123 456 7890</li>
                           <li><i style="font-size:20px;top:5px;" class="fa fa-envelope"></i> demo@gmail.com</li>
                        </ul>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <p>Copyright © 2018 GameInfo.All rights reserved.</p>
            </div>
         </div>
      </footer>
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>
   </body>
</html>
