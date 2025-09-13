<?php
include '../admin/config/conn.php';

// Check if ID is passed via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data
    $query = "SELECT * FROM contacts WHERE ID='$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['Full_Names'];
        $email = $row['Email'];
        $sujet = $row['Sujet'];
        $message = $row['Message'];
    } else {
        echo "Données introuvables!";
        exit;
    }
}

// Handle update request
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    $query = "UPDATE contacts 
              SET Full_Names='$name', Email='$email', Sujet='$sujet', Message='$message' 
              WHERE ID='$id'";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <?php if ($result) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Mis à jour!',
                    text: 'Le message a été modifié avec succès.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contact.php';
                });
            </script>
        <?php } else { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur!',
                    text: 'Échec de la mise à jour.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'contact.php';
                });
            </script>
        <?php } ?>
    </body>
    </html>
    <?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour le message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="mb-4">Mettre à jour le message</h2>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" class="form-control" name="name" id="name"
                   value="<?php echo htmlspecialchars($name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email"
                   value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="mb-3">
            <label for="sujet" class="form-label">Sujet</label>
            <input type="text" class="form-control" name="sujet" id="sujet"
                   value="<?php echo htmlspecialchars($sujet); ?>" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" rows="4" required><?php echo htmlspecialchars($message); ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Mettre à jour</button>
        <a href="contact.php" class="btn btn-secondary">Annuler</a>
    </form>

</body>
</html>
