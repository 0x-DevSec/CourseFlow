<footer class="footer">
    <div class="footer-container">

        <div class="footer-left">
            <h2 class="footer-logo">CourseFlow</h2>
            <p class="footer-desc">
                Plateforme de gestion de cours et de sections — Simple, moderne et efficace.
            </p>
        </div>

        <div class="footer-links">
            <h3>Navigation</h3>
            <a href="index.php">Accueil</a>
            <a href="browse-courses.php">Cours</a>
            <a href="create-course.php">Créer un cours</a>
        </div>

        <div class="footer-links">
            <h3>Support</h3>
            <a href="#">Aide</a>
            <a href="#">FAQ</a>
            <a href="#">Contact</a>
        </div>

        <div class="footer-social">
            <h3>Suivez-nous</h3>
            <div class="social-icons">
                <span>🌐</span>
                <span>📘</span>
                <span>🐦</span>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        © <?php echo date('Y'); ?> CourseFlow — Tous droits réservés.
    </div>
</footer>


<style>
.footer {
    background: #05328a;
    color: white;
    padding: 30px 0 10px;
    margin-top: 60px;
    font-family: Arial, sans-serif;
}

.footer-container {
    width: 90%;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.footer-logo {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.footer-desc {
    opacity: 0.8;
    font-size: 0.9rem;
    line-height: 1.4rem;
}

.footer-links h3,
.footer-social h3 {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.footer-links a {
    color: #d8e4ff;
    text-decoration: none;
    display: block;
    margin: 4px 0;
    transition: 0.2s;
}

.footer-links a:hover {
    opacity: 0.7;
}

.social-icons span {
    font-size: 1.5rem;
    margin-right: 10px;
    cursor: pointer;
    transition: 0.2s;
}

.social-icons span:hover {
    opacity: 0.7;
}

.footer-bottom {
    text-align: center;
    margin-top: 30px;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,0.2);
    font-size: 0.9rem;
    opacity: 0.8;
}
</style>
