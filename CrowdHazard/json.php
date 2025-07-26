<?php
require_once('db_connection.php');

$query = "SELECT * FROM crowdinfo ORDER BY report_timestamp DESC";
$result = mysqli_query($conn, $query);

$output = array();

foreach ($result as $row) {
    // Adjust the structure as needed
    $crowdInfo = array(
        'id' => $row['crowdinfo_id'],
        'name' => $row['name'],
        'hazard_type' => $row['hazard_type'],
        'hazard_loc' => $row['hazard_loc'],
        'hazard_desc' => $row['hazard_desc'],
        'report_timestamp' => $row['report_timestamp']
    );

    array_push($output, $crowdInfo);
}

$json = json_encode($output, JSON_PRETTY_PRINT);

header("Content-Type: application/json");
echo $json;
?>
