<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "root", "hall_iiitdm", 3307);

// Check the connection
if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$StudentName = $_REQUEST['name'];
$ClubName = $_REQUEST['clubname'];
$ContactNo = $_REQUEST['contactno'];
$RollNo = $_REQUEST['rollno'];
$Email = $_REQUEST['email'];
$EventType = $_REQUEST['event'];
$ACrequirement = $_REQUEST['ac'];
$Capacity = $_REQUEST['capacity'];
$Date = $_REQUEST['date'];
$TimeStart = $_REQUEST['timestart'];
$TimeEnd = $_REQUEST['timeclose'];

// SQL query to find an available hall
$sql5 = "SELECT hall.HallNo
FROM club_event AS event, hall AS hall
WHERE hall.HallCapacity >= $Capacity
AND hall.ACavailability = '$ACrequirement'
AND hall.HallNo NOT IN (SELECT HallNo FROM occuppied WHERE ('occuppied.date'='event.date' AND 'occuppied.TimeStart'>= 'event.TimeEnd ') OR ('occuppied.date'!='event.date'AND 'occuppied.TimeStart'>= 'event.TimeEnd 'or 'occuppied.TimeStart'<= 'event.TimeEnd ' ))
LIMIT 1 ";

$result = $conn->query($sql5);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $availableHallNo = $row['HallNo'];
        echo '<h1> Alloted Hall ' . $availableHallNo . ' HUURAH! BOOKING CONFIRMED</h1>';
        $sql3 = "INSERT INTO occuppied (HallNo, TimeStart, TimeEnd, Date, Eventid)
        VALUES ('$availableHallNo', '$TimeStart', '$TimeEnd', '$Date', LAST_INSERT_ID())";
    } else {
        echo '<h1> REGRET! No available halls</h1>';
    }
} else {
    echo "ERROR: " . mysqli_error($conn);
}

// Insert student and event details
$sql = "INSERT INTO club_head (StudentName, ClubName, ContactNo, RollNo, Email)
        VALUES ('$StudentName', '$ClubName', '$ContactNo', '$RollNo', '$Email')";

$sql2 = "INSERT INTO club_event (EventType, ACrequirement, Capacity, Date, TimeStart, TimeEnd)
         VALUES ('$EventType', '$ACrequirement', '$Capacity', '$Date', '$TimeStart', '$TimeEnd')";

// Insert occupied hall
//$sql3 = "INSERT INTO occuppied (HallNo, TimeStart, TimeEnd, Date, Eventid)
       // VALUES ('$availableHallNo', '$TimeStart', '$TimeEnd', '$Date', LAST_INSERT_ID())";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) ) {
    echo "<h3>THANK YOU FOR VISITING </h3>";
} else {
    echo "ERROR: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
</body>
</html>
