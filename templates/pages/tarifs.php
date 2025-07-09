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
        <?php foreach ($groupedTarifs as $category => $tarifs): ?>
            <?php $categoryId = $tarifs[0]->getCategoryId(); ?>

            <div class="tarif-column">
                <h3 data-anim><?= htmlspecialchars($category) ?></h3>

                <ul>
                    <?php foreach ($tarifs as $tarif): ?>
                        <li class="tarif-item">
                            <span class="tarif-title"><?= htmlspecialchars($tarif->getTitle()) ?></span>
                            <span class="tarif-price"> à partir de <?= number_format($tarif->getPrice(), 2, ',', ' ') ?> €</span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php if ($categoryId === 1): ?>
                    <p class="tarif-info-message">Une baby manucure est offerte pour toute prestation gel ou semi-permanent</p>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="banner-container">
        <div class="banner">
            <h4>Une question sur les prestations ?</h4>
            <a href="/prestations" class="banner-btn">Voir les prestations</a>
        </div>
    </div>
</section>

<?php require_once APP_ROOT . "/templates/footer.php" ?>