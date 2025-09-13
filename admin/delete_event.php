<?php




if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = $conn->query("SELECT event_picture FROM evnts WHERE id=$id");
    $event = $result->fetch_assoc();

    if ($event) {
       
        if (!empty($event['event_picture']) && file_exists($event['event_picture'])) {
            unlink($event['event_picture']);
        }

        
        if ($conn->query("DELETE FROM evnts WHERE id=$id")) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Event has been deleted successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location = 'post.php'; 
                        });
                    });
                  </script>";
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete event.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location = 'event.php';
                        });
                    });
                  </script>";
        }
    }
} else {
   
    header("Location: events_list.php");
    exit;
}
?>
