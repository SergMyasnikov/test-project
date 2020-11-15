<?php
    require_once('header.php');
?>
<h2>Форма регистрации</h2>
<?php 
    if (count($errorMessages) > 0) :
?>
<div class="alert alert-danger" role="alert">
    <ul>
        <?php foreach($errorMessages as $message) : ?>
        <li><?=$message?></li>    
        <?php endforeach; ?>
    </ul>
</div>
<?php
    endif;
?>
<form action="" method="post">
    <?php $name = (isset($formData) ? $formData['name'] : '') ?>
    <div class="form-group">
        <input type="text" name="name" placeholder="Имя" value="<?=$name ?>" class="form-control" />
    </div>
    <?php $email = (isset($formData) ? $formData['email'] : '') ?>
    <div class="form-group">
        <input type="text" name="email" placeholder="Адрес электронной почты" value="<?=$email ?>" class="form-control" />
    </div>
    <?php $phone = (isset($formData) ? $formData['phone'] : '') ?>
    <div class="form-group">
        <input type="text" name="phone" placeholder="Номер телефона" value="<?=$phone ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Выберите любимые автомобили</label>
        <select size="4" multiple="multiple" name="favoriteCars[]"  class="form-control">
            <option value="BMW">BMW</option>
            <option value="Mercedes">Mercedes</option>
            <option value="Audi">Audi</option>
            <option value="Volvo">Volvo</option>
        </select>
    </div>
    <?php $movies = (isset($formData) ? implode(', ', $formData['favoriteMovies']) : '') ?>
    <div class="form-group">
        <label for="favoriteMovies">Введите любимые фильмы. Минимум 2 или более. Вводить через запятую</label>
        <input type="text" name="favoriteMovies" value="<?=$movies ?>" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Отправить" />
    </div>
</form>
<?php
    require_once('footer.php');
?>