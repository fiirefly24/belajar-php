<?php 
function checkAccess($user, $role) {
    if (!$user->isLoggedIn()) {
        echo "Not logged in.";
        return;
    }
    if (!$user->hasRole($role)){
        echo "Insufficient role.";
        return;
    }
    echo "Access granted.";
}
?>