<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST["name"] ?? "";
    $email   = $_POST["email"] ?? "";
    $phone   = $_POST["phone"] ?? "";
    $product = $_POST["product"] ?? "";
    $text    = $_POST["text"] ?? "";

   $to = "teslin.m@krishdesign.com,robin@krishdesign.com"; // Replace with your email address
    $subject = "Tyche Info Solutions Contact Form Submission";
    
    $message = "
    You have received a new message from your website contact form.\n\n
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Product: $product\n
    Message:\n$text
    ";

   $from = "no-reply@tycheinfosolutions.com"; // Use an address on your domain
$headers = "From: Your Website <$from>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();


    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Mail sending failed."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request."]);
}
