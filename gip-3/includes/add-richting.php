<?php
include './dbh.php';

$response = array();


// Handle multiple file uploads
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Valid file extensions
$maxFileSize = 25000000; // 25MB max file size
$target_dir = $_SERVER['DOCUMENT_ROOT'] . '/gip-3/media';

// Array to store image paths
$imagePaths = [
    'hoofd-img' => null,
    'advantages-img' => null,
    'toekomst-img' => null
];

// Process each file
foreach (['hoofd-img', 'advantages-img', 'toekomst-img'] as $fileKey) {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$fileKey];
        $fileName = $file['name'];

        // Check file size
        if ($file['size'] > $maxFileSize) {
            $response[1] = "Bestand '$fileKey' is te groot";
            echo json_encode($response);
            exit();
        }

        // Validate file extension
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        if (!in_array($fileExtension, $allowedExtensions)) {
            $response[1] = "Ongeldige bestandsextensie voor '$fileKey'";
            echo json_encode($response);
            exit();
        }

        // Generate unique filename
        $imgName = generate_uuid_v4();
        $destination = "$target_dir/$imgName.$fileExtension";
        $relativePath = "/gip-3/media/$imgName.$fileExtension";

        // Move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $imagePaths[$fileKey] = $relativePath;
        } else {
            $response[1] = "Fout bij het uploaden van '$fileKey'";
            echo json_encode($response);
            exit();
        }
    }
}

// Get text data from POST
$id = generate_uuid_v4();
$richting = $_POST['richting'] ?? '';
$summary = $_POST['summary'] ?? '';
$troeven = $_POST['troeven'] ?? '';
$toekomst = $_POST['toekomst'] ?? '';
$tableData = json_decode($_POST['tableData'] ?? '[]', true);


$qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data=https://gip-3/template.php?id=$id&size=150x150";

// Insert into database
$sql = "INSERT INTO `qr_codes` (`id`, `richting`, `summary`, `course_tabel`, `our_advantages`,`future`, `hoofd-img`, `advanteges-img`, `toekomst-img`, `qr_code`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssss",
    $id,
    $richting,
    $summary,
    $tableData,
    $troeven,
    $toekomst,
    $imagePaths['hoofd-img'],
    $imagePaths['advantages-img'],
    $imagePaths['toekomst-img'],
    $qr_code_url
);

if ($stmt->execute()) {
    $response[0] = "Success";
} else {
    $response[1] = "Fout bij het opslaan in de database";
}

// Output response
echo json_encode($response);
