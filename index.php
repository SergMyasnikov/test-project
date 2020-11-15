<?php 

    require_once('funcs/validation.php');

    $errorMessages = [];

    if (count($_POST) > 0) {
        try {
            $formData = validateRegistrationForm($_POST, $errorMessages);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
        if (count($errorMessages) == 0) {
            require_once 'inc/result.php';
            exit;
        }
    }
    require_once 'inc/form.php';



