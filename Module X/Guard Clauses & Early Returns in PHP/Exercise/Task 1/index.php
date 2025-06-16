<?php 
function login($username, $password) {
    if(empty($username)) {
        echo "Invalid Username!\n";
        return;   
    }

    if(empty($password)) {
        echo "Invalid Password!\n";
        return; 
    }

    echo "Login Succesful\n";
}

// Simulation
// Both null
login(null, null);
// Password null
login("User", null);
// Both not null
login("User", "Password");

?>