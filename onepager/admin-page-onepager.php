<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qr systeem voor opendeurdag</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

    <style>
        * {
            /* debuging */
            /* border: 2px solid green; */
        }

        body,
        html {
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            height: 100%;
            overflow-x: hidden;
        }

        .section {
            min-height: 100vh;
            color: white;
        }

        .first-section {
            background: linear-gradient(45deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .second-section {
            background: linear-gradient(135deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .home-section {
            background: linear-gradient(45deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
        }

        .navigation-div {
            display: flex;
            justify-content: center;
            padding-top: 2rem;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2vw;
        }

        .nav-btn {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            background-color: unset;
            border: 0;
            color: rgb(59, 90, 141);
        }

        .museumphoto {
            position: relative;
            width: 100% !important;
        }

        .museumphoto {
            position: relative;
            width: 100%;
            /* Ensure the image takes up the full width of its container */
            height: auto;
            /* Maintain the aspect ratio of the image */
            max-width: 100%;
            /* Ensure the image does not exceed the container's width */
            object-fit: cover;
        }

        @media (min-width: 100px) {
            .museumphoto {
                width: 80%;
                /* For smaller screens, reduce the image width */
                height: auto;
            }
        }

        #home-text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 6vw;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            padding-left: 4vw;
        }

        .headerText {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: rgb(59, 90, 141);
            font-size: 4vw;
            padding-top: 2vh;
        }

        .text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 1vw;
            font-family: 'Montserrat', sans-serif;
            padding-left: 1rem;
        }

        .h3-text {
            display: flex;
            align-items: center;
            color: rgb(59, 90, 141);
            font-size: 2.5vw;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            padding-left: 1rem;
        }

        /* From Uiverse.io by Creatlydev */
        .btn-github {
            cursor: pointer;
            display: flex;
            gap: 0.5rem;
            border: none;

            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            border-radius: 0.5rem;
            font-weight: 800;
            place-content: center;

            padding: 0.75rem 1rem;
            font-size: 0.825rem;
            line-height: 1rem;

            background-color: rgba(0, 0, 0, 0.4);
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.04),
                inset 0 0 0 1px rgba(255, 255, 255, 0.04);
            color: #fff;
        }

        .btn-github:hover {
            box-shadow:
                inset 0 1px 0 0 rgba(255, 255, 255, 0.08),
                inset 0 0 0 1px rgba(3, 90, 252, 0.08);
            color: #03b1fc;
            transform: translate(0, -0.25rem);
            background-color: rgba(0, 0, 0, 0.5);
        }

        .accordion {
            margin: 2rem 0rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .accordion-item {
            border: none;
            margin-bottom: 0.5rem;
            background: transparent;
        }

        .accordion-header {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .accordion-button {
            background: transparent;
            color: rgb(59, 90, 141);
            font-weight: 700;
            font-size: 1.2rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(0, 201, 255, 0.2);
            color: rgb(59, 90, 141);
        }

        .accordion-button:hover {
            background: rgba(0, 201, 255, 0.3);
            transform: translateY(-2px);
        }

        .accordion-button img {
            height: 2rem;
            width: 2rem;
            margin-right: 0.5rem;
        }

        .accordion-body {
            background: rgba(255, 255, 255, 0.95);
            color: rgb(59, 90, 141);
            font-size: 1rem;
            line-height: 1.6;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .accordion-button:focus {
            box-shadow: none;
            outline: none;
        }

        @media (max-width: 768px) {
            .accordion {
                margin: 1rem;
            }

            .accordion-button {
                font-size: 1rem;
            }

            .accordion-body {
                font-size: 0.9rem;
            }
        }

        /* modal */
        #museumphoto_modal {
            transition: transform 0.3s ease, opacity 0.3s ease;
            cursor: pointer;
        }

        #museumphoto_modal {
            opacity: 0.9;
        }

        .modal-content {
            position: absolute;
            background-image: url("./img/modal_background.jpg");
            background-size: cover;
        }

        /* fade-in animation */
        :root {
            --fade-duration: 1s;
        }

        .fade-in {
            opacity: 0;
            transition: opacity var(--fade-duration) ease-out, transform var(--fade-duration) ease-out;
        }

        .fade-in-right {
            transform: translateX(50px);
        }

        .fade-in-left {
            transform: translateX(-50px);
        }

        .fade-in-top {
            transform: translateY(-50px);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateX(0);
        }


        .bounce {
            animation-duration: 2s;
            animation-timing-function: cubic-bezier(0.280, 0.840, 0.420, 1);
            animation-fill-mode: both;
            transform-origin: bottom;
        }

        .bounce.active {
            animation-name: bounce-7;
        }

        @keyframes bounce-7 {
            0% {
                transform: scale(1, 1) translateY(0);
            }

            10% {
                transform: scale(1.05, .95) translateY(0);
            }

            30% {
                transform: scale(1, 1) translateY(-100px);
            }

            50% {
                transform: scale(1, 1) translateY(0);
            }

            57% {
                transform: scale(1, 1) translateY(-5px);
            }

            64% {
                transform: scale(1, 1) translateY(0);
            }

            100% {
                transform: scale(1, 1) translateY(0);
            }
        }

        .videodiv {
            display: flex;
            justify-content: center;
            animation-iteration-count: infinite;
            transform-origin: bottom;
        }

        footer {
            background: linear-gradient(135deg, rgba(0, 201, 255, 1), rgba(146, 254, 157, 1));
            color: rgb(59, 90, 141);
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            padding: 10px 0;
        }
    </style>
</head>

<body>

    <div class="section home-section" id="home">
        <div class="container-fluid ">
            <div class="navigation-div">
                <button class="nav-btn fade-in fade-in-top" data-target="#home">Home</button>
                <button class="nav-btn fade-in fade-in-top" data-target="#inleiding">Inleiding</button>
                <button class="nav-btn fade-in fade-in-top" data-target="#probleemstelling">Probleemstelling</button>
                <button class="nav-btn fade-in fade-in-top" data-target="#plan">Plan</button>
                <button class="nav-btn fade-in fade-in-top" data-target="#realisatie">Realisatie</button>
                <button class="nav-btn fade-in fade-in-top" data-target="#besluit">Besluit</button>
                <button class="nav-btn fade-in fade-in-top" onclick="window.open('')">GitHub</button>
            </div>
            <div class="row" style="margin-top: 4vh;">
                <div class="col-6 fade-in fade-in-left" id="home-text">
                    Qr systeem voor opendeurdag
                </div>
                <div class="col-6 fade-in fade-in fade-in-right" id="photo">
                    <img class="museumphoto" src="./img/photo.png" alt="Spel interface">
                </div>
            </div>
        </div>
    </div>

    <div class="section second-section" id="inleiding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 fade-in fade-in-left">
                    <img class="museumphoto" src="./img/photo-2.png" alt="Spel interface">
                </div>
                <div class="col-6 ">
                    <div class="headerText fade-in fade-in-right">
                        <p>Inleiding</p>
                    </div>
                    <p class="text fade-in fade-in-right">
                        Welkom bij QR-code systeem voor opendeurdag, een slimme webapplicatie die het vinden en beheren van informatie over studierichtingen makkelijker maakt!
                        Mijn project zorgt ervoor dat studenten en beheerders snel toegang hebben tot duidelijke informatie over opleidingen.
                        Op onze opendeurdag wil ik met QR-codes laten zien hoe eenvoudig en modern mij systeem werkt.
                        Bezoekers kunnen met een simpele scan meer ontdekken over studierichtingen.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section first-section" id="probleemstelling">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="headerText fade-in fade-in-left">
                        <p>Probleemstelling</p>
                    </div>
                    <p class="text fade-in fade-in-left">
                        Informatie over studierichtingen is niet altijd makkelijk te vinden.
                        Vaak staat de informatie op verschillende plekken, waardoor het zoeken veel tijd kost.
                        Dit is lastig voor studenten en ouders die de informatie up-to-date moeten houden</p>
                </div>
                <div class="col-6 fade-in fade-in-right">
                    <img class="museumphoto" src="./img/photo-3.png" alt="Spel interface">
                </div>
            </div>
        </div>
    </div>

    <div class="section second-section" id="plan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 fade-in fade-in-left">
                    <img class="museumphoto" src="./img/photo-4.png" alt="Spel interface">
                </div>
                <div class="col-6 ">
                    <div class="headerText fade-in fade-in-right">
                        <p>Plan van aanpak</p>
                    </div>
                    <p class="h3-text fade-in fade-in-right" style="font-size: 1.5vw;">Website structuur bedenken:</p>
                    <p class="text fade-in fade-in-right">Maak een website met een admin-paneel om richtingen en qr-codes toe te voegen en te bewerken.
                        Zorg voor een duidelijke indeling met velden voor richting, summary, troeven, lessentabel, toekomst en foto’s bij elke tekst veld.</p>
                    <p class="h3-text fade-in fade-in-right" style="font-size: 1.5vw;">Bedenk hoe je technologie wilt gebruiken:</p>
                    <p class="text fade-in fade-in-right">Ik heb nagedacht over hoe ik de technologieën die ik ken, zoals HTML, CSS, PHP en JavaScript, kan gebruiken en hoe ze met elkaar samenwerken.</p>
                    <p class="h3-text fade-in fade-in-right" style="font-size: 1.5vw;">Database plannen:</p>
                    <p class="text fade-in fade-in-right">Plan een MySQL-database voor het nauwkeurig opslaan van gegevens zoals richting, sammenvatting, voordelen, lesrooster, toekomst en foto's.
                        Plan ook een systeem om feedback van gebruikers te verzamelen en deze te gebruiken om de informatie te verbeteren.</p>
                    <p class="h3-text fade-in fade-in-right" style="font-size: 1.5vw;">Beheerpagina plannen:</p>
                    <p class="text fade-in fade-in-right">Ontwerp een inlogpagina voor beheerders,
                        zodat zij richtingen en QR-codes kunnen toevoegen, bewerken, kopiëren of verwijderen.
                        Voeg een knop toe om naar het formulier voor nieuwe richtingen te gaan.</p>
                    <p class="h3-text fade-in fade-in-right" style="font-size: 1.5vw;">Template en feedback plannen:</p>
                    <p class="text fade-in fade-in-right">Maak een template om alle gegevens netjes te tonen op de website.
                        Voeg een feedbackfunctie toe, zodat studenten hun mening over richtingen kunnen delen.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section first-section" id="realisatie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="headerText fade-in fade-in-left">
                        <p>Realisatie</p>
                    </div>
                    <p class="text fade-in fade-in-left">
                        Het project is nog UNDER CONSTRUCTION.
                        <br>Tot nu toe is alleen de pagina om nieuwe studierichtingen toe te voegen gemaakt.
                        Deze pagina heeft een formulier met velden voor richting, beschrijving,
                         troeven en sammenvattingen en je kan ook fotos toevoegen.
                    </p>
                </div>
                <div class="col-6 videodiv fade-in fade-in-right">
                    <img class="museumphoto bounce" id="museumphoto_modal" src="./img/photo-5.png" alt="Spel interface"
                        style="height: 85vh; 
                        object-fit: contain;    
                        padding-top: 3rem;"
                        data-bs-toggle="modal" data-bs-target="#videoModal">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p style="margin: 0;">
            Made by Andrii Tymoshenko
        </p>
    </footer>
    <!-- script voor fade-in-animation -->
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.fade-in').forEach((el) => {
            observer.observe(el);
        });
        // bounce animation delay
        // bounce animation with initial delay and delay between animations
        document.addEventListener('DOMContentLoaded', function() {
            const element = document.querySelector('.bounce');

            function runAnimation() {
                element.classList.add('active');
                setTimeout(() => {
                    element.classList.remove('active');
                    setTimeout(runAnimation, 4000); // 3 second delay between animations
                }, 2000); // animation duration
            }

            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    setTimeout(() => {
                        runAnimation(); // 1 second initial delay
                    }, 8000);
                }
            }, {
                threshold: 0.1
            });

            observer.observe(element);
        });
    </script>
    <!-- Script voor modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoModal = document.getElementById('videoModal');
            var video = videoModal.querySelector('video');

            videoModal.addEventListener('hide.bs.modal', function() {
                video.pause(); // Pause the video when the modal is closed
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to navigation buttons
            $(".nav-btn").on('click', function(event) {
                // Get the target section from the data-target attribute
                var targetSection = $(this).data('target');

                // Ensure the target section exists
                if ($(targetSection).length) {
                    // Prevent default action for the button
                    event.preventDefault();

                    // Scroll to the target section without any delay (immediate scroll)
                    $('html, body').stop(true, true).animate({
                        scrollTop: $(targetSection).offset().top
                    }, 0);
                }
            });
        });
    </script>
</body>

</html>
<!-- modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Video van website</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video controls style="width: 100%;">
                    <source src="./video/museum-1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>