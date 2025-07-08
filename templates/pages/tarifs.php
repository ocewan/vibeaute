<?php require_once APP_ROOT . "/templates/header.php" ?>

<section class="tarifs">
    <div class="tarifs-header">
        <h2>Tarifs</h2>
        <div class="tarifs-header-text">
            <p>Découvrez les tarifs des prestations proposées par votre prothésiste ongulaire Virginie</p>
            <a href="https://www.planity.com/vibeaute-69410-champagne-au-mont-dor" class="header-rdv-btn">Prendre RDV<img src="/img/rdv.png" alt=""></a>
        </div>
    </div>
    <div class="tarifs-container">
        <?php foreach ($tarifs as $tarif): ?>
            <div class="box">
                <h3><?= htmlspecialchars($tarif->getCategory()) ?></h3>
                <p><?= htmlspecialchars($tarif->getTitle()) ?></p>
                <span><?= number_format($tarif->getPrice(), 2, ',', ' ') ?> €</span>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="banner-container">
        <div class="banner">
            <h4>Une question sur les prestations ?</h4>
            <a href="/prestastions" class="banner-btn">Voir les prestations</a>
        </div>
    </div>
</section>


<?php require_once APP_ROOT . "/templates/footer.php" ?>