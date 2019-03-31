<?php require_once "../../../private/initialize.php"; ?>


<?php if(!isset($_GET['id'])){
    redirect_to('/staff/bicycles/index.php');
}
$id = $_GET['id'];
$bicycle = Bicycle::find_by_id($id);
if($bicycle == false){
    redirect_to("/staff/bicycles/index.php");
}
// When form is submitted
if(is_post_request()){

    // Delete bicycle
    $result = $bicycle->delete();
    $_SESSION['message'] = 'The bicycle was deleted successfully.';
    redirect_to(url_for('/staff/bicycles/index.php'));
}
?>
<?php $page_title = "Add Bicycle" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Delete Bicycle</h2>
        <article id="delete-bicycle-article">
            <section class="delete-bicycle-section">
                <p>Are you sure you want to delete this ( <?php echo $bicycle->name(); ?> ) bicycle?</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>">

                    <div class="form-control">
                        <input type="submit" value="Delete Bicycle">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>