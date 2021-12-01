<?php

session_start();

switch ($_POST['navIcon']) {
    case 'toggleCart':
        $_SESSION['functions']['toggleCart'] = !$_SESSION['functions']['toggleCart'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        break;

    case 'toggleProfile':
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        break;

    case 'toggleSearch':
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        break;
}

?>