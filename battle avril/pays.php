<?php
$db= new PDO("mysql:host=localhost; dbname=exercice_soro","root","");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$query=$db->prepare('SELECT id FROM pays WHERE id_continent= ?
ORDER by id DESC 
LIMITE 1 OFFSET 0');

$request->execute([$_GET['id']]);
$result= $request->fetch(PDO::FETCH_OBJ);
$last_id = $result['id'];





?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>pays</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table des villes de l'Afrique</h2>
<form class="form-group">
    <input class="from-control" name="ville1" placeholder="Entrez un nom">
     <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <button class="btn btn-primary">Ajouter 3 villes</button>
      
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Pays</th>
      </tr>
    </thead>
    <tbody>
   
    <?php foreach($pays as $value):
    $request = $db->prepare("SELECT COUNT(id) AS ndr_ville FROM villes WHERE id_pays =?");
    $request->execute([$value->id]);
    $nbr_ville = $request->fetch(PDO::FETCH_OBJ); ?>

    <tr>
	    <td><?= $value->nom ?></td>
	    <td><?= $value->superficie ?></td>
	    <td>
	        <?= $nbr_ville->nbr_ville ?>
	    </td>
    </tr>

    <?php endforeach?>
    </tbody>
  </table>
</div>

</body>
</html>