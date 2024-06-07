<?php



    // Clean Input Value
    function cleanInput(string $input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    // get Session
    function session(string $sessionKey) {
        return !empty($_SESSION[$sessionKey]) ? $_SESSION[$sessionKey] : false;
    }
    

?>