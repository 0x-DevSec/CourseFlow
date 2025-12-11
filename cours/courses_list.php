<?php
 include "../infrastructure/config.php";
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours – CourseFlow</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f7fa;
        }

        header {
            background: #4f46e5;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .table-wrapper {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin: 0 0 20px 0;
            font-size: 1.8rem;
            color: #1e293b;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        thead {
            background: #eef0f7;
        }

        th,
        td {
            padding: 14px 12px;
            text-align: left;
            font-size: 1rem;
        }

        th {
            font-weight: bold;
            color: #374151;
        }

        tr {
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f9fafb;
        }
        a {
            
        text-decoration: none !important;
        }


        /* Action buttons */
        .btn {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.9rem;
            cursor: pointer;
            font-weight: 600;
            border: none;
        }

        .add-section {
            background: #10b981;
            color: white;
        }

        .edit-btn {
            background: #3b82f6;
            color: white;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        /* Top button */
        .add-course-btn {
            background: #4f46e5;
            padding: 12px 22px;
            border-radius: 10px;
            font-weight: 600;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>

<header>CourseFlow</header>

<div class="container">

    <a href="./courses_create.php" class="add-course-btn">+ Ajouter un cours</a>

    <div class="table-wrapper">

        <h2>Gestion des Cours</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre du cours</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <!-- Course card manager -->
                 <?php
                 $query = "SELECT * FROM courses";
                 $result = mysqli_query($connection, $query);
                 while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['level']; ?></td>
                    <td>
                        <a class="btn add-section" href="">+ Section</a> 
                        <a class="btn edit-btn" href="/CourseFlow/cours/courses_edit.php?id=<?php echo $row['id']; ?>">Modifier</a>
                        <a class="btn delete-btn" href="/CourseFlow/cours/courses_delete.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</div>

</body>
</html>