<?php require_once "../../../private/initialize.php"; ?>

<?php $page_title = "Add Bicycle" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Delete Bicycle</h2>
        <article id="delete-bicycle-article">
            <section class="delete-bicycle-section">
                <p>Are you sure you want to delete this bicycle?</p>
                <form method="post">

                    <div class="form-control">
                        <input type="submit" value="Delete Bicycle">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>