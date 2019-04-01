<?php include_once "../private/initialize.php"; ?>

<?php $page_title = "About"; ?>
<?php include_once SHARED_PATH . "/public_header.php"; ?>
    <main id="about-main">
        <article id="about-article">
            <header>
                <h1>About</h1>
            </header>
            <section class="about-section">
                <p>Chain Gang was started in 2005 by a group of bicycle loving friends. We wanted to create a
                    neighborhood bike shop that could also deliver top-quality bicycles to your doorstep. Now with six
                    locations around the city, we are able to reach even more neighborhoods.</p>
                <p>Our mechanics inspect every bicycle from top to bottom before it leaves our shop. If you have
                    questions, our expert staff has the knowledge and experience to advise you and to meet all of your
                    cycling needs.</p>
            </section>
        </article>
        <img class="about-big-image" src="<?php echo url_for('/images/about-big.jpeg'); ?>" alt="">

        <!-- /#about-article -->
    </main>

<?php include_once SHARED_PATH . "/public_footer.php"; ?>