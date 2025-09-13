<?php

include '../admin/config/conn.php';

// Check if ID is passed in URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM evnts WHERE id=$id");
    $event = $result->fetch_assoc();
}

// Handle update form submission
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $event_title = $_POST['event_title'];
    $sector_name = $_POST['sector_name'];
    $description = $_POST['description'];

    // File upload
    $event_picture = $event['event_picture']; // keep old picture if no new one
    if (isset($_FILES['event_picture']) && $_FILES['event_picture']['error'] == 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["event_picture"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], $targetFile)) {
            $event_picture = $targetFile; // save new path
        }
    }

    $sql = "UPDATE evnts 
            SET event_title=?, sector_name=?, description=?, event_picture=? 
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $event_title, $sector_name, $description, $event_picture, $id);

    if ($stmt->execute()) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Event updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location = 'post.php?id=$id';
                    });
                });
              </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to update event.',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                });
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Event</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 6px;
      color: #444;
    }
    input[type="text"], textarea, input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 15px;
      outline: none;
      transition: 0.3s;
    }
    input:focus, textarea:focus {
      border-color: #007BFF;
      box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }
    textarea {
      min-height: 100px;
      resize: vertical;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #007BFF;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background: #0056b3;
    }
    .preview {
      text-align: center;
      margin-bottom: 15px;
    }
    .preview img {
      max-width: 100%;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Update Event</h2>
    
    <?php if (!empty($event['event_picture'])): ?>
      <div class="preview">
        <p><strong>Current Picture:</strong></p>
         <?php if (!empty($event['event_picture'])): ?>
      <div class="preview">
        <p><strong>Current Picture:</strong></p>
        <img src="<?php echo 'uploads/' . basename($event['event_picture']); ?>" alt="Event Image">
      </div>
    <?php endif; ?>
        
      </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $event['id']; ?>">

      <label>Event Title:</label>
      <input type="text" name="event_title" value="<?php echo $event['event_title']; ?>" required>

      <label>Sector:</label>
      <input type="text" name="sector_name" value="<?php echo $event['sector_name']; ?>" required>

      <label>Description:</label>
      <textarea name="description" required><?php echo $event['description']; ?></textarea>

      <label>Event Picture (Upload New):</label>
      <input type="file" name="event_picture" accept="image/*">

      <button type="submit" name="update">Update Event</button>
    </form>
  </div>
</body>
</html>
