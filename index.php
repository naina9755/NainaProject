<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Get form data from POST
   @ $name = $_POST['name'];
    echo "Full name: $name <br>";

   @ $mobno = $_POST["mobno"];
   echo "Mobile No: $mobno <br>";

   @ $email = $_POST["email"];
   echo "Email ID: $email <br>";

   @ $department = $_POST["department"];
   echo "Department: $department <br>";

   @ $complaint = $_POST["complaint"];
   echo "Your complaint: $complaint <br>";

$conn = new mysqli('localhost','root','','minorproject');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into complaint (Full_Name, Mobile_No, Email_ID, Department, Your_Complaint) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name,$mobno,$email,$department, $complaint);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();

}

?>

</body>
</html