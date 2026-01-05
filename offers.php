<?php
// 1. OGAds API Configuration
$api_key = '38109|xCWqdYWb0ukY5V0knSRcuEJEPiqO1i8wVssqRU2Z4e4d1794';
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];

// Call API (ctype=0 for all offers)
$url = "https://applocked.org/api/v2?ip=" . urlencode($ip) . "&user_agent=" . urlencode($ua) . "&ctype=0";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ["Authorization: Bearer " . $api_key]
]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response);
$offers = ($data && $data->success) ? $data->offers : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Reward</title>
    <style>
        body { font-family: Arial, sans-serif; background: #0b2e26; margin: 0; padding: 20px; color: #333; display: flex; justify-content: center; }
        .container { background: white; width: 100%; max-width: 500px; border-radius: 20px; padding: 25px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        h2 { color: #0b2e26; text-transform: uppercase; font-size: 22px; margin-bottom: 5px; }
        p { color: #666; font-size: 14px; margin-bottom: 25px; }
        .offer-card { display: flex; align-items: center; background: #f9f9f9; border: 1px solid #eee; border-radius: 15px; padding: 12px; margin-bottom: 15px; cursor: pointer; transition: 0.2s; }
        .offer-card:hover { border-color: #10b981; transform: translateY(-2px); }
        .offer-img { width: 60px; height: 60px; border-radius: 12px; margin-right: 15px; object-fit: cover; }
        .offer-info { flex: 1; text-align: left; }
        .offer-name { margin: 0; font-size: 15px; font-weight: bold; color: #111; }
        .offer-desc { margin: 3px 0; font-size: 12px; color: #777; line-height: 1.3; }
        .btn-get { background: #10b981; color: white; padding: 8px 15px; border-radius: 50px; font-weight: bold; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Your Reward</h2>
        <p>Complete one task below to unlock your package for free.</p>

        <div class="offers-list">
            <?php if(!empty($offers)): ?>
                <?php foreach(array_slice($offers, 0, 6) as $offer): ?>
                    <div class="offer-card" onclick="window.location.href='<?php echo $offer->link; ?>'">
                        <img src="<?php echo $offer->picture; ?>" class="offer-img">
                        <div class="offer-info">
                            <h4 class="offer-name"><?php echo $offer->name_short; ?></h4>
                            <p class="offer-desc"><?php echo $offer->adcopy; ?></p>
                        </div>
                        <div class="btn-get">GET</div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No rewards available for your region at this moment.</p>
            <?php endif; ?>
        </div>
        
        <div style="font-size: 10px; color: #ccc; margin-top: 20px;">* Secured Verification System</div>
    </div>
</body>
</html>