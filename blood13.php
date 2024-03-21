<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $last_donation_date = $_POST['last_donation_date'];

    // You can perform additional validation here

    // Assuming you want to store the data in a database, you can establish a database connection here
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
    $conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO blood_donors (name, email, blood_group, contact, city, last_donation_date) VALUES ('$name', '$email', '$blood_group', '$contact', '$city', '$last_donation_date')";
    if ($conn->query($sql) === TRUE) {
        $success_message = "Registration successfully done.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Donation Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h2 {
    text-align: center;
    color: #333;
  }
  label {
    display: block;
    margin-bottom: 5px;
    color: #666;
  }
  input[type="text"],
  input[type="email"],
  select,
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    width: 100%;
    background-color: #4caf50;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .success-message {
    color: red;
    text-align: center;
    margin-top: 20px;
  }
</style>
</head>
<body>

<h2>Blood Donation Form</h2>

<form id="donationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">Full Name:</label>
  <input type="text" id="name" name="name" required>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <label for="blood_group">Blood Group:</label>
  <select id="blood_group" name="blood_group" required>
    <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>
  <label for="contact">Contact Number:</label>
  <input type="text" id="contact" name="contact" required>
  <label for="city">City:</label>
  <input type="text" id="city" name="city" required>
  <label for="last_donation_date">Last Donation Date:</label>
  <input type="date" id="last_donation_date" name="last_donation_date" required>
  <input type="submit" value="Submit">
</form>

<?php
if(isset($success_message)) {
    echo '<div class="success-message" id="successMessage">' . $success_message . '</div>';
}
?>

</body>
</html> 
