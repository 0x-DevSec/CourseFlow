<?php
include "../infrastructure/config.php";

// Check if id exists
if (!isset($_GET['id'])) {
    die("No course ID given.");
}

$id = $_GET['id'];

// =========================
// 1) Get course information
// =========================
$courseQuery = "SELECT * FROM courses WHERE id = $id";
$courseResult = mysqli_query($connection, $courseQuery);

$course = mysqli_fetch_assoc($courseResult);

if (!$course) {
    die("Course not found.");
}

// Default image always
$image = "https://placehold.co/300x150";

// =========================
// 2) Get course sections
// =========================
$sectionsQuery = "SELECT * FROM sections WHERE course_id = $id";
$sectionsResult = mysqli_query($connection, $sectionsQuery);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $course['title']; ?></title>

    <style>
        body { font-family: Arial; background: #f5f7fa; padding: 20px; }
        .container { max-width: 700px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        .course-img { width: 100%; height: 250px; object-fit: cover; border-radius: 10px; }
        .section { background: #eef4ff; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">

    <h1><?php echo $course['title']; ?></h1>

    <!-- Image -->
    <img src="<?php echo $image; ?>" class="course-img">

    <h3>Description</h3>
    <p><?php echo $course['description']; ?></p>

    <h3>Niveau</h3>
    <p><?php echo $course['level']; ?></p>

    <h3>Sections</h3>

    <?php
    if (mysqli_num_rows($sectionsResult) > 0) {
        while ($sec = mysqli_fetch_assoc($sectionsResult)) {
            echo "<div class='section'>" . $sec['title'] . "</div>";
        }
    } else {
        echo "<div class='section'>No sections available.</div>";
    }
    ?>

</div>

</body>
</html>
