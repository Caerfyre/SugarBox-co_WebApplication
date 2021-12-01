<?php

session_start();

switch ($_POST['navIcon']) {
    case 'toggleCart':
        $_SESSION['functions']['toggleCart'] = !$_SESSION['functions']['toggleCart'];
        header('Location: ../../index.php'); // change this to "previous page" location
        break;

    case 'toggleProfile':
        header('Location: ../../index.php'); // change this to "previous page" location
        break;

    case 'toggleSearch':
        header('Location: ../../index.php'); // change this to "previous page" location
        break;
}

?>