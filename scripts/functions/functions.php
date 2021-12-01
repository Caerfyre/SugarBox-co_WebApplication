<?php

if (!isset($_SESSION['functions'])) {
    $_SESSION['functions'] = array(
        "toggleCart" => false,
        "toggleProfile" => false,
        "toggleSearch" => false
    );
}

?>