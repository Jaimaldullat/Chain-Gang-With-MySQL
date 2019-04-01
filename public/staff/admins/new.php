<?php require_once "../../../private/initialize.php"; ?>

<?php require_login(); ?>

<?php
if(is_post_request()){

    $args = $_POST['admin'];

    $admin = new Admin($args);
    $result = $admin->save();
    if($result === true) {
        $new_id = $admin->id;
        $session->message('The admin was created successfully.');
        redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
    } else {
        // show errors
    }


}else{
    // Display the form
    $admin = new Admin();
} ?>

<?php $page_title = "Add Admin" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="admins-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Add Admin</h2>

        <?php echo display_errors($admin->errors); ?>

        <article id="add-admin-article">
            <section class="add-admin-section add-new-section">
                <form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <?php include_once "form_fields.php"; ?>

                    <div class="form-control">
                        <input type="submit" value="Add Admin">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>