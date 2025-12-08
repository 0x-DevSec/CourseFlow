<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CourseFlow</title>
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
            max-width: 1000px;
            margin: 30px auto;
        }

        .search-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 20px;
        }

        .search-section input {
            flex: 1;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .search-section button {
            padding: 12px 20px;
            background: #4f46e5;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
        }

        .filter {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .filter button {
            padding: 10px 16px;
            background: #6b7280;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        .courses {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .course-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .course-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .course-content {
            padding: 18px;
        }

        .course-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #1e293b;
        }

        .course-desc {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 14px;
            line-height: 1.45;
        }

        .course-level {
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
            font-size: 0.85rem;
        }

        .search-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .add-course {
            padding: 12px 26px;
            background: #4f46e5;
            border: none;
            color: white;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            transition: 0.2s ease;
        }

        .add-course:hover {
            background: #4338ca;
        }

        .search-box {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-box input {
            width: 250px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        .search-btn {
            padding: 12px 20px;
            background: #10b981;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .enhanced-search {
            background: #ffffff;
            padding: 25px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            margin-top: -40px;
        }

        .enhanced-btn {
            background: linear-gradient(135deg, #0066ff, #5599ff);
            color: white !important;
            padding: 14px 26px;
            border-radius: 10px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .enhanced-btn:hover {
            opacity: 0.85;
        }

        .enhanced-search-box {
            display: flex;
            align-items: center;
            background: #f5f7fa;
            padding: 12px 16px;
            border-radius: 10px;
            gap: 12px;
            width: 50%;
        }

        .enhanced-search-box input {
            border: none;
            background: transparent;
            width: 100%;
            font-size: 1rem;
        }

        .enhanced-search-btn {
            background: #0066ff;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .enhanced-search-btn:hover {
            background: #004dcc;
        }

        .enhanced-filter {
            margin-top: 25px;
            display: flex;
            justify-content: flex-start;
        }

        .filter-btn {
            background: white;
            padding: 12px 20px;
            border-radius: 10px;
            border: 1px solid #d0d5dd;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .filter-btn:hover {
            background: #f0f2f5;
        }

        .enhanced-courses {
            margin-top: 30px;
            padding: 0 40px;
            /* space left & right */
            max-width: 1200px;
            /* keeps cards centered */
            margin-left: auto;
            margin-right: auto;
        }

        .enhanced-card {
            border-radius: 18px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            border: 1px solid #eef0f4;
        }

        .enhanced-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .level-beginner {
            background: #e3f3ff;
            color: #0066ff;
        }

        .level-intermediate {
            background: #ffefd4;
            color: #b47b00;
        }

        .level-advanced {
            background: #ffe3e3;
            color: #cc0000;
        }

        .course-level {
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header>CourseFlow</header>

    <section class="hero"
        style="background: linear-gradient(135deg, #0a2a6c, #05328a, #024ba3); padding: 80px 0; text-align: center; color: white;">
        <div class="hero-content" style="max-width: 800px; margin: auto;">
            <h1 style="font-size: 2.3rem; font-weight: bold; line-height: 1.5;">
                Commencez votre parcours dans la création et la gestion de cours en ligne
                <span style="color:#5bb9ff;"> avec des outils simples et efficaces</span>
            </h1>
            <p style="font-size: 1.1rem; margin-top: 20px; opacity: 0.9;">
                Créez, modifiez et organisez vos cours ainsi que leurs sections facilement grâce à notre plateforme
                dédiée aux administrateurs.
            </p>



            <div style="margin-top: 30px; display: flex; justify-content: center; gap: 20px;">

                <a href="./cours/courses_create.php" style="padding: 14px 28px; background:white; color:#05328a; border:none; border-radius:10px;
              font-size:1rem; font-weight:bold; cursor:pointer; text-decoration:none; display:inline-block;">
                    Créer un cours
                </a>

                <a href=".\cours\courses_list.php" style="padding: 14px 28px; background:#5bb9ff; color:white; border:none; border-radius:10px;
              font-size:1rem; font-weight:bold; cursor:pointer; text-decoration:none; display:inline-block;">
                    Parcourir les cours
                </a>

            </div>






            <div style="display:flex; justify-content:center; gap:50px; margin-top:40px; font-size:1rem; opacity:0.9;">
                <div>+10 000 utilisateurs</div>
                <div>6 modules principaux</div>
                <div>96% satisfaction</div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="search-section enhanced-search" style="justify-content:center;">
            <div class="search-box enhanced-search-box" style="width:70%; max-width:600px;">
                <input type="text" placeholder="Rechercher un cours..." />
                <button class="search-btn enhanced-search-btn">🔍</button>
            </div>
        </div>
    </div>

    <div class="courses enhanced-courses">
        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Introduction au Design UX/UI</div>
                <div class="course-desc">Découvrez les bases essentielles du design d'expérience utilisateur et
                    d'interfaces modernes.</div>
                <div class="course-level level-beginner">Débutant</div>
            </div>
        </div>

        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Gestion d’un Cours & Sections</div>
                <div class="course-desc">Apprenez à créer, organiser et maintenir des cours avec plusieurs sections.
                </div>
                <div class="course-level level-intermediate">Intermédiaire</div>
            </div>
        </div>

        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Gestion d’un Cours & Sections</div>
                <div class="course-desc">Apprenez à créer, organiser et maintenir des cours avec plusieurs sections.
                </div>
                <div class="course-level level-intermediate">Intermédiaire</div>
            </div>
        </div>

        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Gestion d’un Cours & Sections</div>
                <div class="course-desc">Apprenez à créer, organiser et maintenir des cours avec plusieurs sections.
                </div>
                <div class="course-level level-intermediate">Intermédiaire</div>
            </div>
        </div>


        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Gestion d’un Cours & Sections</div>
                <div class="course-desc">Apprenez à créer, organiser et maintenir des cours avec plusieurs sections.
                </div>
                <div class="course-level level-intermediate">Intermédiaire</div>
            </div>
        </div>

        <div class="course-card enhanced-card">
            <img src="https://placehold.co/300x150" alt="Course Image" />
            <div class="course-content">
                <div class="course-title">Système d’Administration</div>
                <div class="course-desc">Maîtrisez les fonctionnalités destinées aux administrateurs pour gérer
                    efficacement la plateforme.</div>
                <div class="course-level level-advanced">Avancé</div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>