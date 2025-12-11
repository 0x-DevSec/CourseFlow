<?php
include "../infrastructure/config.php";

$id = "";
$title = "";
$desc = "";
$level = "";
$error_message = "";
$success_message = "";



if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM courses WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $desc = $row['description'];
        $level = $row['level'];
    } else {
        $error_message = "Cours introuvable.";
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"]);
    $desc = trim($_POST["description"]);
    $level = trim($_POST["level"]);


    if (empty($title) || empty($desc) || empty($level)) {
        $error_message = "Veuillez remplir tous les champs.";
    } else {
        if (!empty($id)) {
            // update course
            $update = "UPDATE courses SET title='$title', description='$desc', level='$level' WHERE id='$id'";

            if (mysqli_query($connection, $update)) {
                $success_message = "Cours mis à jour avec succès !";
            } else {
                $error_message = "Erreur lors de la mise à jour.";
            }
        } else {
            $error_message = "ID du cours manquant.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier un Cours – CourseFlow</title>

    <!-- Add bootstrap for alerts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
        }

        header {
            background: #4f46e5;
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .page-container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-top: 0;
            font-size: 1.8rem;
            text-align: center;
            color: #05328a;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #d0d5dd;
            border-radius: 10px;
            background: #f5f7fa;
            font-size: 1rem;
            outline: none;
            transition: 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #4f46e5;
            background: #fff;
        }

        textarea {
            height: 140px;
            resize: none;
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #0066ff, #5599ff);
            border: none;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            opacity: 0.9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #4f46e5;
            font-weight: bold;
        }
    </style>
</head>

<body>

<header>CourseFlow</header>

<div class="page-container">
    <h2>Modifier le cours</h2>

    <!-- ALERTS -->
    <?php
    if (!empty($error_message)) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>' . $error_message . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
    }

    if (!empty($success_message)) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $success_message . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
    }
    ?>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Title -->
        <div class="form-group">
            <label for="title">Titre du cours</label>
            <input type="text" 
                   name="title" 
                   id="title"
                   value="<?php echo $title; ?>"
            />
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description du cours</label>
            <textarea id="description" name="description"><?php echo $desc; ?></textarea>
        </div>

        <!-- Level -->
        <div class="form-group">
            <label for="level">Niveau</label>
            <select id="level" name="level">
                <option value="">Choisissez un niveau</option>
                <option value="Débutant" <?php if ($level == "Débutant") echo "selected"; ?>>Débutant</option>
                <option value="Intermédiaire" <?php if ($level == "Intermédiaire") echo "selected"; ?>>Intermédiaire</option>
                <option value="Avancé" <?php if ($level == "Avancé") echo "selected"; ?>>Avancé</option>
            </select>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="../index.php" class="back-link">⬅ Retour à l'accueil</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
