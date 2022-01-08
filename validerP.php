<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Pendita</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="Imagess/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Imagess/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Imagess/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Imagess/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="Imagess/ico/apple-touch-icon-57-precomposed.png">
    <style>
    .container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    </style>
</head>
<body>
        
<header id="header"><!--header-->

<?php 

        $servname = 'localhost';
        $dbname = 'kyllit';
        $user = 'root';
        $pass = 'passer';
        $supP = '';
        
        $dbco = NULL;
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $stmt = $dbco->prepare('SELECT * from Evenements where statut=:statut'); 
            $stmt->execute(array(
                'statut' => 'NoValide'
            ));
            $stmt = $dbco->query('SELECT * from Participants'); 
            $supP = $stmt;
            /*$stm = $dbco->prepare('SELECT * from Personne'); 
            $dbco->exec($stm);
            $validePers =$stm;*/
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        if(isset($_GET['idPsup'])){
            $stmt = $dbco->prepare('Delete from Images where Participants_idP=:id');
            $state = $stmt->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
                'id' => intval($_GET['idPsup'])
            ));
            $stmt = $dbco->prepare('Delete from Participants where idP=:id'); 
            $state = $stmt->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
                'id' => intval($_GET['idPsup'])
            ));
            header('location: validerP.php?deleted='.$state);
             //pour rediriger vers la page supPView.php avec la variable valideted
            //pour afficher le message de success ou d'erreur selon quelle soit true or false
        }
        if(isset($_GET['deleted'])){
            $msg =  $_GET['deleted'] == '1' ? 'Supprimée' : 'supprime';
            if($_GET['deleted'] == '1'){ ?>
                    <div class="alert alert-success">
                        <p>L'inscription est bien <?php echo $msg; ?></p>
                    </div>
           <?php }
           else{ ?>
                 <div class="alert alert-danger">
                        <p>L'inscription n'est pas <?php echo $msg; ?> contactez le developpeur du site</p>
                    </div>
            <?php }
        }
        
    ?>
    <!-- Tu peux maintenant lister ici les Participants validé  -->
<br><br>
    <table class="table table-border mt-5">
        <thead>
                <th>Nom</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                while ($value = $supP->fetch()) {
                    echo '<tr>';
                    
                        echo '<td>'.$value['nom'].'</td>'; //ou $value['titre'] selon le type mais $value['titre'] est plus sur
                        echo '<td>'.$value['age'].'</td>';
                        echo '<td>
                        
                                    <a class="btn btn-danger ml-2" href="validerP.php?idPsup='.$value['idP'].'" >SUPPRIMER</a>
                                </td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
