<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conference Registration</title>
</head>
<body>
<h2>Conference Registration Form</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="contact_number">Contact Number:</label>
    <input type="tel" id="contact_number" name="contact_number" pattern="[0-9]{10}" required><br><br>
    
    <label for="food_preference">Food Preference:</label>
    <select id="food_preference" name="food_preference" required>
        <option value="vegetarian">Vegetarian</option>
        <option value="non-vegetarian">Non-Vegetarian</option>
    </select><br><br>
    
    <label for="dates">Dates for Participation:</label><br>
    <input type="checkbox" id="day1" name="dates[]" value="7th May"> <label for="day1">7th May</label><br>
    <input type="checkbox" id="day2" name="dates[]" value="8th May"> <label for="day2">8th May</label><br>
    <input type="checkbox" id="day3" name="dates[]" value="9th May"> <label for="day3">9th May</label><br>
    <input type="checkbox" id="day4" name="dates[]" value="10th May"> <label for="day4">10th May</label><br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $food_preference = $_POST["food_preference"];
    $dates = $_POST["dates"];

    // Validate empty fields
    if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($contact_number) || empty($food_preference) || empty($dates)) {
        echo "<p>All fields are required.</p>";
        exit;
    }

    // Validate password format
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,12}$/", $password)) {
        echo "<p>Password must be 8-12 characters long and contain at least one uppercase letter, one lowercase letter, and one numeric digit.</p>";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Invalid email format.</p>";
        exit;
    }

    // Validate contact number format
    if (!preg_match("/^[0-9]{10}$/", $contact_number)) {
        echo "<p>Invalid contact number format.</p>";
        exit;
    }

    // If all validations pass, registration successful
    echo "<p>Registration successful!</p>";
}
?>
</body>
</html>
