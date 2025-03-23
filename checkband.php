<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];

    $url = "https://ff.garena.com/api/antihack/check_banned?lang=en&uid=$uid";

    $headers = [
        'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
        'Accept: application/json, text/plain, */*',
        'Authority: ff.garena.com',
        'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8',
        'Referer: https://ff.garena.com/en/support/',
        'Sec-CH-UA: "Not_A Brand";v="8", "Chromium";v="120"',
        'Sec-CH-UA-Mobile: ?1',
        'Sec-CH-UA-Platform: "Android"',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'X-Requested-With: B6FksShzIgjfrYImLpTsadjS86sddhFH',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);

    if ($response === false) {
        echo json_encode(["error" => "Server Error"]);
        http_response_code(500);
    } else {
        echo $response;
    }

    curl_close($ch);
} else {
    echo json_encode(["error" => "Error UID"]);
    http_response_code(400);
}
?>
