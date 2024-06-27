<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission</title>
    <style>
    body
    {
        background-image: url(back4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<body>
</body>
</html>

<?php
// Retrieve POST data from the form submission
$iname = $_POST['iname'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

// Create a new MySQLi connection to the database
//parameters are (host, username, password, database)
$con = new mysqli("localhost", "root", "", "campaign_feedback");

//check if connection was successful
if($con -> connect_error)
{
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL query to insert the data into the feedback table
$sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES ('$iname', '$email', '$feedback', '$rating')";

// Execute the SQL query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    // If the query was successful, output a JavaScript alert and redirect to feedback_form.php
    echo "<script>
            alert('Record successfully added');
            window.location.href = 'feedback_form.php';
          </script>";
} else {
    // If there was an error with the query, print the error
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();

?>