<!-- views/cours/create.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours - Gestion Universitaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="container mt-4">
        <h1>Ajouter un Cours</h1>
        <form action="index.php?action=cours&method=create" method="POST">
            <div class="mb-3">
                <label for="nom_cours" class="form-label">Nom du cours</label>
                <input type="text" class="form-control" id="nom_cours" name="nom_cours" required>
            </div>
            <div class="mb-3">
                <label for="code_cours" class="form-label">Code du cours</label>
                <input type="text" class="form-control" id="code_cours" name="code_cours" required>
            </div>
            <div class="mb-3">
                <label for="nombre_heures" class="form-label">Nombre d'heures</label>
                <input type="number" class="form-control" id="nombre_heures" name="nombre_heures" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="index.php?action=cours" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
