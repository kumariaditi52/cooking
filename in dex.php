<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data to Cookies</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background for contrast */
        }

        form {
            max-width: 400px;
            width: 100%; /* Full width on smaller screens */
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .success-message {
            color: green;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
// Initialize a variable to display success message
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contact = $_POST["contact"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $address = $_POST["address"];

    // Set cookies (valid for 7 days)
    setcookie("name", $name, time() + (7 * 24 * 60 * 60), "/");
    setcookie("email", $email, time() + (7 * 24 * 60 * 60), "/");
    setcookie("password", $password, time() + (7 * 24 * 60 * 60), "/");
    setcookie("contact", $contact, time() + (7 * 24 * 60 * 60), "/");
    setcookie("gender", $gender, time() + (7 * 24 * 60 * 60), "/");
    setcookie("city", $city, time() + (7 * 24 * 60 * 60), "/");
    setcookie("state", $state, time() + (7 * 24 * 60 * 60), "/");
    setcookie("address", $address, time() + (7 * 24 * 60 * 60), "/");

    // Display success message
    $successMessage = "Form data has been saved to cookies!";
}
?>

<!-- Form for input -->
<form method="POST" id="dataForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="contact">Contact No:</label>
    <input type="tel" id="contact" name="contact" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" required>

    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea>

    <button type="submit">Submit</button>
</form>

<!-- Success message -->
<?php if ($successMessage) { ?>
    <p class="success-message"><?php echo $successMessage; ?></p>
<?php } ?>

<script>
    // If the form is submitted and there is a success message, clear the form fields
    document.addEventListener("DOMContentLoaded", function() {
        let successMessage = "<?php echo $successMessage; ?>";
        if (successMessage) {
            document.getElementById("dataForm").reset(); // Clear the form fields
        }
    });
</script>

</body>
</html>
