<?php require_once "../../../private/initialize.php"; ?>

<?php $page_title = "Admins" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="admins-main">
        <h2>Admins</h2>
        <div class="action">
            <a href="<?php echo url_for('/staff/admins/new.php'); ?>">Add Admin</a>
        </div>
        <article id="admins-article">
            <section class="admins-section">
                <table class="admins-table staff-table">

                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                    $admins = Admin::find_all();
                    ?>

                    <?php foreach($admins as $admin): ?>
                        <tr>
                            <td><?php echo h($admin->id); ?></td>
                            <td><?php echo h($admin->first_name); ?></td>
                            <td><?php echo h($admin->last_name); ?></td>
                            <td><?php echo h($admin->email); ?></td>
                            <td><?php echo h($admin->username); ?></td>
                            <td><a class="action" href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin->id))); ?>">View</a></td>
                            <td><a class="action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin->id))); ?>">Edit</a></td>
                            <td><a class="action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin->id))); ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>