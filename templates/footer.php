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

    // // Animation de l'image dans la section "À propos"
    document.addEventListener("DOMContentLoaded", () => {
        const img = document.querySelector(".about-img-anim");
        if (!img) return;

        let hasAnimated = false;

        window.addEventListener("scroll", () => {
            if (hasAnimated) return;

            const scrollValue = (window.scrollY + window.innerHeight) / document.body.offsetHeight;

            if (scrollValue > 0.28) {
                img.classList.add("visible");
                hasAnimated = true;
            }
        });
    });

    // Animation générale des éléments
    document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('[data-anim]');

        animatedElements.forEach((el, index) => {
            const baseDelay = parseInt(el.dataset.animDelay) || 150;
            el.dataset.delay = index * baseDelay;
        });

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                const el = entry.target;
                const delay = parseInt(el.dataset.delay) || 0;

                if (entry.isIntersecting) {
                    setTimeout(() => {
                        el.classList.add('is-visible');
                    }, delay);
                } else {
                    el.classList.remove('is-visible');
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(el => observer.observe(el));
    });

    // Animation des avis
    function scrollCarousel(direction) {
        const container = document.querySelector(".carousel-wrapper");
        const cardWidth = container.querySelector(".carousel-card").offsetWidth + 20; // + gap
        container.scrollBy({
            left: direction * cardWidth,
            behavior: "smooth"
        });
        console.log('OK scroll fired');

    }



    // Login form validation
    const form = document.querySelector("form");
    const inputs = document.querySelectorAll(
        'input[type="text"], input[type="password"]'
    );

    const progressBar = document.getElementById("progress-bar");
    let pseudo, email, password, confirmPass;

    const errorDisplay = (tag, message, valid) => {
        const container = document.querySelector("." + tag + "-container");
        const span = document.querySelector("." + tag + "-container > span");

        if (!valid) {
            container.classList.add("error");
            span.textContent = message;
        } else {
            container.classList.remove("error");
            span.textContent = "";
        }
    };

    const pseudoChecker = (value) => {
        if (value.length > 0 && (value.length < 3 || value.length > 20)) {
            errorDisplay("pseudo", "Le pseudo doit faire entre 3 et 20 caractères");
            pseudo = null;
        } else if (!value.match(/^[a-zA-Z0-9_.-]*$/)) {
            errorDisplay(
                "pseudo",
                "Le pseudo ne doit pas contenir de caractères spéciaux"
            );
            pseudo = null;
        } else {
            errorDisplay("pseudo", "", true);
            pseudo = value;
        }
    };

    const emailChecker = (value) => {
        if (!value.match(/^[\w_-]+@[\w-]+\.[a-z]{2,4}$/i)) {
            errorDisplay("email", "L'email n'est pas valide");
            email = null;
        } else {
            errorDisplay("email", "", true);
            email = value;
        }
    };

    const passwordChecker = (value) => {
        progressBar.classList = "";
        if (
            !value.match(
                /^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/
            )
        ) {
            errorDisplay(
                "password",
                "Au moins 8 caractères, une majuscule, un chiffre & un caractère spécial"
            );
            progressBar.classList.add("progressRed");
            password = null;
        } else if (value.length < 12) {
            progressBar.classList.add("progressBlue");
            errorDisplay("password", "", true);
            password = value;
        } else {
            progressBar.classList.add("progressGreen");
            errorDisplay("password", "", true);
            password = value;
        }
        if (confirmPass) confirmChecker(confirmPass);
    };

    const confirmChecker = (value) => {
        if (value !== password) {
            errorDisplay("confirm", "Les mots de passe ne correspondent pas");
            confirmPass = false;
        } else {
            errorDisplay("confirm", "", true);
            confirmPass = true;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("input", (e) => {
            switch (e.target.id) {
                case "pseudo":
                    pseudoChecker(e.target.value);
                    break;
                case "email":
                    emailChecker(e.target.value);
                    break;
                case "password":
                    passwordChecker(e.target.value);
                    break;
                case "confirm":
                    confirmChecker(e.target.value);
                    break;
                default:
                    null;
            }
        });
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        if (pseudo && email && password && confirmPass) {
            const data = {
                pseudo,
                email,
                password,
            };
            console.log(data);

            inputs.forEach((input) => (input.value = ""));
            progressBar.classList = "";

            pseudo = null;
            email = null;
            password = null;
            confirmPass = null;
            alert("Inscription réussie !");
        } else {
            alert("Formulaire invalide !");
        }
    });
</script>

</body>

</html>