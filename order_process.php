<?php
session_start();

// ૧. ડેટાબેઝ કનેક્શન (Port: 3307)
$conn = mysqli_connect("localhost:3306", "root", "", "brew_haven");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['place_order'])) {
    // ફોર્મમાંથી ડેટા મેળવવો - એરર રોકવા માટે isset વાપર્યું છે
    $customer_name = isset($_POST['full_name']) ? mysqli_real_escape_string($conn, $_POST['full_name']) : "Guest";
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : "";
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : "";
    $total_amount = isset($_POST['final_amount_val']) ? mysqli_real_escape_string($conn, $_POST['final_amount_val']) : 0;
    $status = "Pending";

    // ૨. કઈ આઈટમ્સ ઓર્ડર કરી છે તેનું લિસ્ટ
    $items_array = [];
    $coffees = ['qty_espresso' => 'Espresso', 'qty_cappuccino' => 'Cappuccino', 'qty_latte' => 'Latte', 'qty_coldcoffee' => 'Cold Coffee', 'qty_mocha' => 'Mocha', 'qty_americano' => 'Americano'];

    foreach ($coffees as $key => $name) {
        if (isset($_POST[$key]) && $_POST[$key] > 0) {
            $items_array[] = "$name (" . $_POST[$key] . ")";
        }
    }
    $items_string = implode(", ", $items_array);

    // ૩. ડેટાબેઝમાં એન્ટ્રી
    $sql = "INSERT INTO orders (customer_name, phone, address, items, total_amount, status) 
            VALUES ('$customer_name', '$phone', '$address', '$items_string', '$total_amount', '$status')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        // અહીંથી HTML શરૂ થાય છે, જેથી તમે આ જ પેજ પર રહેશો
?>
        <!DOCTYPE html>
        <html lang="gu">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Order Confirmed | Brew Haven</title>
            <style>
                body { font-family: 'Segoe UI', sans-serif; background: #fdfaf8; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
                .card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; border-top: 10px solid #27a776; width: 450px; }
                .success-icon { font-size: 50px; color: #27a776; margin-bottom: 15px; }
                h2 { color: #3e2723; margin-bottom: 20px; }
                .details-box { text-align: left; background: #f9f9f9; padding: 20px; border-radius: 12px; margin-bottom: 25px; }
                .row { display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
                .label { font-weight: bold; color: #795548; }
                .btn { display: inline-block; background: #795548; color: white; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: bold; transition: 0.3s; }
                .btn:hover { background: #3e2723; transform: scale(1.05); }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="success-icon">✔</div>
                <h2>Order Confirmed! ☕</h2>
                <div class="details-box">
                    <div class="row"><span class="label">Order Id:</span> <span>#<?php echo $last_id; ?></span></div>
                    <div class="row"><span class="label">Customer:</span> <span><?php echo $customer_name; ?></span></div>
                    <div class="row"><span class="label">Items:</span> <span style="font-size: 13px;"><?php echo $items_string; ?></span></div>
                    <div class="row"><span class="label">Amount:</span> <b>₹<?php echo $total_amount; ?></b></div>
                    <div class="row"><span class="label">Status:</span> <span style="color: orange;"><?php echo $status; ?></span></div>
                </div>
                <a href="index.php" class="btn">Back to Menu</a>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "<div style='color:red; text-align:center; margin-top:50px;'>Error: " . mysqli_error($conn) . "</div>";
    }
} else {
    header("Location: index.php"); // જો કોઈ સીધું પેજ ખોલે તો
    exit();
}
?>