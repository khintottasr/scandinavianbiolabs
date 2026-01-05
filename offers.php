<?php
// OGAds API Key (Ila bghiti t-kheddem bih later)
$api_key = '38109|xCWqdYWb0ukY5V0knSRcuEJEPiqO1i8wVssqRU2Z4e4d1794';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Reward</title>
    <style>
        body { margin: 0; padding: 0; background: #0b2e26; font-family: 'Arial', sans-serif; height: 100vh; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        
        .overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(11, 46, 38, 0.98); backdrop-filter: blur(15px); display: flex; align-items: center; justify-content: center; z-index: 9999; }
        
        .modal-box { 
            background: white; width: 95%; max-width: 500px; border-radius: 30px; padding: 40px 20px; 
            text-align: center; box-shadow: 0 40px 100px rgba(0,0,0,0.5); position: relative;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }

        h2 { color: #0b2e26; font-size: 24px; font-weight: 900; margin: 0; text-transform: uppercase; }
        p { color: #666; font-size: 14px; margin: 10px 0 30px; }

        /* Step 1: Products Grid */
        .p-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 20px; }
        .p-item { 
            cursor: pointer; border: 2px solid #f2f2f2; border-radius: 20px; padding: 15px; 
            transition: 0.3s; background: #fafafa; display: flex; flex-direction: column; align-items: center;
        }
        .p-item:hover { border-color: #10b981; transform: translateY(-5px); }
        .p-item img { width: 100%; max-height: 100px; object-fit: contain; margin-bottom: 10px; }
        .p-item h4 { font-size: 13px; color: #0b2e26; margin: 0; }
        .badge { background: #10b981; color: white; font-size: 10px; padding: 4px 10px; border-radius: 50px; margin-top: 8px; font-weight: bold; }

        /* Step 2: Locker Container */
        #locker-view { display: none; width: 100%; min-height: 300px; }
        
        /* Loading Spinner */
        .loader { border: 4px solid #f3f3f3; border-top: 4px solid #10b981; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin: 20px auto; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>

    <script type="text/javascript" src="https://www.locked4.com/cp/js/v9xxxx"></script>
</head>
<body>

<div class="overlay">
    <div class="modal-box">
        <div id="modal-header">
            <h2 id="main-title">Select Your Reward</h2>
            <p id="main-desc">Choose a routine to unlock with your 100% Discount Coupon.</p>
        </div>

        <div id="selection-view" class="p-grid">
            <div class="p-item" onclick="startLocker('Hair Recovery Men')">
                <img src="https://scandinavianbiolabs.com/cdn/shop/files/90328d3c7b4b5755e19bbf381e4dcb284dae8e0a.jpg?v=1760959842&width=600">
                <h4>Men's Routine</h4>
                <span class="badge">100% OFF</span>
            </div>
            <div class="p-item" onclick="startLocker('Hair Recovery Women')">
                <img src="https://scandinavianbiolabs.com/cdn/shop/files/source_image.jpg?v=1760959842&width=600">
                <h4>Women's Routine</h4>
                <span class="badge">100% OFF</span>
            </div>
        </div>

        <div id="locker-view">
            <div class="loader"></div>
            <p>Loading Verification Tasks...</p>
            <div id="og_player_container"></div> </div>

        <div style="margin-top: 30px; font-size: 11px; color: #ccc;">
            Secured Verification System &copy; 2026
        </div>
    </div>
</div>

<script>
    function startLocker(productName) {
        // 1. UI Switch
        document.getElementById('selection-view').style.display = 'none';
        document.getElementById('locker-view').style.display = 'block';
        
        // 2. Beddel Title
        document.getElementById('main-title').innerText = "Final Step";
        document.getElementById('main-desc').innerText = "Complete one task below to unlock your " + productName + ".";

        // 3. Trigger OGAds Locker
        if (typeof og_load === 'function') {
            og_load(); 
        } else {
            // Backup redirect ila t-blocka l-JS
            console.log("OGAds logic triggered for: " + productName);
        }
    }
</script>

</body>
</html>
