<?php
$db = new PDO("mysql:host=localhost; dbname=exercice_soro","root","");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$request = $db->query("SELECT * FROM continents");
$request->execute();

 $continents = $request->fetchAll(PDO::FETCH_OBJ);


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table des continents</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($continents as $continent ): ?>
      	<tr>
	        <td><?= $continent->nom ?></td>
	        <td><?= $continent->superficie ?></td>
	        <td>
	            <a href="pays.php?id=<?= $continent->id ?>" class="btn btn-primary">Voir pays</a>
	            <a href="ville.php?id=<?= $continent->id ?>" class="btn btn-success">Voir villes</a>
	            <a href="habitant1.php?id=<?= $continent->id?>" class="btn btn-danger">Voir habitants</a>
	        </td>
      </tr>
      <?php endforeach ?>
     
    </tbody>
  </table>
</div>

</body>
</html>