<?php 
 
function is_logged_in(){
    if (isset($_SESSION['user_id'])){
        return true;
    }
    return false;
}

function get_user_id(){
    if (is_logged_in()) {
        return $_SESSION['user_id'];
    }
    return 0;
}
?>