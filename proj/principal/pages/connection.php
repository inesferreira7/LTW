<?php
$db = new PDO("sqlite:../../database/database.db", "", "", array(PDO::MYSQL_ATTR_FOUND_ROWS => true));

function generateRandomToken() {
    return bin2hex(openssl_random_pseudo_bytes(16));
}
?>
