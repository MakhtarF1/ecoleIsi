<!-- views/etudiants/edit.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un étudiant - Gestion Universitaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Modifier l'étudiant</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>

                        <form action="index.php?action=etudiants&method=edit&id=<?= htmlspecialchars($etudiant['id']) ?>" method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" 
                                       required value="<?= htmlspecialchars($etudiant['nom']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" 
                                       required value="<?= htmlspecialchars($etudiant['prenom']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       required value="<?= htmlspecialchars($etudiant['email']) ?>">
                            </div>

                            <div class="mb-3">
                                <label for="filiere" class="form-label">Filière</label>
                                <select class="form-select" id="filiere" name="filiere" required>
                                    <option value="">Sélectionnez une filière</option>
                                    <option value="GL1" <?= $etudiant['filiere'] === 'GL1' ? 'selected' : '' ?>>GL1</option>
                                    <option value="GL2" <?= $etudiant['filiere'] === 'GL2' ? 'selected' : '' ?>>GL2</option>
                                    <option value="GL3" <?= $etudiant['filiere'] === 'GL3' ? 'selected' : '' ?>>GL3</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php?action=etudiants" class="btn btn-secondary me-md-2">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once __DIR__ . '/../layouts/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>