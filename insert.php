<?php  
// Connect to SQLite database   
$db = new SQLite3('Vincent.db');  
  
// Prepare the SQL query with placeholders for the data   
$query = "INSERT INTO users (name, email, message) VALUES (:name, :email, :message)";  
$stmt = $db->prepare($query);  
  
// Get the submitted data from the form. Assuming your form fields are now named 'name', 'email', and 'message'.  
$name = $_POST['name'];  
$email = $_POST['email'];  
$message = $_POST['message'];  
  
// Bind the parameters to the placeholders in the query   
$stmt->bindParam(':name', $name);  
$stmt->bindParam(':email', $email);  
$stmt->bindParam(':message', $message);  
  
// Execute the query and insert the data into the database   
if ($stmt->execute()) {  
    echo " <a href='Contact Us.html'>back to contact</a>";  
} else {  
    echo "Error: " . $stmt->errorMessage(); // Note: SQLite3 class does not have an 'error' property, use 'errorMessage()' instead  
}  
  
// Close the database connection   
$db->close();