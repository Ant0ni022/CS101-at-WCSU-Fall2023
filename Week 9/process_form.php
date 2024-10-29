<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $comments = isset($_POST["comments"]) ? $_POST["comments"] : '';
    $devices = isset($_POST["devices"]) ? $_POST["devices"] : '';
    $genre = isset($_POST["genre"]) ? $_POST["genre"] : '';
    $services = isset($_POST["service"]) ? $_POST["service"] : [];

    // Create an HTML page with the submitted data
    $htmlPage = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Submitted Data</title>
    </head>
    <body>
        <h2>Submitted Data</h2>
        <p>Username: $username</p>
        <p>Password: $password</p>
        <p>Comments: $comments</p>
        <p>Devices: $devices</p>
        <p>Genre: $genre</p>";

    if (!empty($services)) {
        $htmlPage .= "<p>Services: " . implode(", ", $services) . "</p>";
    }

    $htmlPage .= "
    </body>
    </html>
    ";

    // Save the HTML page to a file (optional)
    file_put_contents("submitted_data.html", $htmlPage);

    // Output the HTML page
    echo $htmlPage;
} else {
    // Redirect users who try to access this page directly
    header("Location: index.html");
    exit();
}
?>