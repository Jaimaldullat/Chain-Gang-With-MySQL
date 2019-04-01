<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

// Get requested ID
$id = $_GET['id'] ?? false;

if(!$id) {
    redirect_to(url_for("/staff/admins/index.php"));
}
// Find bicycle using ID
$admin = Admin::find_by_id($id);
if(!$admin) {

    redirect_to(url_for("/staff/admins/index.php"));
}

?>

<?php $page_title = 'Detail: '. $admin->full_name(); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<main id="detail-main">

    <div class="action">
        <a href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>
    </div>
    <h2>Admin Detail</h2>

    <section id="detail-section">

        <ul class="detail">
            <li>
                <div>First Name</div>
                <div><?php echo h($admin->first_name); ?></div>
            </li>
            <li>
                <div>Last Name</div>
                <div><?php echo h($admin->last_name); ?></div>
            </li>
            <li>
                <div>Email</div>
                <div><?php echo h($admin->email); ?></div>
            </li>
            <li>
                <div>Username</div>
                <div><?php echo h($admin->username); ?></div>
            </li>
        </ul>

    </section>

</main>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
