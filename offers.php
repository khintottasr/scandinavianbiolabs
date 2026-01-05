<?php
// 1. Config dyal OGAds
$api_key = '38109|xCWqdYWb0ukY5V0knSRcuEJEPiqO1i8wVssqRU2Z4e4d1794';
$user_ip = $_SERVER['REMOTE_ADDR']; // IP dyal l-visitur
$user_ua = $_SERVER['HTTP_USER_AGENT']; // Browser dyal l-visitur

// 2. Endpoint jdid (v2)
$endpoint = "https://applocked.org/api/v2?ip=" . urlencode($user_ip) . "&user_agent=" . urlencode($user_ua);

// 3. Request CURL m3a l-Authorization s7i7a
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL            => $endpoint,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
    CURLOPT_HTTPHEADER     => [
        "Authorization: Bearer $api_key",
        "Accept: application/json"
    ],
]);

$content = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Parse JSON
$data = json_decode($content);
$offers = ($data && isset($data->success) && $data->success) ? $data->offers : [];

// Debug (ila konti bo7dek ghadi tchoufha f source code)
echo "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Required</title>
    <style>
        body { margin: 0; background: #0b2e26; font-family: sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .modal { background: white; width: 90%; max-width: 450px; border-radius: 20px; padding: 25px; text-align: center; box-shadow: 0 15px 40px rgba(0,0,0,0.5); }
        .offer-card { display: flex; align-items: center; border: 1px solid #eee; padding: 12px; margin-bottom: 10px; border-radius: 12px; text-decoration: none; transition: 0.2s; }
        .offer-card:hover { border-color: #10b981; background: #f9f9f9; }
        .offer-img { width: 50px; height: 50px; border-radius: 10px; margin-right: 15px; object-fit: cover; }
        .offer-name { flex: 1; text-align: left; color: #333; font-weight: bold; font-size: 14px; }
        .btn { background: #10b981; color: white; padding: 6px 15px; border-radius: 50px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="modal">
        <h2 style="color:#0b2e26; margin:0 0 10px;">Select Reward</h2>
        <p style="color:#666; font-size:14px; margin-bottom:20px;">Complete one task to unlock your package.</p>

        <div class="offers-list">
            <?php if(!empty($offers)): ?>
                <?php foreach(array_slice($offers, 0, 6) as $offer): ?>
                    <a href="<?= htmlspecialchars($offer->link) ?>" target="_blank" class="offer-card">
                        <img src="<?= htmlspecialchars($offer->picture) ?>" class="offer-img">
                        <div class="offer-name"><?= htmlspecialchars($offer->name_short) ?></div>
                        <div class="btn">FREE</div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="padding: 20px; color: #999;">
                    No offers available for your device. Try refreshing or using a different browser.
                    <br><small>(Check if your API Key is active in OGAds Dashboard)</small>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
