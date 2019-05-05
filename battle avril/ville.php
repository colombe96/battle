<?php
    $db = new PDO("mysql:host=localhost; dbname=exercice_soro","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $request = $db->prepare("SELECT villes*.,pays.nom AS nom_pays FROM villes
                            INNER JOIN pays ON pays.id=ville.id_pays
                            INNER JOIN continents ON continents.id=pays.id_continents
                            WHERE continents.id = ?");


    /*$request->execute();*/
    $villes = $request->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['update']))
    {
        $request= $db->prepare('UPDATE villes SET superficie = ? WHERE id=?');
        $request->execute([$_POST['superficie'], $_POST['illes']]);

    }


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>ville</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table des habitants de l'Afrique</h2>
<form class="form-group" method="post">
    <input class="form-control" name="supreficie" placeholder="Entrez une Taille en km2">
    <div class="row">
        <div class="col-md-6">
            <select class="form-control">
            <?php foreach($villes as $ville):?>
                <option value="<?=$ville->id?>"><?=$ville->nom?></option>
            <?php endforeach?>    
            </select>
        </div>
        <div class="col-md-6">
                <button class="btn btn-primary">Modifier la superficie</button>

        </div>
    </div>
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
     <?php foreach($villes as $ville):?>
     <tr>
        <td><?=$ville->nom?></td>
        <td><?=$ville->superficie?></td>
        <td><?=$ville->nom_pays?></td>
     </tr>
     <?php endforeach?>
    </tbody>
  </table>
</div>

</body>
</html>