<?php
$product = isset($_GET['product']) ? $_GET['product'] : 'Package';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification - Scandinavian Biolabs</title>
    <style>
        body { margin: 0; background: #0b2e26; font-family: sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .funnel-container { background: white; width: 95%; max-width: 450px; border-radius: 25px; padding: 35px 20px; text-align: center; box-shadow: 0 30px 60px rgba(0,0,0,0.5); }
        h2 { color: #0b2e26; font-size: 22px; margin: 0; text-transform: uppercase; font-weight: 900; }
        p { color: #666; font-size: 14px; margin: 10px 0 25px; }
        #og_locker_ui { min-height: 300px; background: #f9f9f9; border-radius: 15px; border: 1px dashed #ccc; display: flex; align-items: center; justify-content: center; }
    </style>
    <script type="text/javascript" src="https://www.locked4.com/cp/js/v9xxxx"></script>
</head>
<body>

<div class="funnel-container">
    <h2>Verification Step</h2>
    <p>Complete one task below to unlock your <b><?php echo htmlspecialchars($product); ?></b> routine.</p>
    
    <div id="og_locker_ui">
        <script>
            if (typeof og_load === 'function') {
                og_load(); 
            }
        </script>
    </div>

    <div style="margin-top: 25px; font-size: 11px; color: #aaa;">
        <span style="color: #10b981;">●</span> Secured by OGAds Verification System
    </div>
</div>

</body>
</html>
