<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Ajouter</title>
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
        <div class="position-absolute top-50 start-50 translate-middle w-50 p-3">
            <div class="border border-5 p-3">
                <br>
                <h2 class="text text-center">Page d'Ajouter</h2>
                <br>
                <?php
                    if (isset($_POST['send'])){
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $age = $_POST['age'];
                        if(!empty($nom) && !empty($prenom) && !empty($age)){
                            $sqlState = $pdo->prepare("INSERT INTO stagiaire VALUES(null,?,?,?)");
                            $result = $sqlState->execute([$nom,$prenom,$age]);
                            header('location: index.php');
                            ?>
                            <div class="alert alert-success">
                                Stagiaire <b><?= $prenom?></b>  est bien ajouter
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger">
                                Toutes les champs est obligatoire !!!!
                            </div>
                            <?php
                        }
                    }
                ?>
                <form method="POST">
                    <label>Nom :</label><br>
                        <input class="w-100" placeholder="Nom......" type="text" name="nom"><br>
                    <label>Prenom :</label><br>
                        <input class="w-100" placeholder="Prenom......" type="text" name="prenom"><br>
                    <label>Age :</label><br>
                        <input class="w-100" placeholder="Age......" type="number" name="age"><br>
                    <br>
                        <input class="btn btn-primary" type="submit" name="send" value="Ajouter stagiair">
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>