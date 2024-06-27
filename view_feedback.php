<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Retrieval</title>
    <style>
    body
    {
        background-image: url(back4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    #output{
        border-collapse: collapse;
    }
    #output tr{
        font-size: 16.5px;
    }
</style>
</head>
<body>
    
</body>
</html>
<?php
// Create a new MySQLi connection to the database
//parameters are (host, username, password, database)
$con = new mysqli("localhost", "root", "", "campaign_feedback");

//check if connection was successful
if($con -> connect_error)
{
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL query to retrieve data from the feedback table
$sql = "SELECT * FROM feedback";

// Execute the SQL query
$result = $con->query($sql);

if($result->num_rows > 0){
    echo "<table border='1' id='output' cellpadding='8' >
    <tr align='center'>
    <th><font color='red'>Id</font></th>
    <th><font color='red'>Name</font></th>
    <th><font color='red'>Email</font></th>
    <th><font color='red'>Feedback</font></th>
    <th><font color='red'>Rating</font></th>
    <th><font color='red'>Submission Date</font></th>
    </tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr align='center'>
        <td ><font color='#993300'><b>".$row["id"]."</b></font></td>
        <td ><font color='#993300'><b>".$row["name"]."</b></font></td>
        <td><font color='#993300'><b>" .$row["email"]. "</b></font></td>
        <td><font color='#993300'><b>" .$row["feedback"]. "</b></font></td>
        <td><font color='#993300'><b>" .$row["rating"]. "</b></font></td>
        <td><font color='#993300'><b>" .$row["submission_date"]. "</b></font></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$con->close();


?>