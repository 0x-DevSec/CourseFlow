<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    print_r($_POST);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Créer un Cours – CourseFlow</title>
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
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
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

        input, textarea, select {
            width: 100%;
            padding: 14px;
            border: 1px solid #d0d5dd;
            border-radius: 10px;
            background: #f5f7fa;
            font-size: 1rem;
            outline: none;
            transition: 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
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
    <h2>Créer un nouveau cours</h2>

    <form method="POST">
        <!-- Title -->
        <div class="form-group">
            <label for="title">Titre du cours</label>
            <input type="text" name="title" id="title" placeholder="Ex : Introduction au Design UX/UI" required />
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description du cours</label>
            <textarea id="description" name="description" placeholder="Décrivez brièvement le contenu et les objectifs du cours..." required></textarea>
        </div>

        <!-- Level -->
        <div class="form-group">
            <label for="level">Niveau</label>
            <select id="level" name="level" required>
                <option value="">Choisissez un niveau</option>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Avancé">Avancé</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit">Créer le Cours</button>
    </form>

    <a href="../index.php" class="back-link">⬅ Retour à l'accueil</a>
</div>

</body>
</html>
