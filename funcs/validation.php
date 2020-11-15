<?php

/* Выполняет проверку формы регистрации.
 * 
 * Входные параметры:
 * $input - ассоциативный массив с данными
 * $errorMessages - переменная для записи ошибок.
 * 
 * Возвращает ассоциативный массив с проверенными данными.
 * Если при проверке обнаружены ошибки, их описание записывается в массив $errorMessages.
 * Если ошибок нет, в $errorMessages записывается пустой массив.
 *  */

function validateRegistrationForm($input, &$errorMessages)
{
    $errorMessages = [];
    $result = array(
        'name' => '',
        'email' => '',
        'phone' => '',
        'favoriteCars' => [],
        'favoriteMovies' => []
    );
    
    if (!is_array($input)) {
        throw new Exception('Первый параметр должен быть массивом');
    }
    
    if (array_key_exists('name', $input)) {
       $result['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
    }
    
    if (array_key_exists('email', $input)) {
       $result['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    }

    if (array_key_exists('phone', $input)) {
       $result['phone'] = filter_var($input['phone'], FILTER_SANITIZE_STRING);
    }
    
    if (array_key_exists('favoriteCars', $input) 
            && is_array($input['favoriteCars'])) {
        foreach ($input['favoriteCars'] as $car)
        {
            $result['favoriteCars'] []= filter_var($car, FILTER_SANITIZE_STRING);
        }
    }

    if (array_key_exists('favoriteMovies', $input)) {
        $movies = filter_var($input['favoriteMovies'], FILTER_SANITIZE_STRING);
        $result['favoriteMovies'] = explode(',', $movies);
        foreach($result['favoriteMovies'] as $key => $val)
        {
            $result['favoriteMovies'][$key] = trim($val);
        }
    }
    
    if (array_key_exists('phone', $input)) {
       $result['phone'] = filter_var($input['phone'], FILTER_SANITIZE_STRING);
    }
    
    if (mb_strlen($result['name']) < 3) {
        $errorMessages []= "Поле 'Имя' должно содержать не менее 3 символов";
    }

    if (mb_strlen($result['email']) < 5) {
        $errorMessages []= "Поле 'Адрес электронной почты' должно содержать не менее 5 символов";
    }

    if (mb_strlen($result['phone']) < 10) {
        $errorMessages []= "Поле 'Номер телефона' должно содержать не менее 10 символов";
    }
    
    if (count($result['favoriteCars']) == 0) {
        $errorMessages []= "Необходимо выбрать хотя бы один любимый автомобиль";
    }

    if (count($result['favoriteMovies']) < 2) {
        $errorMessages []= "Необходимо указать не менее двух любимых фильмов";
    }
    
    return $result;
}

