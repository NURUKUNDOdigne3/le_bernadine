<?php

include 'config/conn.php';

session_start();


if(!isset($_SESSION['your_name'])){
   
    header("Location: ../admin/login/login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Bernadine admin </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    .btn-update {
  background-color: green;
  color: white;
  padding: 5px 10px;
  border-radius: 4px;
  text-decoration: none;
}
.btn-delete {
  background-color: red;
  color: white;
  padding: 5px 10px;
  border-radius: 4px;
  text-decoration: none;
}
   </style>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bernadine</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
      
        <li>
          <a href="post.php" class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Post Event</span>
          </a>
        </li>
               
        <li>
          <a href="sub.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Subcribe Emails</span>
          </a>
        </li>
        
        <li>
          <a href="contact.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
       
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      
    </nav>
    <div class="home-content">   
          </div>
        </div>
      </div>    
      
            <div class="container mt-4">
                    <h2>Add Event Panel</h2>


  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#eventFormModal">
    + Add New Event
  </button>



<table id="eventsTable" class="display table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Event_ID</th>
      <th>Event_Title</th>
      <th>Sector_Name</th>
      <th>Description</th>
      <th>Event__Picture</th>
  
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php
    
    $sql = "SELECT id, event_title, sector_name, description, event_picture FROM evnts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['event_title'] . "</td>";
        echo "<td>" . $row['sector_name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td><img src='uploads/" . $row['event_picture'] . "' width='80'></td>";
    
        
                     echo "<td>
                        <div class='d-flex'>
                            <a href='update_event.php?id=" . $row['id'] . "' class='btn btn-success btn-sm me-2'>Update</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Voulez-vous vraiment supprimer cet événement ?');\">Delete</a>
                        </div>
                      </td>";


        echo "</tr>";


      }
    } else {
      echo "<tr><td colspan='6' class='text-center'>No events found</td></tr>";
    }
   
    ?>
  </tbody>
</table>
</div>


<div class="modal fade" id="eventFormModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Event</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-8">
              <label for="eventTitle" class="form-label">Event Title</label>
              <input type="text" class="form-control" name="event_title" required>
            </div>
            <div class="col-md-6">
              <label for="sectorName" class="form-label">Sector Name</label>
              <input type="text" class="form-control" name="sector_name" required>
            </div>
            <div class="col-md-6">
              <label for="eventPicture" class="form-label">Event Picture</label>
              <input type="file" class="form-control" name="event_picture" accept="image/*">
            </div>
            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-success">Save Event</button>
        </div>
      </form>
    </div>
  </div>
</div>    


<?php

if (isset($_POST['submit'])) {
    $event_title = mysqli_real_escape_string($conn, $_POST['event_title']);
    $sector_name = mysqli_real_escape_string($conn, $_POST['sector_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $event_picture = null; 
    if (isset($_FILES['event_picture']) && $_FILES['event_picture']['error'] == 0) {
        $targetDir = "uploads/";
       
        $fileName = time() . "_" . basename($_FILES["event_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], $targetFilePath)) {
            $event_picture = $fileName;
        } else {
            echo "Error uploading image.";
        }
    }


    $sql = "INSERT INTO evnts (event_title, sector_name, description, event_picture) 
            VALUES ('$event_title', '$sector_name', '$description', '$event_picture')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color:green; font-weight:bold;'>New event added successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>



        </div>
        
      </div>
    </div>
  </section>



  <script>


let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}


 </script>



</body>
</html>