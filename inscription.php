<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Basic -->
 <meta charset="utf-8">
 <link rel="stylesheet" href="css/custom.css">
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
*:focus {
  outline: none;
}

body {
  margin: 0;
  padding: 0;
  background: #05213F;
  font-size: 16px;
  color: #222;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
}

#login-box {
  position: relative;
  margin: 5% auto;
  width: 700px;
  height: 800px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 320px;
  height: 400px;
}

h1 {
  margin: 0 0 20px 0;
  font-weight: 300;
  font-size: 28px;
}

input[type="text"],
input[type="password"] {
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 4px;
  width: 220px;
  height: 32px;
  border: none;
  border-bottom: 1px solid #AAA;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 15px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus {
  border-bottom: 2px solid #16a085;
  color: #16a085;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: 28px;
  width: 120px;
  height: 32px;
  background: #05213F;
  border: none;
  border-radius: 2px;
  color: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('images/kyllit1.png');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}

.right .loginwith {
  display: block;
  margin-bottom: 40px;
  font-size: 28px;
  color: #FFF;
  text-align: center;
}


</style>
</head>
<body>
<section id="top">
    <header>
            <div class="container">
               <div class="header-top">
                  <div class="row">
                      <!--<div class="col-md-6">
                        <div class="full">
                           <div class="logo">
                             <a href="index.html"><img src="kyllit.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>-->
                     <div class="col-md-6">
                        <div class="right_top_section">
                           <!-- social icon 
                           <ul class="social-icons pull-left">
                              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                              <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                           </ul>-->
                           <!-- end social icon -->
                           <!-- button section -->
                           <ul class="login">
                              <li class="login-modal">
                                 <a href="index.html" class="login"><i class="fa fa-home"></i>Accueil</a>
                              </li>

                           </ul>
                           <!-- end button section -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
        </section>
<div class="login-box">
 
  <div id="login-box">
  <div class="left"> 
  <center><h3>Inscription</h3></center> 
  <form action="" method="post">
    <input type="text" name="nom" placeholder="Nom" />
    <input type="text" name="age" placeholder="Age" />
    <input type="text" name="tel" placeholder="Telephone" />
     <!--Situation matrimoniale:<br>  <input type="radio" name="situationM" id=""> Celibataire
        <input type="radio" name="situationM" id=""> Marie
        <input type="radio" name="situationM" id=""> veuf  <br><br>-->
    <input type="text" name="taille" placeholder="Taille" />
    <input type="text" name="poids" placeholder="Poids" />
    <input type="radio" name="nomCat" value="lourd"> lourds
        <input type="radio" name="nomCat"  value="moyen">moyens
        <input type="radio" name="nomCat" id=""  value="leger"> legers  <br><br>
    Photo<input type="file" multiple="multiple" class="txbx" name="image"  ><br /> <p>Formats acceptés: Jpg, Jpeg, Png</p> 
    
    <input type="submit" name="bouton" value="Envoyer" />
  </div>
  
  <div class="right">
  
    
    
  
</div>
</form>
<?php
            $servname = 'localhost';
            $dbname = 'kyllit';
            $user = 'root';
            $pass = 'passer';


	    if(isset($_POST['bouton'])){ // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie
   		$nom=$_POST['nom'];
                $age=$_POST['age'];
           $poids=$_POST['poids'];
           $taille=$_POST['taille'];
           $tel=$_POST['tel'];

//La tu insère le nom du fichier dans ta tabl
        
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $req = $dbco->prepare('select * from Categories where nomCat = :cat');
                $req->execute(array('cat' => $_POST['nomCat']));
                $categorie = $req->fetch();
                $sql = $dbco->prepare('INSERT INTO Participants(nom,age, poids,taille, Categories_idCat,tel) VALUES(:nom,:age,:poids,:taille,:categorie,:tel)');
                $sql->execute(array(
                  'nom' => $nom,
                  'age' => $age,
                  'poids' => $poids,
                  'taille'=> $taille,
                  'categorie' => intval($categorie['idCat']),
                  'tel'=> $tel
                  )); 
                $participantID = $dbco->lastInsertId();
                $dossier = '/images/shop/';
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
          try {
            move_uploaded_file($file_tmp,"images/shop/".$file_name);
            echo $file_tmp;
          } catch (Exception $e) {
            echo 'error: '.$e->getMessage();
          }
         
      }else{
         print_r($errors);
      }
      // Insertion de l'image dans la base de données pour le produit 
      $req = $dbco->prepare('INSERT INTO Images (nomImg, Participants_idP) VALUES(:nomImg, :idP)');
      $req->execute(array(
        'nomImg' => 'images/shop/'.$file_name,
        'idP' => $participantID
      ));?>
                <div class="right">
                   
 		                <h3> <i class="btn btn-danger"> Votre inscription est en cours de traitement ! Merci</i></h3>
                   
                </div>
            <?php    
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
		
        
            }
   
}
        ?>

</body>
</html>
