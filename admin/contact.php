<?php

include 'config/conn.php';
session_start();

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
          <a href="post.php">
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
          <a href="contact.php" class="active">
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
                    <h2>Contact us Messages</h2>
                     <div class="container">
    
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
$sql = "SELECT * FROM contacts ORDER BY ID DESC";
$result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['ID'] . "</td>
                                <td>" . $row['Full_Names'] . "</td>
                                <td>" . $row['Email'] . "</td>
                                <td>" . $row['Sujet'] . "</td>
                                <td>" . $row['Message'] . "</td>
                                  <td>
                                    <a href='update_cont.php?id=" . $row['ID'] . "' class='btn btn-sm btn-success'>Edit info</a>
                                    <a href='delete_cont.php?id=" . $row['ID'] . "' class='btn btn-sm btn-danger'>Delte</a>
                                    
                                    
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Aucun message trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>



</div>


   





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