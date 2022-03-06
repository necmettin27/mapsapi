<?php
   if($_POST){
      $address = $_POST["address"];
      $apiKey = 'AIzaSyAgwEcOb6n37QfBvC5JuTGKxV9QQUBxgs8';
      $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
      $geo = json_decode($geo, true);

      if (isset($geo['status']) && ($geo['status'] == 'OK')) {
       $latitude = $geo['results'][0]['geometry']['location']['lat']; 
       $longitude = $geo['results'][0]['geometry']['location']['lng'];
       echo '<div class="alert alert-success"><a href="https://www.google.com/maps/dir//'.$latitude.','.$longitude.'">Rotanız oluşturuldu.Gitmek için tıklayınız.</a></div>';
      }else{
         echo '<div class="alert alert-danger">Rota oluşturulamadı.</div>';
      }
   }

?>

<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Rota Bul</title>
  </head>
  <body>
   <div class="container mt-5">
      <div class="col-md-8 offset-md-2">
         <form class="" method="POST" action="">
            <div class="form-control">
               <label>Adres giriniz</label>
               <textarea class="form-control" rows="3" name="address" required></textarea>
            </div>
            <button class="btn btn-primary mt-4">İdeal rotayı oluştur.</button>
         </form>
      </div>
   </div>
  </body>
</html>