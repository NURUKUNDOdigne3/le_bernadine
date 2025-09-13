<?php

include '../admin/config/conn.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM contacts WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Supprimé!',
                    text: 'Data has deleted succcessfullye.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contact.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur!',
                    text: 'Impossible de supprimer le message.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contact.php';
                });
              </script>";
    }
} else {

    header("Location:  contact.php ");
    exit();
}
?>
</body>
</html>
