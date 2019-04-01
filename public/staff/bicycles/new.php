<?php require_once "../../../private/initialize.php"; ?>

<?php require_login(); ?>

<?php

$current_page = $_GET['page'] ?? 1;
if(is_post_request()){

    $args = $_POST['bicycle'];

    $bicycle = new Bicycle($args);
    $result = $bicycle->save();
    if($result === true) {
        $new_id = $bicycle->id;
        $session->message('The bicycle was created successfully.');
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $new_id));
    } else {
        // show errors
    }


}else{
    // Display the form
    $bicycle = new Bicycle();
} ?>

<?php $page_title = "Add Bicycle" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/index.php'). '?page=' . h(u($current_page)); ?>">&laquo; Back to List</a>
        </div>
        <h2>Add Bicycle</h2>

        <?php echo display_errors($bicycle->errors); ?>

        <article id="add-bicycle-article">
            <section class="add-bicycle-section add-new-section">
                <form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <?php include_once "form_fields.php"; ?>

                    <div class="form-control">
                        <input type="submit" value="Add Bicycle">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>