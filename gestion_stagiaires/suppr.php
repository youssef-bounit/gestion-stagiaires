<?php
require_once('database.php');
if (isset($_POST['supp'])){
    $id = $_POST['id'];
    $sqlState = $pdo->prepare('DELETE FROM stagiaire WHERE id=?');
    $result = $sqlState->execute([$id]);
    header('location: index.php');
}
?>