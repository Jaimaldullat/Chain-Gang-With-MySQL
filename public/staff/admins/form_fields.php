<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($admin)) {
    redirect_to(url_for('/staff/admins/index.php'));
}
?>

<div class="form-control">
    <label for="admin[first_name]">First Name:</label>
    <input type="text" name="admin[first_name]" value="<?php echo h($admin->first_name); ?>" /></div>
<div class="form-control">
    <label for="admin[last_name]">Last Name:</label>
    <input type="text" name="admin[last_name]" value="<?php echo h($admin->last_name); ?>" /></div>

<div class="form-control">
    <label for="admin[email]">Email:</label>
    <input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>">
</div>
<div class="form-control">
    <label for="admin[username]">Username:</label>
    <input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>">
</div>
<div class="form-control">
    <label for="admin[password]">Password:</label>
    <input type="password" name="admin[password]" value="">
</div>
<div class="form-control">
    <label for="admin[confirm_password]">Confirm Password:</label>
    <input type="password" name="admin[confirm_password]" value="">
</div>