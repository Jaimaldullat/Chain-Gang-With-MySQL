<?php require_once "../../../private/initialize.php"; ?>

<?php require_login(); ?>

<?php $page_title = "Bicycles" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <h2>Bicycles</h2>
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/new.php'); ?>">Add Bicycle</a>
        </div>
        <article id="inventory-article">
            <section class="inventory-section">
                <table class="inventory-table staff-table">

                    <tbody>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Gender</th>
                        <th>Color</th>
                        <th>Weight</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $bikes = Bicycle::find_all();
                    ?>

                    <?php foreach($bikes as $bike): ?>
                        <tr>
                            <td><?php echo h($bike->brand); ?></td>
                            <td><?php echo h($bike->model); ?></td>
                            <td><?php echo h($bike->year); ?></td>
                            <td><?php echo h($bike->category); ?></td>
                            <td><?php echo h($bike->gender); ?></td>
                            <td><?php echo h($bike->color); ?></td>
                            <td><?php echo h($bike->weight_kg()); ?></td>
                            <td><?php echo h($bike->condition()); ?></td>
                            <td><?php echo h($bike->price); ?></td>
                            <td><a href="<?php echo url_for('/staff/bicycles/show.php?id=' . h(u($bike->id)));  ?>">View</a> </td>
                            <td><a href="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($bike->id)));  ?>">Edit</a> </td>
                            <td><a href="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($bike->id)));  ?>">Delete</a> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>