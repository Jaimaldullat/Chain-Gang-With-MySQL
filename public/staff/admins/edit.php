<?php require_once "../../../private/initialize.php"; ?>

<?php if(!isset($_GET['id'])){
    redirect_to('/staff/admins/index.php');
}
$id = $_GET['id'];
$admin = Admin::find_by_id($id);
if($admin == false){
    redirect_to("/staff/admins/index.php");
}
// When form is submitted
if(is_post_request()){

    $args = $_POST['admin'];
    $args['id'] = $id;
    $admin = new Admin($args);
    $result = $admin->save();
    if($result === true) {
        $new_id = $id;
        $_SESSION['message'] = 'The admin was updated successfully.';
        redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
    } else {
        // show errors
    }
}else {

// Display form
}

?>

<?php $page_title = "Edit Admin" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="admins-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Edit Admin</h2>

        <?php echo display_errors($admin->errors); ?>

        <article id="edit-admin-article">
            <section class="edit-admin-section edit-record-section">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>">

                    <?php include_once "form_fields.php"; ?>

                    <div class="form-control">
                        <input type="submit" value="Edit Admin">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>