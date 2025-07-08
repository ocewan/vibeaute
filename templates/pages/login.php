<?php require_once APP_ROOT . "/templates/header.php" ?>

<section class="login">
    <h2>Connexion</h2>
    <p>Veuillez entrer vos identifiants pour vous connecter.</p>

    <form action="" class="login-form" id="login-form" method="POST">
        <div class="pseudo-container">
            <label for="pseudo">Pseudo</label>
            <input type="text" autocomplete="off" id="pseudo">
            <span></span>
        </div>
        <div class="password-container">
            <label for="password">Mot de passe</label>
            <input type="password" autocomplete="off" id="password">
            <p id="progress-bar"></p>
            <span></span>
        </div>
        <div class="confirm-container">
            <label for="confirm">Confirmer le mot de passe</label>
            <input type="password" autocomplete="off" id="confirm">
            <span></span>
        </div>

        <input type="submit" value="Valider" id="submit">
    </form>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>