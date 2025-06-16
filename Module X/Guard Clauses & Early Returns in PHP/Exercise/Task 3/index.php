<?php

/**
 * 
 * Qwen's
 * 
 */

function bookFlight($user, $flight) {
    // Guard Clause 1: Check if user is logged in
    if (!$user['isLoggedIn']) {
        echo "Error: You must be logged in to book a flight.\n";
        return;
    }

    // Guard Clause 2: Check if flight exists
    if (!isset($flight['id']) || empty($flight['name'])) {
        echo "Error: Flight does not exist.\n";
        return;
    }

    // Guard Clause 3: Check if there are available seats
    if (!isset($flight['seatsAvailable']) || $flight['seatsAvailable'] <= 0) {
        echo "Error: No seats available on this flight.\n";
        return;
    }

    // If all checks passed:
    echo "✅ Booking confirmed for {$user['name']} on {$flight['name']}!\n";
}
$user = [
    'name' => 'Ammad',
    'isLoggedIn' => true,
];

$flight = [
    'id' => 1,
    'name' => 'Kukuruyuk Airline',
    'seatsAvailable' => 2,
];

// Try different scenarios
bookFlight(['isLoggedIn' => false], $flight); // Not logged in
bookFlight($user, ['id' => 99]); // Invalid flight
bookFlight($user, ['id' => 2, 'name' => 'Full Flight', 'seatsAvailable' => 0]); // No seats
bookFlight($user, $flight); // Success!




/**
 * 
 * Dirty arrogance me
 * 
 */
// $flights = [
//     ["flight_id" => 1,"flight_name" => "Kukuruyuk Airline","status" => "available","seats" =>  
//                 ["id" => 1, "status" => "available"],
//                 ["id" => 2, "status" => "booked"],
//                 ["id" => 3, "status" => "booked"],
//                 ["id" => 4, "status" => "booked"],],
//     ["flight_id" => 2,"flight_name" => "Jengger Airline","status" => "available","seats" =>  ["id" => 1, "status" => "booked"],
//                 ["id" => 2, "status" => "booked"],
//                 ["id" => 3, "status" => "booked"],
//                 ["id" => 4, "status" => "booked"],],
//     ["flight_id" => 3,"flight_name" => "Petok Airline","status" => "not available","seats" =>  0],
// ];


// function checkFlight($flightName, $flights){
//     foreach($flights as $flight){
//         if($flight["flight_name"] == $flightName) {
//             if($flight["status"] != "available"){
//                 echo "The flight is not available!";
//                 return false;
//             };
//             return true;
//         };
//     }
// }

// function checkFlightSeat($flightName, $flights){
//     foreach($flights as $flight){
//         if($flight["flight_name"] == $flightName) {
//             $available = 0;
//             if(!is_array($flight["seats"]) || !isset($flight["seats"]) ){
//                 echo "No seat are left available for this flight!";
//                 return false;
//            }
//            foreach($flight["seats"] as $seat){
//                 if (!is_array($seat) || !isset($seat["status"])) {
//                 continue; // Skip invalid seat entries
//             }
//                 if ($seat["status"] == "available") {$available++;}
//            }
//            if($available == 0){
//             echo "No seat  are left available for this flight!";
//             return false;
//            }
//         echo "There are $available seat(s) left available for this flight!";
//         return true;
//         }
//     }
// }


// function bookFlight($user, $flightName, $flights) {
//     // if(!$user-->$_SESSION['loggedin']){
//     //     echo "$user not log in";
//     //     return;
//     // }
//     if(!checkFlight($flightName,$flights)) {
//         return;
//     }
//     if(!checkFlightSeat($flightName,$flights)) {
//         return;
//     }
//     echo "Booking Confirmed!";
// }

// bookFlight("Kucing","Kukuruyuk Airline",$flights);

?>