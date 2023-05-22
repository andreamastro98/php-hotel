<!-- Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->


<?php

$hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    
    $filtroParcheggio = isset($_GET['parking']);

    $hotelsCopy = $hotels;

    if( isset($_GET['parking']) &&  $_GET['parking'] == '1'){

        $hotelsWithParking = [];

        foreach ($hotels as $elem){
            if( $elem['parking']){

                $hotelsWithParking[] = $elem;                
            }
        }

    $hotelsCopy = $hotelsWithParking;

    }

    if( isset($_GET['voteInput']) &&  $_GET['voteInput'] != ''){

        $hotelsWithVote = [];

        foreach ($hotelsCopy as $elem){
            if( $elem['vote'] >= $_GET['voteInput']){

                $hotelsWithVote[] = $elem;                
            }
        }

    $hotelsCopy = $hotelsWithVote;

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <h1 class="text-center mb-5">Hotels Info</h1>
    <div class="text-center mb-4">
        <form action="index.php" method="GET">

            <label for="">Con parcheggio?</label>
            <select name="parking" id="select-parcheggio" class="me-3">
                <option value="">--scegli--</option>
                <option value="0">Senza parcheggio</option>
                <option value="1">Con parcheggio</option>
            </select>

            <label for="">Voto da 1 a 5?</label>
            <input type="number" name="voteInput" class="me-3">
            
            <div class="d-inline-block">
                <button class="btn btn-primary" type="submit">Filtra</button>
            </div>
        </form>
    </div>


        <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome Hotel</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parking</th>
      <th scope="col">Voto da 1 a 5</th>
      <th scope="col">Distanza dal centro in km</th>
    </tr>
  </thead>
  <tbody>

    

    <?php foreach ($hotelsCopy as $elem){ ?>
        <tr>
            <th scope='row'><?php echo $elem['name'] ?></th> 
            <td><?php echo $elem['description'] ?></td> 
            <td><?php echo $elem['parking'] ?></td>
            <td><?php echo $elem['vote'] ?></td>
            <td><?php echo $elem['distance_to_center'] ?></td> 
            </tr>
    <?php } ?>

    
    
  </tbody>
</table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>