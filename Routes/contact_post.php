<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];




if (empty($name) || empty($email) || empty($message)) {
    badRequest("All fields are required");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    badRequest("Invalid email address");
} else {
    dbConnect();
}
