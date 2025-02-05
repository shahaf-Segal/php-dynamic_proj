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
    $safename = escapeHtmlString($name);
    addFlashMessage("success", "Message sent successfully, Thank you $safename");
    redirect("/guestbook");
}
addFlashMessage("error", "Failed to send message");
redirect("/guestbook");
exit;
