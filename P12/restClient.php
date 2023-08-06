<?php
    // API Endpoint 1
    $apiUrl1 = "http://localhost/PBW/P12/php12A.php";

    // Create cURL request 1
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $apiUrl1);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);

    // Execute cURL request 1
    $response1 = curl_exec($ch1);
    curl_close($ch1);

    // Output response 1
    echo $response1;
    $data1 = json_decode($response1, true);
    echo "<br/><br/>";
    var_dump($data1);

    // API Endpoint 2
    $apiUrl2 = "http://localhost/PBW/P12/php12B.php";

    // Request data
    $requestData = array(
        'slot' => 14,
        'name' => 'Thomas Shelby',
        'email' => 'thomas@shelby.co.uk'
    );

    // Create cURL request 2
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $apiUrl2);
    curl_setopt($ch2, CURLOPT_POST, TRUE);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $requestData);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);

    // Execute cURL request 2
    $response2 = curl_exec($ch2);
    curl_close($ch2);

    // Output response 2
    echo $response2;

    // API Endpoint 3
    $apiUrl = "http://localhost/PBW/P12/php12C.php";

    // Request data 3
    $requestData = array(
        'slot' => 10,
        'name' => 'Finn Shelby',
        'email' => 'finn@shelby.co.uk'
    );

    // Create cURL request 3
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    // Execute cURL request 3
    $response = curl_exec($ch);
    curl_close($ch);

    // Output response 3
    echo $response;

    // API Endpoint 4
    $apiUrl = "http://localhost/PBW/P12/php12D.php";

    // Request data 4
    $requestData = array(
        'slot' => 8
    );

    // Create cURL request 4
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    // Execute cURL request 4
    $response = curl_exec($ch);
    curl_close($ch);

    // Output response 4
    echo $response;
?>

