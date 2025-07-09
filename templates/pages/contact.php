<?php require_once APP_ROOT . "/templates/header.php" ?>

<!-- Formulaire de contact -->
<section class="contact">
    <div class="contact-container">

        <div class="contact-info-mobile">
            <h2>CONTACT</h2>
            <p>Vi’ Beauté<br>Champagne au Mont d'Or <br>Pour toute question ou prise de rendez-vous, n'hésitez pas à me contacter via le formulaire</p>
        </div>

        <div class="contact-left">
            <form action="/contact-submit" method="POST">
                <label for="name">Nom/Prénom</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">envoyer</button>
            </form>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <p class="success">Votre message a bien été envoyé</p>
        <?php elseif (isset($_GET['error'])): ?>
            <p class="error">Erreur lors de l’envoi du message</p>
        <?php endif; ?>


        <div class="contact-right">
            <img src="/img/contact.jpg" alt="Image de contact">
            <div class="contact-info">
                <h2>Contact</h2>
                <p>Vi' Beauté <br> Champagne au Mont d'Or <br>Pour toute question ou prise de rendez-vous, n'hésitez pas à me contacter via le formulaire</p>
            </div>
        </div>
    </div>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>