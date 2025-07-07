<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vi Beauté</title>
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Righteous&display=swap" rel="stylesheet">
</head>

<body>
    <div id="loader">
        <img src="/img/logo.png" alt="Logo Vi' Beauté" class="loader-logo">
    </div>

    <header>
        <div class="nav-container">
            <nav>
                <a href="/">
                    <img src="/img/logo.png" alt="logo" class="logo">
                </a>

                <!-- Nav desktop (visible uniquement >768px) -->
                <ul class="main-nav">
                    <li><a href="/">ACCUEIL</a></li>
                    <li><a href="/prestations">PRESTATIONS</a></li>
                    <li><a href="/tarifs">TARIFS</a></li>
                    <li><a href="/contact">CONTACT</a></li>
                </ul>

                <!-- Bouton RDV desktop -->
                <a href="https://www.planity.com/vibeaute-69410-champagne-au-mont-dor" class="rdv-btn">Prendre RDV<img src="/img/rdv.png" alt=""></a>

                <!-- Burger icone mobile -->
                <div class="burger" id="burger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>

        <!-- Nav mobile séparée -->
        <div id="mobile-nav">
            <ul>
                <li><a href="/">ACCUEIL</a></li>
                <li><a href="/prestations">PRESTATIONS</a></li>
                <li><a href="/tarifs">TARIFS</a></li>
                <li><a href="/contact">CONTACT</a></li>
            </ul>

            <a href="https://www.planity.com/vibeaute-69410-champagne-au-mont-dor" class="rdv-btn-mobile">
                Prendre RDV
            </a>
        </div>

        <div id="overlay"></div>
    </header>