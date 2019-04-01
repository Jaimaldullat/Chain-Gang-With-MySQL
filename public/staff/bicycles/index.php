<?php require_once "../../../private/initialize.php"; ?>

<?php require_login(); ?>

<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 2;
$total_count = Bicycle::count_all();

$pagination = New Pagination($current_page, $per_page, $total_count);

$sql = "SELECT * FROM bicycles ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()} ";
$bikes = Bicycle::find_by_sql($sql);

//$bikes = Bicycle::find_all();
?>
<?php $page_title = "Bicycles" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="bicycles-main">
        <h2>Bicycles</h2>
        <div class="action">
            <a href="<?php echo url_for('/staff/bicycles/new.php' . '?page=' . h(u($current_page))); ?>">Add Bicycle</a>
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
                            <td><a href="<?php echo url_for('/staff/bicycles/show.php?id=' . h(u($bike->id))) . '&page=' . h(u($current_page));  ?>">View</a> </td>
                            <td><a href="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($bike->id))) . '&page=' . h(u($current_page));  ?>">Edit</a> </td>
                            <td><a href="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($bike->id))) . '&page=' . h(u($current_page));  ?>">Delete</a> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
                $url = url_for('/staff/bicycles/index.php');
                echo $pagination->page_links($url);
                ?>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>