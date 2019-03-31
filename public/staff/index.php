<?php require_once "../../private/initialize.php"; ?>

<?php $page_title = "Main Menu" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

<main id="staff-main">
    <h2>Main Menu</h2>
    <nav id="inner-menu">
        <ul>
            <li><a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">Bicycles</a> </li>
        </ul>
    </nav>

</main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>