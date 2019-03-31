<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff<?php if(isset($page_title)) { echo " - " . $page_title; } ?> </title>
    <link rel="stylesheet" href="<?php echo url_for('stylesheets/staff.css'); ?>">
</head>
<body>
<header id="staff-header">
    <h1>Chain Gang Staff Area</h1>
</header>
<nav id="main-nav">
    <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Menu</a></li>
    </ul>
</nav>

<?php echo display_session_message(); ?>