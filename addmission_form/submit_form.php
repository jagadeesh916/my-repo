<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);
    $message = htmlspecialchars($_POST['message']);

    // Handle file uploads
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_10th = $_FILES['file_10th']['name'];
    $file_12th = $_FILES['file_12th']['name'];

    // Move uploaded files and validate
    if (
        move_uploaded_file($_FILES['file_10th']['tmp_name'], $upload_dir . $file_10th) &&
        move_uploaded_file($_FILES['file_12th']['tmp_name'], $upload_dir . $file_12th)
    ) {
        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sharathkrithick@gmail.com'; // Replace with your Gmail address
            $mail->Password = 'jqer yjqg gzzx wizb';   // Replace with your Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email details
            $mail->setFrom('sharathkrithick@gmail.com', 'Thiruthangal Nadar College');
            $mail->addAddress('sharathkrithick@gmail.com'); // Replace with recipient email

            // Attach files
            $mail->addAttachment($upload_dir . $file_10th, "10th Marks");
            $mail->addAttachment($upload_dir . $file_12th, "12th Marks");

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'New Admission Form Submission';
            $mail->Body = "
                <h2>Admission Form Details</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Course:</strong> $course</p>
                <p><strong>Message:</strong> $message</p>
            ";

            // Send email
            $mail->send();
            echo "Form submitted successfully!";
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error uploading files.";
    }
}
?>
