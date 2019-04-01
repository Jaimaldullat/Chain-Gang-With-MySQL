<?php require_once "../../private/initialize.php"; ?>
<?php

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if (is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if there were no error, try login
    if (empty($errors)) {
        $admin = Admin::find_by_username($username);

        if ($admin != false && $admin->verify_password($password)) {
            // logged in as admin
            $session->login($admin);
            redirect_to(url_for("/staff/index.php"));
        } else {
            $errors[] = "Login was unsuccessful.";
        }
    }
} else {

}

?>

<?php $page_title = "Main Menu" ?>
<?php include_once SHARED_PATH . "/staff_header.php"; ?>

    <main id="staff-main">
        <section class="section-login">
            <h2>Login</h2>
            <?php echo display_errors($errors); ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                <div class="form-control">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php // echo h($admin->username); ?>">
                </div>
                <div class="form-control">
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="">
                </div>
                <div class="form-control">
                    <input type="submit" value="Login">
                </div>

            </form>
        </section>


    </main>

<?php include_once SHARED_PATH . "/staff_footer.php"; ?>