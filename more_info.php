<?php
    include_once "api_key.php";

    $url = "https://api.themoviedb.org/3/movie/" . $_GET['id'] . "?api_key=" . $APIKey . "&language=pt-BR";
    $movie = json_decode(file_get_contents($url));

    $url_movie_info = "https://api.themoviedb.org/3/movie/" . $_GET['id'] . "?api_key=" . $APIKey . "&language=pt-BR";
    $movie_info = json_decode(file_get_contents($url_movie_info));

    $url_cast = "https://api.themoviedb.org/3/movie/" . $_GET['id'] . "/credits?api_key=" . $APIKey . "&language=pt-BR";
    $movie_cast = json_decode(file_get_contents($url_cast));
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/info.css">
        <title><?= $movie_info->title . " (" . date('Y', strtotime($movie_info->release_date)) . ")" ?></title>
    </head>
    <body>
        <div class="container">
            <a class="btn btn-secondary" href="./index.php">Voltar</a>
            <div class="card-movie">                
                <div class="poster-movie">
                    <?php $poster = "https://image.tmdb.org/t/p/original" . $movie_info->poster_path; ?>
                    <img src=<?= $poster ?> alt='<?= $movie_info->title ?>'>
                </div>

                <div class="info-movie">
                    <h1><?= $movie_info->title . " (" . date('Y', strtotime($movie_info->release_date)) . ")" ?></h1>

                    <h6>Título original: <?= $movie_info->original_title ?></h6>

                    <p><?= $movie_info->overview ?></p>

                    <h4><?= "Estreia em: " . date('d/m/Y', strtotime($movie_info->release_date)) ?></h4>

                    <h6>Nota dos Usuários: <?= $movie_info->vote_average ?></h6>

                    <table class="genres">
                        <tr>
                            <?php foreach($movie_info->genres as $genero): ?>
                                <td><?= $genero->name ?></td>
                            <?php endforeach ?>
                        </tr>
                    </table>
                    
                </div>
            </div>
            <div class="extra-info">
                <h3>Elenco</h3>
                <hr>

                <?php foreach($movie_cast->cast as $cast): ?>
                    <div class="card-cast">
                        <?php $picture_cast = "https://image.tmdb.org/t/p/original" . $cast->profile_path; ?>

                        <img class="picture-cast" src=<?= $picture_cast ?> alt='<?= $cast->profile_path ? $cast->name : "Não há foto." ?>'>
                        <p>
                            <?= $cast->name ?> <strong>(<?= $cast->character ?>)</strong>
                        </p>
                    </div>
                <?php endforeach ?>
                
                <h3>Produtoras</h3>
                <hr>

                <?php foreach($movie_info->production_companies as $production): ?>
                    <h6>
                        <?php $logo_production = "https://image.tmdb.org/t/p/original" . $production->logo_path; ?>
                    </h6>
                    <img class="logo-production" src=<?= $logo_production ?> alt='<?= $production->name ?>'>
                <?php endforeach ?>
                
            </div>
        </div>
    </body>
</html>