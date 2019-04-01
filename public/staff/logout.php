<?php require_once "../../private/initialize.php"; ?>

<?php
$session->logout();

redirect_to(url_for("/staff/login.php"));
?>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>