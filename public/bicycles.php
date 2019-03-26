<?php include_once "../private/initialize.php"; ?>

<?php $page_title = "Inventory"; ?>
<?php include_once SHARED_PATH . "/public_header.php"; ?>
    <main id="inventory-main">
        <article id="inventory-article">
            <section class="intro-section">
                <div class="intro-img">
                    <img src="<?php echo url_for(u('/images/bicycle-thumb.jpeg')); ?>">
                </div>
                <div class="intro-desc">
                    <h2 class="flex-item">Our Inventory of Used Bicycles</h2>
                    <p class="flex-item">Choose the bike you love.</p>
                    <p class="flex-item">We will deliver it to your door and let you try it before you buy it.</p>
                </div>
            </section>
            <section class="inventory-section">
                <table class="inventory-table">

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
                            <td><a href="detail.php?id=<?php echo h($bike->id);  ?>">View</a> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>

<?php include_once SHARED_PATH . "/public_footer.php"; ?>