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
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Bernadine</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
      
        <li>
          <a href="#" class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Post Event</span>
          </a>
        </li>
               
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Appointments</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
       
        <li class="log_out">
          <a href="#">
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
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Prem Shahi</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <div class="home-content">
    
              



          </div>
          
        </div>
      </div>    
      
            <div class="container mt-4">
                    <h2>Event Management</h2>


  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#eventFormModal">
    + Add New Event
  </button>

   <!-- Events Table -->
  <table id="eventsTable" class="display table table-striped" style="width:100%">
    <thead>
      <tr>
        <th>Event_ID</th>
        <th>Event_Title</th>
        <th>Sector_Name</th>
        <th>Description</th>
        <th>Event_Picture</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Example static row (replace with PHP loop) -->
      <tr>
        <td>1</td>
        <td>Agriculture Summit</td>
        <td>Agriculture</td>
        <td>Annual agriculture summit for innovation.</td>
        <td><img src="uploads/agri.jpg" width="80"></td>
        <td>
          <a href="update.php?id=1" class="btn btn-update btn-sm">Update</a>
          <a href="delete.php?id=1" class="btn btn-delete btn-sm">Delete</a>
        </td>
      </tr>
      <!-- End Example -->
    </tbody>
  </table>
</div>

<!-- Event Form Modal -->
<div class="modal fade" id="eventFormModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Event</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="insert.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-4">
              <label for="eventID" class="form-label">Event ID</label>
              <input type="text" class="form-control" name="event_id" required>
            </div>
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
          <button type="submit" class="btn btn-success">Save Event</button>
        </div>
      </form>
    </div>
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