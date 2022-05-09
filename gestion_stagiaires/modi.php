<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Modifier</title>
</head>
<body>
    <?php
        if(!isset($_POST['id'])){
            header('location: index.php');
        }

    require_once('database.php');
    require_once('nav.php');
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle w-50 p-3">
            <div class="border border-5 p-3">
                <br>
                <h2 class="text text-center">Page d'Modifier</h2>
                <br>
                <?php
                    $id = $_POST['id'];
                    $sqlState = $pdo->prepare('SELECT * FROM stagiaire WHERE id=?');
                    $sqlState->execute([$id]);
                    $stagiair= $sqlState->fetch(PDO::FETCH_OBJ);
                    if(isset($_POST['mod2'])){
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $age = $_POST['age'];
                        $id = $_POST['id'];
                        if( !empty($id) && !empty($nom) && !empty($prenom) && !empty($age)){
                            $sqlState = $pdo->prepare('UPDATE stagiaire SET nom=? , prenom=? , age=? WHERE id=?;');
                            $result = $sqlState->execute([$nom,$prenom,$age,$id]);
                            if($result == true){
                                header('location: index.php');
                            }else{
                                ?>
                                <div class="alert alert-danger">
                                    Error
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="alert alert-danger">
                                Toutes les champs est obligatoire !!!!
                            </div>
                            <?php
                        }
                    }
                ?>
                <br>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $stagiair->id?>"><br>
                    <label>Nom :</label><br>
                        <input class="w-100" placeholder="Nom......" type="text" name="nom" value="<?php echo $stagiair->nom?>"><br>
                    <label>Prenom :</label><br>
                        <input class="w-100" placeholder="Prenom......" type="text" name="prenom" value="<?php echo $stagiair->prenom?>"><br>
                    <label>Age :</label><br>
                        <input class="w-100" placeholder="Age......" type="number" name="age" value="<?php echo $stagiair->age?>"><br>
                    <br>
                        <input class="btn btn-primary" type="submit" name="mod2" value="MODIFIER">
                </form>
            </div>
        </div>
    </div>
</body>
</html>