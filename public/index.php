<?php include_once "../private/initialize.php"; ?>

<?php $page_title = "Home"; ?>
<?php include_once SHARED_PATH . "/public_header.php"; ?>
<main>
    <nav id="main-nav">
        <ul>
            <li>
                <a href="bicycles.php" class="">View Our Inventory</a>
                <!-- /. -->
            </li>
            <li>
                <a href="about.php" class="">About Us</a>
                <!-- /. -->
            </li>
        </ul>
    </nav>
    <article id="main-image">
        <img class="big-cycles-img" src="<?php echo url_for(u('/images/big-cycles.jpeg')); ?>" alt="Cycles Image">
    </article>
</main>

<?php include_once SHARED_PATH . "/public_footer.php"; ?>