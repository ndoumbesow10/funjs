<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php 

        $servname = 'localhost';
        $dbname = 'kyllit';
        $user = 'root';
        $pass = 'passer';
        $validatedEvents = '';
        $dbco = NULL;
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $stmt = $dbco->prepare('SELECT * from Participants where statut=:statut'); 
            $stmt->execute(array(
                'statut' => 'valide'
            ));
            $validatedEvents = $stmt;
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        if(isset($_GET['idEventForValidate'])){
            $stmt = $dbco->prepare('UPDATE Participants set statut=:statut where idEvenemets=:id'); 
            echo 'here';
            $state = $stmt->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
                'id' => $_GET['idEventForValidate'],
                'statut' => 'valide'
            ));
            header('location:validerP.php?validated='.$state);
             //pour rediriger vers la page validatedEventsView.php avec la variable valideted
            //pour afficher le message de success ou d'erreur selon quelle soit true or false
        }
        if(isset($_GET['idEventForNoValidate'])){
            $stmt = $dbco->prepare('Delete from Participants where idEvenemets=:id'); 
            $state = $stmt->execute(array( //state est la valeur de retour(true or false) pour verifier si le statut est bien changé
                'id' => $_GET['idEventForNoValidate']
            ));
            header('location:validerP.php?deleted='.$state);
             //pour rediriger vers la page validatedEventsView.php avec la variable valideted
            //pour afficher le message de success ou d'erreur selon quelle soit true or false
        }
        if(isset($_GET['validated']) || isset($_GET['deleted'])){
            $msg =  $_GET['validated'] == '1' ? 'Valide' : 'supprime';
            if($_GET['validated'] == '1' || $_GET['deleted'] == '1'){ ?>
                    <div class="alert alert-success">
                        <p>L'evenement est bien <?php echo $msg; ?></p>
                    </div>
           <?php }
           else{ ?>
                 <div class="alert alert-danger">
                        <p>L'evenement n'est pas <?php echo $msg; ?> contactez l'admin du site</p>
                    </div>
            <?php }
        }
    ?>
    <!-- Tu peux maintenant lister ici les Participants validé  -->
    
    <table class="table table-border mt-5">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Statut</th>
                
            </tr>
        </thead>
        <tbody>
        
            <?php
                while ($value = $validatedEvents->fetch()) {
                    echo '<tr>';
                        echo '<td>'.$value['nom'].'</td>'; //ou $value['titre'] selon le type mais $value['titre'] est plus sur
                        echo '<td>'.$value['age'].'</td>';
                        echo '<td>'.$value['statut'].'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
