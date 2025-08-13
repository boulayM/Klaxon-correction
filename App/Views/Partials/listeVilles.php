<?php
use App\Core\Database;
$db = Database::getInstance()->getConnection();


$sql = "SELECT id, ville FROM agences ORDER BY ville ASC";
$agences = $db->query($sql);

foreach ($agences as $agence) {
    echo '<option value="' . htmlspecialchars($agence['id']) . '">' . htmlspecialchars($agence['ville']) . '</option>';
}


?>