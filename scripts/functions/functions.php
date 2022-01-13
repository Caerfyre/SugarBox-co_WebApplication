<?php

if (!isset($_SESSION['functions'])) {
    $_SESSION['functions'] = array(
        "toggleCart" => false,
        "toggleOptions" => false,
        "toggleSearch" => false
    );
}

?>