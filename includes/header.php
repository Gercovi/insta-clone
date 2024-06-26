<?php

# Sets relative path
chdir($_SERVER['DOCUMENT_ROOT']);

# Including classes
require_once "classes/session.php";
require_once "classes/debug.php";
require_once "classes/database.php";
require_once "classes/authentication.php";

# Start session, database and maybe error logging
Debug::enable();
Session::start();
Authentication::verify();
$GLOBALS['conn'] = Database::connect();

require_once "classes/post.php";
$post = new Post();
$post->getById(1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="./static/styles.css">
    <title>InstaClone</title>
</head>
<body>

<?php 
    if(!isset($emptyMain)) {
        include "components/sidebar.php";
    }
