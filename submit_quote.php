<?php
// submit_quote.php - Form handler for quote requests
// This file processes the quote form submission and sends email notifications

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// CSRF check: token must match the one issued to this session's form
$submittedToken = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $submittedToken)) {
    http_response_code(403);
    die('Your session has expired or this form was submitted from an untrusted source. Please <a href="quote.php">go back</a> and try again.');
}

// Strip control characters (CR/LF etc.) to prevent email header/subject injection
function clean_field($value) {
    $value = trim($value ?? '');
    $value = preg_replace('/[\r\n\x00-\x1F\x7F]/', '', $value);
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Get form data
$name = clean_field($_POST['name'] ?? '');
$company = clean_field($_POST['company'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = clean_field($_POST['phone'] ?? '');
$industry = clean_field($_POST['industry'] ?? '');
$product = clean_field($_POST['product'] ?? '');
$description = clean_field($_POST['description'] ?? '');
$contact_time = clean_field($_POST['contact_time'] ?? 'Anytime');

// Honeypot spam check (bot-field must stay empty)
if (!empty($_POST['bot-field'] ?? '')) {
    header('Location: thankyou.php?status=success');
    exit;
}

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($product)) {
    die('Please fill in all required fields. <a href="quote.php">Go back</a>');
}

// Validate email (also rejects any value containing CR/LF, since those aren't valid in an address)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Please enter a valid email address. <a href="quote.php">Go back</a>');
}
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

// Handle file upload (optional)
$file_info = 'No file uploaded';
$allowed_extensions = ['pdf', 'dwg', 'dxf', 'jpg', 'jpeg', 'png'];
$allowed_mime_types = [
    'application/pdf',
    'image/vnd.dwg', 'application/acad', 'application/x-acad', 'image/x-dwg', 'application/octet-stream',
    'image/jpeg',
    'image/png',
];

if (isset($_FILES['drawing']) && $_FILES['drawing']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['drawing']['name'];
    $file_tmp = $_FILES['drawing']['tmp_name'];
    $file_size = $_FILES['drawing']['size'];

    // Max 10MB
    if ($file_size > 10 * 1024 * 1024) {
        die('File size exceeds 10MB limit. <a href="quote.php">Go back</a>');
    }

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed_extensions, true)) {
        die('Unsupported file type. Please upload PDF, DWG, DXF, JPG or PNG. <a href="quote.php">Go back</a>');
    }

    // DWG/DXF files report as application/octet-stream from finfo, so only strictly
    // enforce the MIME check for types where a reliable mime signature exists.
    $detected_mime = function_exists('finfo_open')
        ? finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_tmp)
        : null;
    if ($detected_mime && !in_array($detected_mime, $allowed_mime_types, true)) {
        die('The uploaded file failed validation. Please upload a genuine PDF, DWG, DXF, JPG or PNG file. <a href="quote.php">Go back</a>');
    }

    // Create uploads directory if it doesn't exist
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Generate a unique filename — never trust the client-supplied name
    $new_filename = 'quote_' . time() . '_' . bin2hex(random_bytes(8)) . '.' . $file_ext;
    $upload_path = $upload_dir . $new_filename;

    if (move_uploaded_file($file_tmp, $upload_path)) {
        $file_info = $new_filename;
    }
}

// Prepare email content
$to = 'techmechengineering1@gmail.com';
$subject = 'New Quote Request from ' . $name;
$message = "New quote request received:\n\n";
$message .= "Name: $name\n";
$message .= "Company: $company\n";
$message .= "Email: $email\n";
$message .= "Phone: $phone\n";
$message .= "Industry: $industry\n";
$message .= "Product: $product\n";
$message .= "Description: $description\n";
$message .= "Preferred Contact Time: $contact_time\n";
$message .= "Attachment: $file_info\n";

// Use a site-owned From address (avoids spoofing/spam-filter rejection);
// the visitor's address goes in Reply-To so replying still reaches them.
$headers = "From: TechMech Website <no-reply@techmechengineering.co.in>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
$mail_sent = mail($to, $subject, $message, $headers);

// Redirect to thank you page
if ($mail_sent) {
    header('Location: thankyou.php?status=success');
} else {
    header('Location: thankyou.php?status=error');
}
exit;
