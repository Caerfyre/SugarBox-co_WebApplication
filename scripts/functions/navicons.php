<?php

session_start();

if (isset($_POST['navIcon'])) {
    switch ($_POST['navIcon']) {
        case 'toggleCart':
            $_SESSION['functions']['toggleCart'] = !$_SESSION['functions']['toggleCart'];
            echo "<script>history.back()</script>";
            break;
    
        case 'toggleOptions':
            $_SESSION['functions']['toggleOptions'] = !$_SESSION['functions']['toggleOptions'];
            echo "<script>history.back()</script>";
            break;
    
        case 'toggleSearch':
            $_SESSION['functions']['toggleSearch'] = !$_SESSION['functions']['toggleSearch'];
            echo "<script>history.back()</script>";
            break;
    }
}

if (isset($_POST['viewProfile'])) {
    $_SESSION['functions']['toggleOptions'] = false;
    header('Location: ../../src/account.php');
}

if (isset($_POST['viewHistory'])) {
    $_SESSION['functions']['toggleOptions'] = false;
    header('Location: ../../src/account.php#orderHistory');
}

if (isset($_POST['checkout'])) {
    $_SESSION['functions']['toggleCart'] = false;
    header('Location: ../../src/checkout.php?type=1');
}

?>