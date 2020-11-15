<?php
    require_once('header.php');
?>

<h1>Вся информация</h1>
<?=$formData['name']?><br/>
<?=$formData['email']?><br/>
<?=$formData['phone']?><br/>
<p><strong>fav_cars: </strong></p>
<ul>
    <?php foreach ($formData['favoriteCars'] as $car) : ?>
    <li><?=$car?></li>
    <?php endforeach; ?>
</ul>
<p><strong>fav_films: </strong></p>
<ul>
    <?php foreach ($formData['favoriteMovies'] as $movie) : ?>
    <li><?=$movie?></li>
    <?php endforeach; ?>
</ul>
<?php
    require_once('footer.php');
?>