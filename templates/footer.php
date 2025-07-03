<footer>
    <div class="footer-container">
        <div class="footer-columns">
            <div class="footer-column">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="/presta">Prestations</a></li>
                    <li><a href="/tarifs">Tarifs</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Réseaux</h4>
                <ul class="social-icons">
                    <li>
                        <a href="https://facebook.com">
                            <img src="/img/fb.png" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com">
                            <img src="/img/insta.png" alt="Instagram">
                        </a>
                    </li>
                </ul>
                <ul class="footer-infos">
                    <li><a href="/login">Admin</a></li>
                    <li><a href="/legal">Mentions Légales</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Vi' Beauté - Tous droits réservés.</p>
        </div>
    </div>
</footer>


<script>
    // Loader
    window.addEventListener("load", () => {
        const loader = document.getElementById("loader");
        const hero = document.querySelector(".hero");

        setTimeout(() => {
            loader.classList.add("hide");

            setTimeout(() => {
                loader.style.display = "none";
                hero.classList.add("animate");
            }, 1000);
        }, 1800);
    });


    // Scroll navbar
    const navContainer = document.querySelector('.nav-container');

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navContainer.classList.add("scrolled");
        } else {
            navContainer.classList.remove("scrolled");
        }
    });


    // Burger menu 
    const burgerBtn = document.getElementById("burger-btn");
    const mobileNav = document.getElementById("mobile-nav");
    const overlay = document.getElementById("overlay");

    burgerBtn.addEventListener("click", () => {
        const isOpen = burgerBtn.classList.toggle("active");
        mobileNav.classList.toggle("active");
        overlay.classList.toggle("active");

        if (isOpen) {
            navContainer.classList.add("menu-open");
        } else {
            navContainer.classList.remove("menu-open");
        }
    });

    overlay.addEventListener("click", () => {
        burgerBtn.classList.remove("active");
        mobileNav.classList.remove("active");
        overlay.classList.remove("active");
        navContainer.classList.remove("menu-open");
    });

    // Animation de l'image dans la section "À propos"
    window.addEventListener("scroll", () => {
        const scrollValue = (window.scrollY + window.innerHeight) / document.body.offsetHeight;
        const img = document.querySelector(".about-img-anim");

        if (scrollValue > 0.32) {
            img.classList.add("visible");
        }
    });
</script>

</body>

</html>