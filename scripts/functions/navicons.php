<?php

session_start();

if (isset($_POST['navIcon'])) {
    switch ($_POST['navIcon']) {
        case 'toggleCart':
            $_SESSION['functions']['toggleCart'] = !$_SESSION['functions']['toggleCart'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;
    
        case 'toggleOptions':
            $_SESSION['functions']['toggleOptions'] = !$_SESSION['functions']['toggleOptions'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;
    
        case 'toggleSearch':
            $_SESSION['functions']['toggleSearch'] = !$_SESSION['functions']['toggleSearch'];
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;
    }
}

if (isset($_POST['viewProfile'])) {
    $_SESSION['functions']['toggleOptions'] = false;
    header('Location: ../../src/account.php');
}

if (isset($_POST['viewHistory'])) {
    // $_SESSION['functions']['toggleOptions'] = false;
    // Redirect to order history page
}

if (isset($_POST['checkout'])) {
    $_SESSION['functions']['toggleCart'] = false;
    header('Location: ../../src/checkout.php?type=1');
}

?>