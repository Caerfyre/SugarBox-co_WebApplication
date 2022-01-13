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
    // Redirect to profile page
}

?>