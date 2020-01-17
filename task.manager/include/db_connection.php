<?php

function connect()
{
    static $dbh = null;

    if ($dbh === null) {
        $dbh = new PDO('mysql:host=localhost;dbname=tmdb', 'tm_admin', '111');
    }

    return $dbh;
}
