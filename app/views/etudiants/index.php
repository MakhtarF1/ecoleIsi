<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-4">
    <h1>Liste des Étudiants</h1>
    <a href="index.php?action=etudiants&method=create" class="btn btn-primary mb-3">Ajouter un étudiant</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= htmlspecialchars($etudiant['id']) ?></td>
                <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                <td><?= htmlspecialchars($etudiant['email']) ?></td>
                <td><?= htmlspecialchars($etudiant['filiere']) ?></td>
                <td>
                    <a href="index.php?action=etudiants&method=edit&id=<?= $etudiant['id'] ?>" 
                       class="btn btn-sm btn-warning">Modifier</a>
                    <a href="index.php?action=etudiants&method=delete&id=<?= $etudiant['id'] ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>