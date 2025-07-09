<?php require_once APP_ROOT . "/templates/header.php" ?>

<section class="login">
    <h2>Connexion Admin</h2>
    <p>Veuillez entrer vos identifiants pour vous connecter.</p>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/login" class="login-form" id="login-form" method="POST">
        <div class="user-container">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" autocomplete="off" id="username" required>
            <span></span>
        </div>
        <div class="password-container">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" autocomplete="off" id="password" required>
            <span></span>
        </div>

        <input type="submit" value="Valider" id="submit">
    </form>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>