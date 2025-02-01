<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];




if (empty($name) || empty($email) || empty($message)) {
    badRequest("All fields are required");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    badRequest("Invalid email address");
}

$inserted =  insertMessage(dbConnect(), $name, $email, $message);

if ($inserted) {
    $safename = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    echo "Message sent successfully, Thank you $safename";
    exit;
}

serverError("Failed to send message");
