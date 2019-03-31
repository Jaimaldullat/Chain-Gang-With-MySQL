<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bicycle)) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}
?>

<div class="form-control">
    <label for="bicycle[brand]">Brand:</label>
    <input type="text" name="bicycle[brand]" value="<?php echo h($bicycle->brand); ?>" /></div>
<div class="form-control">
    <label for="bicycle[model]">Model:</label>
    <input type="text" name="bicycle[model]" value="<?php echo h($bicycle->model); ?>" /></div>
<div class="form-control">
    <label for="bicycle[year]">Year:</label>
    <select name="bicycle[year]">
        <option value="">Select Year</option>
        <?php $this_year = idate('Y') ?>
        <?php for($year=$this_year-20; $year <= $this_year; $year++) { ?>
            <option value="<?php echo $year; ?>" <?php if($bicycle->year == $year) { echo 'selected'; } ?>><?php echo $year; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-control">
    <label for="bicycle[category]">Category:</label>
    <select name="bicycle[category]">
        <option value="">Select Category</option>
        <?php foreach(Bicycle::CATEGORIES as $category) { ?>
            <option value="<?php echo $category; ?>" <?php if($bicycle->category == $category) { echo 'selected'; } ?>><?php echo $category; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-control">
    <label for="bicycle[gender]">Gender:</label>
    <select name="bicycle[gender]">
        <option value="">Select Gender</option>
        <?php foreach (Bicycle::GENDERS as $gender) { ?>
        <option value="<?php echo $gender; ?>" <?php if($bicycle->gender == $gender) { echo "Selected"; } ?> ><?php echo $gender; ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-control">
    <label for="bicycle[color]">Color:</label>
    <input type="text" name="bicycle[color]" value="<?php echo h($bicycle->color); ?>">
</div>
<div class="form-control">
    <label for="bicycle[condition_id]">Condition:</label>
    <select name="bicycle[condition_id]">
        <option value="">Select Condition</option>
        <?php foreach (Bicycle::CONDITION_OPTIONS as $cond_id=>$cond_value)  {?>

            <option value="<?php echo $cond_id; ?>" <?php if($bicycle->condition_id == $cond_id) { echo "Selected"; } ?> ><?php echo $cond_value; ?></option>

        <?php } ?>
    </select>
</div>
<div class="form-control">
    <label for="bicycle[weight_kg]">Weight ( Kg ):</label>
    <input type="text" class="weight" name="bicycle[weight_kg]" value="<?php echo h($bicycle->weight_kg); ?>">
</div>
<div class="form-control div-price">
    <label for="bicycle[price]">Price ( $ ):</label>
    <input type="text" class="price" name="bicycle[price]" value="<?php echo h($bicycle->price); ?>">
</div>
<div class="form-control">
    <label for="bicycle[description]">Description:</label>
    <textarea name="bicycle[description]" id="" cols="30" rows="10"><?php echo h($bicycle->description); ?></textarea>
</div>