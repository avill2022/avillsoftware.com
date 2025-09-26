<?php
header("Access-Control-Allow-Origin: *");
// Set the content type to JSON
header('Content-Type: application/json');

// Allow POST only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Only POST method is allowed']);
    exit;
}
$UPDATE_KEY = "431523678";
$json = '';


// Check if both parameters are set in the URL
if (isset($_GET['key']) && isset($_GET['user'])) {
    $key = htmlspecialchars($_GET['key']);
    $user = htmlspecialchars($_GET['user']);

    if($key == $UPDATE_KEY && $user == 'avill.ladv.literaturestudyguide'){
        // Output as JSON
        echo json_encode([
            "status" => 0,
            "data" => "[]",
            "message" => $UPDATE_KEY
        ]);
    }else{
        if($key != "" && $key !=$UPDATE_KEY  && $user == 'avill.ladv.literaturestudyguide'){
            // Output as JSON
            echo json_encode([
                "status" => 0,
                "data" => $json,
                "message" => $UPDATE_KEY
            ]);
        }else{
            // If parameters are missing
            echo json_encode([
                "status" => 1,
                "data" => "",
                "message" => "not allowed"
            ]);
        } 
    }
        
    
} else {
    // If parameters are missing
    echo json_encode([
        "status" => 1,
        "data" => "",
        "message" => "Missing data"
    ]);
}

