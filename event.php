<?php

include './admin/config/conn.php';

$sql = "SELECT * FROM evnts ORDER BY id DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events List</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
   
    .con {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }
    .cabb {
      background: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .cabb:hover {
      transform: translateY(-5px);
    }
    .cabb img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .cabb-content {
      padding: 20px;
    }
    .sector {
      display: inline-block;
      background: #6c63ff;
      color: white;
      font-size: 12px;
      padding: 5px 12px;
      border-radius: 20px;
      margin-bottom: 10px;
    }
    .cabb h3 {
      margin: 10px 0;
      font-size: 18px;
      color: #333;
    }
    .cabb p {
      font-size: 14px;
      color: #666;
    }
    .read-more-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 15px;
      background: #6c63ff;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .read-more-btn:hover {
      background: #5548d9;
    }
  </style>
</head>
<body>
 
  <div class="con">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="cabb">';
           echo '<img src="admin/uploads/'.$row['event_picture'].'" alt="'.$row['event_title'].'" width="200">';

            echo '<div class="cabb-content">';
            echo '<span class="sector">'.$row['sector_name'].'</span>';
            echo '<h3>'.$row['event_title'].'</h3>';
            echo '<p>'.substr($row['description'],0,80).'...</p>';
           echo '<button class="read-more-btn" 
        data-title="'.$row['event_title'].'" 
        data-sector="'.$row['sector_name'].'" 
        data-desc="'.$row['description'].'" 
        data-img="admin/uploads/'.basename($row['event_picture']).'">Read More</button>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No events found.</p>";
    }
    ?>
  </div>

  <script>
    document.querySelectorAll('.read-more-btn').forEach(button => {
      button.addEventListener('click', function() {
        const title = this.getAttribute('data-title');
        const sector = this.getAttribute('data-sector');
        const desc = this.getAttribute('data-desc');
        const img = this.getAttribute('data-img');

        Swal.fire({
          title: title,
          html: `
            <img src="${img}" style="width:100%; border-radius:10px; margin-bottom:15px;">
            <h4 style="color:#6c63ff;">${sector}</h4>
            <p style="text-align:justify; color:#444;">${desc}</p>
          `,
          width: 600,
          confirmButtonText: 'Close',
          confirmButtonColor: 'red'
        });
      });
    });
  </script>
</body>
</html>
