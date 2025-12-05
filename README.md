# 📚 CourseFlow – Gestion des Cours & Sections

CourseFlow est une application web simple permettant la gestion de cours et de leurs sections (chapitres).  
Elle constitue la première brique d'un mini-LMS, centrée sur l'organisation pédagogique :  
**Cours → Sections**.

Développé en **PHP 8 procédural**, **MySQL**, **HTML5** et **CSS**, le projet propose un CRUD complet pour gérer l'ensemble des contenus.

---

## 🧩 Fonctionnalités principales

### 📝 Gestion des Cours

- ➕ Ajouter un nouveau cours
- ✏️ Modifier un cours existant
- 🗑️ Supprimer un cours
- 📄 Afficher tous les cours dans une liste
- 👁️ Voir les détails d'un cours et ses sections associées

Chaque cours possède :
- **titre**
- **description**
- **niveau** (Débutant, Intermédiaire, Avancé)
- **date de création**

### 📖 Gestion des Sections (Chapitres)

- ➕ Ajouter une section liée à un cours
- ✏️ Modifier une section
- 🗑️ Supprimer une section
- 📄 Afficher toutes les sections appartenant à un cours
- ↕️ Tri possible par position (ordre des chapitres)

Une section possède :
- **titre**
- **contenu**
- **position** (ordre dans le cours)
- **date de création**

---

## 🛠️ Technologies utilisées

- **PHP 8** (procédural)
- **MySQL / MariaDB**
- **HTML5**
- **CSS**
- **mysqli** (connexion SQL)

---

## 📂 Structure du projet

```
/config.php
/header.php
/footer.php

/courses_list.php
/courses_create.php
/courses_edit.php
/courses_delete.php

/sectionsbycourse.php
/sections_create.php
/sections_edit.php
/sections_delete.php

/assets/
    css/
    img/
```

---

## 🗄️ Base de données

### Table `courses`

| Champ        | Type           | Description           |
|--------------|----------------|-----------------------|
| id           | INT (PK, AI)   | Identifiant           |
| title        | VARCHAR        | Titre du cours        |
| description  | TEXT           | Description           |
| level        | VARCHAR        | Niveau du cours       |
| created_at   | DATETIME       | Date de création      |

### Table `sections`

| Champ        | Type           | Description               |
|--------------|----------------|---------------------------|
| id           | INT (PK, AI)   | Identifiant               |
| course_id    | INT (FK)       | Référence du cours        |
| title        | VARCHAR        | Titre de la section       |
| content      | TEXT           | Contenu du chapitre       |
| position     | INT            | Ordre dans le cours       |
| created_at   | DATETIME       | Date de création          |

### Relation

📌 **1 cours → plusieurs sections**  
📌 `sections.course_id` est une clé étrangère vers `courses.id`

---

## 🚀 Installation

1. **Cloner le repository**
   ```bash
   git clone <repo-url>
   ```

2. **Importer le fichier SQL dans phpMyAdmin/MySQL**

3. **Configurer la connexion dans `config.php`**
   ```php
   $connection = mysqli_connect("localhost", "root", "", "courseflow");
   ```

4. **Lancer le projet via localhost / XAMPP / WAMP**

---

## 🎯 Objectif du projet

Ce projet sert d'entraînement aux concepts fondamentaux :

- Conception base de données (relation 1:N)
- Utilisation de clés étrangères
- Réalisation d'un CRUD complet en PHP procédural
- Architecture simple et propre (config, pages séparées)
- Navigation claire et interface lisible

---

## ✨ Améliorations possibles (bonus)

- 🔍 Recherche de cours
- 📄 Pagination
- 📥 Export PDF / CSV
- ⏱️ Champ "durée" pour un cours ou une section
- 🎨 Interface modernisée avec Bootstrap / Tailwind

---

## 👨‍💻 Auteur

Projet réalisé dans le cadre d'un exercice pédagogique — **YouCode / 2025**.
