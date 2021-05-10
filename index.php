<?php
    include_once "api_key.php";
    
    $url_popular_movies = "https://api.themoviedb.org/3/movie/popular?api_key=" . $APIKey . "&language=pt-BR";
    $url_genres = "https://api.themoviedb.org/3/genre/movie/list?api_key=" . $APIKey . "&language=pt-br";

    $movie = json_decode(file_get_contents($url_popular_movies));
    $all_genres = json_decode(file_get_contents($url_genres));

    foreach($movie->results as $movie) {
        $id_list[] = $movie->id;
    }
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
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <title>Principais Lançamentos de Filmes</title>
    </head>
    <body>
        <div class="container">
            <div class="title">
                <h1>Principais Lançamentos de Filmes</h1>
            </div>

            <div>
                <button class="btn btn-secondary" id="orderASC">Order ASC</button>
                <button class="btn btn-secondary" id="orderDESC">Order DESC</button>
            </div>

            <div class="filter-option">
                <?php foreach($all_genres->genres as $genre): ?>
                        <label>
                            <input class="tipo_genero" rel="<?= $genre->name ?>" type="checkbox"><?= $genre->name ?>
                        </label>
                <?php endforeach ?>
            </div>

            <?php for($i=0; $i < count($id_list); $i++): ?>
                <div class="card-movie">
                    <?php
                        $url_movie_info = "https://api.themoviedb.org/3/movie/" . $id_list[$i] . "?api_key=" . $APIKey . "&language=pt-BR";
                        
                        $movie_info = json_decode(file_get_contents($url_movie_info));
                    ?>
                    
                    <div class="poster-movie">
                        <?php $poster = "https://image.tmdb.org/t/p/original" . $movie_info->poster_path; ?>
                        <img src=<?= $poster ?> alt='<?= $movie_info->title ?>'>
                    </div>

                    <div class="info-movie">
                        <h1><?= $movie_info->title ?></h1>

                        <p><?= $movie_info->overview ?></p>

                        <h4><?= "Estreia em: " . date('d/m/Y', strtotime($movie_info->release_date)) ?></h4>
                
                        <table class="genres">
                            <tr>
                                <?php foreach($movie_info->genres as $genero): ?>
                                    <td class="<?= $genero->name ?>"><?= $genero->name ?></td>
                                <?php endforeach ?>
                            </tr>
                        </table>

                        <?php $_GET['id'] = $id_list[$i] ?>

                        <div>
                            <a class="btn btn-dark" href="./more_info.php?id=<?= $_GET['id'] ?>">Saiba mais</a>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>

        <script src="js/script.js"></script>
    </body>
</html>