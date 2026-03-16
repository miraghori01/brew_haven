<?php
// પોર્ટ 3306 ખાસ રાખવો કારણ કે તમારું MySQL ત્યાં ચાલે છે
$conn = mysqli_connect("localhost", "root", "", "brew_haven", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>