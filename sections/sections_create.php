<?php
include "../infrastructure/config.php"; // contains $connection

// Check if course ID is provided
if (!isset($_GET['id'])) {
    die("No course ID provided.");
}

$course_id = $_GET['id'];
$message = "";

// Get course title (optional but useful)
$courseQuery = "SELECT title FROM courses WHERE id = $course_id";
$courseResult = mysqli_query($connection, $courseQuery);
$course = mysqli_fetch_assoc($courseResult);

// When the form is submitted
if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert query
    $query = "INSERT INTO sections (course_id, title, content) 
              VALUES ('$course_id', '$title', '$content')";

    if (mysqli_query($connection, $query)) {
        $message = "Section added successfully!";
    } else {
        $message = "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Section</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f7fa;
            padding: 40px;
        }
        .form-container {
            background: white;
            width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #05328a;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #062d76;
        }
        .message {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
            color: green;
        }
    </style>

</head>
<body>

<div class="form-container">

    <h2>Add Section to Course</h2>

    <!-- Show course title -->
    <p><strong>Course:</strong> <?php echo $course['title']; ?></p>

    <?php if ($message != ""): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form action="" method="POST">

        <!-- Hidden course_id field -->
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

        <label>Section Title:</label>
        <input type="text" name="title" required>

        <label>Section Content:</label>
        <textarea name="content" rows="5" required></textarea>

        <button type="submit" name="add">Add Section</button>
    </form>

</div>

</body>
</html>
