<?php 
$role = "admin";

$access = match ($role) {
     "admin" => "Full access granted.",
     "editor" => "Limited editing access.",
     default => "No access.",
};

echo $access;

/**
 * Match is better than switch-case
 * it's because more readable
 * no need for break
 */
?>