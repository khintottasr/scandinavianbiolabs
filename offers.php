<?php
$api_key = '38109|xCWqdYWb0ukY5V0knSRcuEJEPiqO1i8wVssqRU2Z4e4d1794';
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];

$url = "https://applocked.org/api/v2?ip=" . urlencode($ip) . "&user_agent=" . urlencode($ua);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $api_key]
]);
$res = json_decode(curl_exec($ch));
$offers = ($res && $res->success) ? $res->offers : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { background: #0b2e26; font-family: sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .modal { background: white; padding: 30px; border-radius: 20px; width: 90%; max-width: 450px; text-align: center; }
        .offer-item { display: flex; align-items: center; padding: 12px; border: 1px solid #eee; border-radius: 12px; margin-bottom: 10px; text-decoration: none; transition: 0.2s; }
        .offer-item:hover { border-color: #10b981; background: #f9f9f9; }
        .offer-img { width: 50px; height: 50px; border-radius: 10px; margin-right: 15px; }
        .offer-name { flex: 1; text-align: left; color: #333; font-weight: bold; font-size: 14px; }
        .btn { background: #10b981; color: white; padding: 6px 12px; border-radius: 50px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="modal">
        <h2 style="color:#0b2e26; margin:0;">Verification</h2>
        <p style="color:#666; font-size:14px;">Complete one task to unlock your package.</p>
        <?php foreach(array_slice($offers, 0, 5) as $offer): ?>
            <a href="<?= $offer->link ?>" class="offer-item">
                <img src="<?= $offer->picture ?>" class="offer-img">
                <div class="offer-name"><?= $offer->name_short ?></div>
                <div class="btn">FREE</div>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>
