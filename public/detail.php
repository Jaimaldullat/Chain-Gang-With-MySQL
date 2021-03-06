<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID
$id = $_GET['id'] ?? false;

if(!$id) {
redirect_to("bicycles.php");
}
  // Find bicycle using ID
$bike = Bicycle::find_by_id($id);
if(!$bike) {
    redirect_to("bicycles.php");
}

?>

<?php $page_title = 'Detail: '. $bike->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main id="detail-main">

  <a href="bicycles.php">Back to Inventory</a>

  <section id="detail-section">

    <ul class="detail">
      <li>
        <div>Brand</div>
        <div><?php echo h($bike->brand); ?></div>
      </li>
      <li>
        <div>Model</div>
        <div><?php echo h($bike->model); ?></div>
      </li>
      <li>
        <div>Year</div>
        <div><?php echo h($bike->year); ?></div>
      </li>
      <li>
        <div>Category</div>
        <div><?php echo h($bike->category); ?></div>
      </li>
      <li>
        <div>Gender</div>
        <div><?php echo h($bike->gender); ?></div>
      </li>
      <li>
        <div>Color</div>
        <div><?php echo h($bike->color); ?></div>
      </li>
      <li>
        <div>Weight</div>
        <div><?php echo h($bike->weight_kg()) . ' / ' . h($bike->weight_lbs()); ?></div>
      </li>
      <li>
        <div>Condition</div>
        <div><?php echo h($bike->condition()); ?></div>
      </li>
      <li>
        <div>Price</div>
        <div><?php echo h($bike->price); ?></div>
      </li>
      <li>
        <div>Description</div>
        <div><?php echo h($bike->description); ?></div>
      </li>
    </ul>

  </section>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
