<?php require_once APP_ROOT . "/templates/header.php" ?>

<!-- Section hero d'accueil -->
<section class="hero">

    <h1>
        <span class="line1">Bienvenue à</span>
        <span class="line2">l'institut <br class="mobile-break"><strong>Vi' Beauté</strong></br>
    </h1>

    <a href="/presta" class="hero-btn">Voir les prestations</a>

    <div class="img-container">
        <div class="bg-text">VI' BEAUTÉ</div>
        <img src="/img/nail_home.jpg" alt="femme avec des ongles vernis" class="home-img">
    </div>

</section>

<!-- Section à propos -->
<section class="about">
    <div class="about-bg">
        <img src="" alt="">
    </div>
    <div class="about-content">
        <div class="about-text">
            <h2>À propos</h2>
            <p>
                Je m’appelle Virginie et je suis prothésiste ongulaire diplômée depuis 2023. Passionnée par la minutie, la créativité et les relations humaines, j’ai fondé
                Vi’ Beauté pour offrir à chaque client un moment de soin unique. <br> <br>Mon objectif : vous sublimer tout en respectant la santé de vos ongles. J’utilise des produits de qualité dans une ambiance calme & bienveillante.
            </p>
            <p>“La beauté commence par des détails que l’on soigne avec passion.”</p>
            <a href="https://www.planity.com/vibeaute-69410-champagne-au-mont-dor">Prendre RDV<img src="/img/rdv.png" alt=""></a>
        </div>
        <div class="about-img">
            <div class="about-img-bg">

            </div>
            <img src="/img/virginie.png" alt="Virginie, prothésiste ongulaire" class="about-img-anim">
        </div>
    </div>
</section>

<!-- Section prestations -->
<section class="section-presta">
</section>

<!-- Section instagram -->
<section class="instagram">
    <div class="instagram-container">
        <h4>Suivez-moi sur Instagram pour plus d'inspirations !</h4>
        <p>@vibeaute.by_virginie</p>
        <div class="instagram-img">
            <div class="scroll-container">
                <img src="/img/insta-1.jpg" alt="Manucure rose">
                <img src="/img/insta-2.jpg" alt="Manucure avec nail art">
                <img src="/img/insta-3.jpg" alt="Manucure bleue">
                <img src="/img/insta-4.jpg" alt="Manucure rose chromée">
                <img src="/img/insta-5.jpg" alt="Manucure rose fleurie">
                <img src="/img/insta-6.jpg" alt="French manucure orange">
            </div>
        </div>
    </div>
</section>

<!-- Section avis clients -->
<section class="avis">
    <h2>Avis clients</h2>
    <div class="avis-container">
        <div class="avis-card">
            <p>"Virginie est très professionnelle et à l'écoute. Je suis ravie de mes ongles !"</p>
            <span>- Camille</span>
        </div>
        <div class="avis-card">
            <p>"Un moment de détente incroyable, je recommande vivement Vi' Beauté !"</p>
            <span>- Sophie</span>
        </div>
        <div class="avis-card">
            <p>"Des ongles magnifiques et une ambiance chaleureuse, merci Virginie !"</p>
            <span>- Laura</span>
        </div>
    </div>
</section>

<!-- Formulaire de contact -->
<section class="contact">
    <div class="contact-form">
        <form action="/contact" method="POST">
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
    <div class="contact-info">
        <h3>Contact</h3>
        <p>Vi' Beauté <br> Champagne au Mont d'Or</p>
        <p>Pour toute question ou prise de rendez-vous, n'hésitez pas à me contacter via le formulaire</p>
    </div>
    <div class="contact-img">
        <img src="/img/contact.jpg" alt="Image de contact">
    </div>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>