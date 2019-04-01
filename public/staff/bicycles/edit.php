<?php require_once "../../../private/initialize.php"; ?>

<?php require_login(); ?>

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

    $args = $_POST['bicycle'];
    $args['id'] = $id;
    $bicycle = new Bicycle($args);
    $result = $bicycle->save();
    if($result === true) {
        $new_id = $id;
        $session->message('The bicycle was updated successfully.');
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $new_id));
    } else {
        // show errors
    }
}else {

// Display form
}

?>

<?php $page_title = "Edit Bicycle" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>
        </div>
        <h2>Edit Bicycle</h2>

        <?php echo display_errors($bicycle->errors); ?>

        <article id="edit-bicycle-article">
            <section class="edit-bicycle-section edit-record-section">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id; ?>">

                    <?php include_once "form_fields.php"; ?>

                    <div class="form-control">
                        <input type="submit" value="Edit Bicycle">
                    </div>

                </form>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>