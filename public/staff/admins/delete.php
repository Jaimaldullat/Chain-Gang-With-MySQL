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

    // Delete bicycle
    $result = $admin->delete();
    $_SESSION['message'] = 'The admin was deleted successfully.';
    redirect_to(url_for('/staff/admins/index.php'));
}
?>
<?php $page_title = "Delete Admin" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="admins-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Delete Admin</h2>
        <article id="delete-admin-article">
            <section class="delete-admin-section">
                <p>Are you sure you want to delete this ( <?php echo $admin->full_name(); ?> ) bicycle?</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>">

                    <div class="form-control">
                        <input type="submit" value="Delete Admin">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>