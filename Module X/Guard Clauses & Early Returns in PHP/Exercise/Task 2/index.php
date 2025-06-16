<?php 

$user = "owner";
$post = "Blog A";

function deletePost($user, $post){
    if(!$user == "admin" || !$user =="owner") {
        echo "Access denied";
        return;
    }

    echo "$post deleted";
}

deletePost($user, $post);

?>