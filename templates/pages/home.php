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
            <h2 data-anim>À propos</h2>
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
<section class="prestation">
    <div class="container">

        <div class="prestation-grid">
            <div class="prestation-column">
                <div class="box" data-anim>
                    <div class="box-text">
                        <h3>Intemporel</h3>
                        <p>Un service conçu pour sublimer votre féminité avec délicatesse</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/intemporel2.png" alt="Intemporel">
                    </div>
                </div>
                <div class="box" data-anim>
                    <div class="box-text">
                        <h3>Pose de gel</h3>
                        <p>Des ongles résistants et brillants, sculptés selon vos envies</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/posegel2.png" alt="Pose de gel">
                    </div>
                </div>
                <div class="box" data-anim>
                    <div class="box-text">
                        <h3>Beauté</h3>
                        <p>Des formules complètes pour révéler votre éclat en un clin d’oeil</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/coffret.png" alt="Beauté">
                    </div>
                </div>
            </div>

            <div class="prestation-img">
                <img src="/img/presta.jpg" alt="Manucure et pose de vernis">
            </div>

            <div class="prestation-column">
                <div class="box reverse" data-anim>
                    <div class="box-text">
                        <h3>Élégance</h3>
                        <p>Sublimez vos mains avec des soins
                            raffinés et des finitions impeccables</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/elegance2.png" alt="Élégance">
                    </div>
                </div>
                <div class="box reverse" data-anim>
                    <div class="box-text">
                        <h3>Soin pieds</h3>
                        <p>Offrez à vos pieds un moment de détente et mise en beauté absolu</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/soinpied2.png" alt="Soin des pieds">
                    </div>
                </div>
                <div class="box reverse" data-anim>
                    <div class="box-text">
                        <h3>Nail art</h3>
                        <p>Exprimez votre style avec des décors uniques et subtils</p>
                    </div>
                    <div class="box-img">
                        <img src="/img/nailart.png" alt="Nail art">
                    </div>
                </div>
            </div>
        </div>

        <a href="/prestations" class="btn-plus">Voir plus -></a>
    </div>
</section>

<!-- Section instagram dynamique -->
<section class="instagram">
    <div class="instagram-container">
        <h4>Suivez-moi sur Instagram pour plus d'inspirations !</h4>
        <p data-anim>@vibeaute.by_virginie</p>
        <div class="instagram-img">
            <div class="scroll-container">
                <?php $displayed = 0; ?>
                <?php foreach ($photos as $photo): ?>
                    <?php if ($displayed >= 6) break; ?>
                    <img src="<?= htmlspecialchars($photo->getUrl()) ?>" alt="<?= htmlspecialchars($photo->getAlt()) ?>">
                    <?php $displayed++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section avis clients -->

<section id="reviews" class="carousel-section">
    <h2>AVIS CLIENTS</h2>

    <div class="carousel-controls">
        <button class="carousel-arrow left" onclick="scrollCarousel(-1)">‹</button>

        <div class="carousel-wrapper">
            <div class="carousel-inner" id="carousel-inner">
                <?php foreach ($reviews as $review): ?>
                    <div class="carousel-card">
                        <div class="review-meta"><?= htmlspecialchars($review['name']) ?></div>
                        <p class="review-title"><?= htmlspecialchars($review['title']) ?></p>
                        <p class="review-message"><?= nl2br(htmlspecialchars($review['message'])) ?></p>
                        <div class="review-stars">
                            <?php
                            $rating = intval($review['rating'] ?? 0);
                            echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <button class="carousel-arrow right" onclick="scrollCarousel(1)">›</button>
    </div>
</section>

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
                <h2 data-anim>Contact</h2>
                <p data-anim>Vi' Beauté <br> Champagne au Mont d'Or <br>Pour toute question ou prise de rendez-vous, n'hésitez pas à me contacter via le formulaire</p>
            </div>
        </div>
    </div>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>