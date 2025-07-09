<?php require_once APP_ROOT . "/templates/header.php" ?>

<section class="dashboard">
    <section class="dashboard-admin">
        <h2>Bienvenue Virginie</h2>

        <p>Vous êtes connecté en tant qu'administrateur. Vous pouvez gérer les prestations, les tarifs, les messages et les photos.</p>

        <?php if (isset($_SESSION['admin_id'])): ?>
            <form action="/logout" method="POST">
                <button type="submit" class="logout-btn">Déconnexion</button>
            </form>
        <?php endif; ?>
    </section>

    <section class="dashboard-section prestations">
        <h3>Prestations</h3>
        <h4>Ajouter une prestation</h4>

        <form method="POST" action="/admin/add-tarif">
            <select name="category_id" required>
                <option value="">-- Catégorie --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat->getId() ?>"><?= htmlspecialchars($cat->getName()) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="title" placeholder="Titre de la prestation" required>
            <input type="number" name="price" placeholder="Prix" step="0.01" min="0" required>

            <button type="submit">Ajouter</button>
        </form>
    </section>

    <section class="dashboard-section prestations-list">
        <h3>Tarifs</h3>
        <h4>Modifier les tarifs</h4>

        <table class="tarif-table">
            <thead>
                <tr>
                    <th>Titre de la prestation</th>
                    <th>Prix actuel</th>
                    <th>Nouveau prix</th>
                    <th></th> <!-- Colonne pour "Modifier" -->
                    <th></th> <!-- Colonne pour "Supprimer" -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarifs as $tarif): ?>
                    <tr>
                        <td><?= htmlspecialchars($tarif->getTitle()) ?></td>
                        <td><?= number_format($tarif->getPrice(), 2, ',', ' ') ?> €</td>
                        <td>
                            <form method="POST" action="/admin/update-tarif" class="inline-form">
                                <input type="hidden" name="id" value="<?= $tarif->getId() ?>">
                                <input type="number" name="new_price" step="0.01" min="0" placeholder="0€" required>
                        </td>
                        <td>
                            <button type="submit" class="change-btn">Modifier</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="/admin/delete-tarif" class="inline-form">
                                <input type="hidden" name="id" value="<?= $tarif->getId() ?>">
                                <button type="submit" class="delete-btn">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <section class="dashboard-section messages">
        <h3>Messages reçus</h3>

        <?php if (!empty($messages)): ?>
            <table class="message-table">
                <thead>
                    <tr>
                        <th>Coordonnées</th>
                        <th>Message</th>
                        <th>Reçu le</th>
                        <th>Lu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr class="<?= $message->getIsRead() ? 'read' : 'unread' ?>">
                            <td>
                                <strong><?= htmlspecialchars($message->getName()) ?></strong><br>
                                <small><?= htmlspecialchars($message->getEmail()) ?></small><br>
                                <small><?= htmlspecialchars($message->getPhone()) ?></small>
                            </td>
                            <td><?= nl2br(htmlspecialchars($message->getMessage())) ?></td>
                            <td><?= $message->getSentAt()->format('d/m/Y H:i') ?></td>
                            <td><?= $message->getIsRead() ? 'Oui' : 'Non' ?></td>
                            <td>
                                <?php if (!$message->getIsRead()): ?>
                                    <form method="POST" action="/admin/mark-message-read/" class="inline-form">
                                        <input type="hidden" name="id" value="<?= $message->getId() ?>">
                                        <button type="submit">Marquer comme lu</button>
                                    </form>
                                <?php endif; ?>

                                <form method="POST" action="/admin/delete-message/" class="inline-form">
                                    <input type="hidden" name="id" value="<?= $message->getId() ?>">
                                    <button type="submit" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun message reçu pour l’instant.</p>
        <?php endif; ?>
    </section>


    <section class="dashboard-section photos">
        <h3>Photos</h3>

        <div class="photo-grid">

            <!-- Bloc d'ajout -->
            <?php if (count($photos) < 6): ?>
                <form class="photo-upload-card" method="POST" action="/admin/upload-photo/" enctype="multipart/form-data">
                    <label for="photo-upload" class="custom-file">
                        <span>Sélectionner une image</span>
                    </label>
                    <input type="file" id="photo-upload" name="photo" accept="image/*" required hidden>
                    <input type="text" name="alt" placeholder="Description" required>

                    <button type="submit">Ajouter</button>
                </form>

            <?php else: ?>
                <p class="photo-limit-message">Vous avez déjà 6 photos. Supprimez-en une pour en ajouter une nouvelle.</p>

            <?php endif; ?>

            <!-- Affichage des photos -->
            <?php foreach ($photos as $photo): ?>
                <div class="photo-card">
                    <img src="<?= htmlspecialchars($photo->getUrl()) ?>" alt="<?= htmlspecialchars($photo->getAlt()) ?>">
                    <form method="POST" action="/admin/delete-photo/" class="delete-form">
                        <input type="hidden" name="id" value="<?= $photo->getId() ?>">
                        <button type="submit" class="delete-btn" title="Supprimer cette photo">×</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>