<?php
// $dbHost     = 'localhost';
// $dbUsername = 'root';
// $dbPassword = '';
// $dbName     = 'db_masjid';
require "application/config/database.php";
// Database configuration
$host = $dbhelper['hostname2'];
$username = $dbhelper['username2'];
$password = $dbhelper['password2'];
$database_name = $dbhelper['database2'];

if (!empty($_FILES)) {
    // Validating SQL file type by extensions
    if (!in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $restore = restoreDatabaseTables($host, $username, $password, $database_name, $_FILES["backup_file"]["name"]);
            if ($restore) {
                
            }
        }
    }
}

function restoreDatabaseTables($host, $username, $password, $database_name, $filePath)
{
    // Connect & select the database
    $db = new mysqli($host, $username, $password, $database_name);

    // Temporary variable, used to store current query
    $templine = '';

    // Read in entire file
    $lines = file($filePath);

    $error = '';

    // Loop through each line
    foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '') {
            continue;
        }

        // Add this line to the current segment
        $templine .= $line;

        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            if (!$db->query($templine)) {
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }

            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error) ? $error : true;
}?>
<?php
if (!empty($response)) {
?>
    <div class="response <?php echo $response["type"]; ?>">
        <?php echo nl2br($response["message"]); ?>
    </div>
<?php
}?>