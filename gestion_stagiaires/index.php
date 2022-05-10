<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Principale</title>
</head>
<body>
    <?php
    require_once('database.php');
    require_once('nav.php');
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="border border-5 p-3">
            <br>
            <h2 class="text text-center">Page Principale</h2>
            <br>
            <br>
        <?php
        $sqlState = $pdo->query("SELECT * FROM stagiaires.stagiaire");
        $sqlState->execute();
        $stagiaire = $sqlState->fetchALL(PDO::FETCH_OBJ);
        if(isset($_POST['trier'])){
            $sqlState = $pdo->prepare('SELECT * From stagiaires.stagiaire order by age ASC;');
            $result = $sqlState->execute();
            $stagiaire = $sqlState->fetchALL(PDO::FETCH_OBJ);
        }
        if(isset($_POST['trier2'])){
            $sqlState = $pdo->prepare('SELECT * From stagiaires.stagiaire order by nom ASC;');
            $result = $sqlState->execute();
            $stagiaire = $sqlState->fetchALL(PDO::FETCH_OBJ);
        }
        ?>
        <table style="margin-left: 10%;;" class="table w-75 caption-top table-bordered">
            <form class="position-relative" action="ajouter.php">
                <input class="btn btn-success position-absolute start-50 translate-middle w-25" type="submit" name="ajou" value="AJOUTER">
            </form>
            <br>
            <br>
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Numéro Classe</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Age</th>
                        <th scope="col">Opération</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($stagiaire as $key => $stagiair){
                        ?>
                        <tr>
                            <th scope="row">#<?php echo $stagiair->id?></th>
                            <th scope="row"><?php echo ($key+1)?></th>
                            <td><?php echo $stagiair->nom?></td>
                            <td><?php echo $stagiair->prenom?></td>
                            <td><?php echo $stagiair->age?></td>
                        <td>
                            <form method="post">
                            <input type="hidden" name='id' value="<?php echo $stagiair->id?>"> 
                            <input formaction="suppr.php" class="btn btn-danger ms-3 float-end" type="submit" name="supp" value="SUPPRIMER" onclick="return confirm('wach bsse7 baghi temse7 <?php echo $stagiair->prenom ?> <?php echo $stagiair->nom?> !!!!!')">
                            <input formaction="modi.php" class="btn btn-primary float-end" type="submit" name="mod" value="MODIFIER">
                            </form>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
        </table>
        <br>
        <form method="post" class="d-grid gap-2 col-6 mx-auto">
            <input class="btn btn-warning" type="submit" name="trier2" value="Trier par nom (A,B,C.....)">
            <input class="btn btn-info" type="submit" name="trier" value="Trier par âge (1,2,3.....)">
        </form>
        <br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>