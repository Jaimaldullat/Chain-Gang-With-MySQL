<?php require_once "../../../private/initialize.php"; ?>

<?php if(!isset($_GET['id'])){
    redirect_to('/staff/bicycles/index.php');
}
$id = $_GET['id'];

if(is_post_request()){

}else {
    $bicycle = Bicycle::find_by_id($id);
    if($bicycle == false){
        redirect_to("/staff/bicycles/index.php");
    }
}

?>

<?php $page_title = "Add Bicycle" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Edit Bicycle</h2>
        <article id="edit-bicycle-article">
            <section class="edit-bicycle-section">
                <form method="post">

                    <?php include_once "form_fields.php"; ?>

                    <div class="form-control">
                        <input type="submit" value="Edit Bicycle">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>