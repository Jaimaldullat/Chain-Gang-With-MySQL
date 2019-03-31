<?php

// Display errors
function display_errors($errors = []){
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

// Store session value into variable and clear session for next use
function get_and_clear_session_message(){
    $msg = '';
    if(isset($_SESSION['message']) && $_SESSION['message']!=''){
        $msg = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    return $msg;
}

// Display session message
function display_session_message(){
    $msg = get_and_clear_session_message();
    if($msg != ''){
        return '<div id="message">' . h($msg) . '</div>';
    }
}
?>