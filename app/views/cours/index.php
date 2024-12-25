<!-- views/cours/index.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours - Gestion Universitaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="container mt-4">
        <h1>Liste des Cours</h1>
        <a href="index.php?action=cours&method=create" class="btn btn-primary mb-3">Ajouter un cours</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du cours</th>
                    <th>Code du cours</th>
                    <th>Nombre d'heures</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cours as $c): ?>
                <tr>
                    <td><?php echo htmlspecialchars($c['id']); ?></td>
                    <td><?php echo htmlspecialchars($c['nom_cours']); ?></td>
                    <td><?php echo htmlspecialchars($c['code_cours']); ?></td>
                    <td><?php echo htmlspecialchars($c['nombre_heures']); ?></td>
                    <td>
                        <a href="index.php?action=cours&method=edit&id=<?php echo $c['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="index.php?action=cours&method=delete&id=<?php echo $c['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>