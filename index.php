<?php
session_start(); // Démarre la session pour accéder à $_SESSION

// Vérifie si le token CSRF est déjà généré, sinon on le crée
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un token CSRF sécurisé
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/spooking.svg" type="image/x-icon"> <!-- Assurez-vous que l'icône est un fichier .ico ou .png -->
    
    <!-- Autres balises meta, comme description, etc. -->
    <meta name="description" content="SpookingEvents, l'agence événementielle de vos rêves!">
    <meta name="author" content="Lakhdari Fares">
    <title>Accueil</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
    <div class="container-fluid" id="index">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="img/spooking.svg" alt="Logo" width="50" height="50" class="me-3 d-inline-block align-text-top">
            SpookingEvents
        </a>

        <!-- Le bouton hamburger pour les petits écrans -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Liste de navigation qui se cache sur petits écrans -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#index">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#spooky-island">Spooky Island</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


        
<header class="custom-header py-5">
  <div class="container px-4 px-lg-5 my-5">
      <div class="row align-items-center">
          <!-- Colonne de texte -->
          <div class="col-12 col-md-6 mb-4 mb-md-0">
              <h1>Châteaux gonflables, Horror Show et animations : l’événementiel qui marque les esprits</h1>
              <p class="lead">Vous organisez un anniversaire, une fête d’entreprise ou un événement public ? Offrez une expérience unique avec notre service de location de châteaux gonflables pour petits et grands, ainsi que nos prestations d’Horror Show immersives pour des sensations fortes garanties ! Faites confiance à des professionnels de l’événementiel qui transforment chaque événement en un moment inoubliable.</p>
          </div>
          <!-- Colonne d'image -->
          <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
              <img src="img/spooking-3.svg" alt="Logo" class="img-fluid">
          </div>
      </div>
  </div>
</header>




      <div class="container text-center mt-5 mb-5">
        <h2 class="display-4">Nos structures gonflables</h2>



          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-5">
              <div class="col">
                <div class="card" style="border-radius: 15px; overflow: hidden;">
                    <div id="carouselProduit1" class="carousel slide">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="img/safari-1.jpg" class="d-block w-100" alt="Structure safari">
                        </div>
                        <div class="carousel-item">
                          <img src="img/safari-2.jpg" class="d-block w-100" alt="Structure safari">
                        </div>
                        <div class="carousel-item">
                          <img src="img/safari-3.jpg" class="d-block w-100" alt="Structure safari">
                        </div>
                      </div>
                      <!-- Contrôles de navigation -->
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduit1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselProduit1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                      </button>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Safari World</h3>
                      <p class="card-text">Décoré d’animaux sauvages, cette est structure parfaite pour divertir les plus petits en toute sécurité.
                      Les enfants pourront s'amuser avec des obstacles et un petit toboggan, ajoutant encore plus de fun à leur aventure !</p>
                      <p class="text-dark fw-bold"><mark>150€ / jour TTC</mark></p>
                      <a href="form.php" class="btn btn-primary">Réaliser un devis</a>
                    </div>
                </div>
              </div>



              <div class="col">
                <div class="card"  style="border-radius: 15px; overflow: hidden;">
                  <div id="carouselProduit4" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/lion-1.jpg" class="d-block w-100" alt="Structure lion">
                      </div>
                      <div class="carousel-item">
                        <img src="img/lion-2.jpg" class="d-block w-100" alt="Structure lion">
                      </div>
                      <div class="carousel-item">
                        <img src="img/lion-3.jpg" class="d-block w-100" alt="Structure lion">
                      </div>
                      <div class="carousel-item">
                        <img src="img/lion-4.jpg" class="d-block w-100" alt="Structure lion">
                      </div>
                      <div class="carousel-item">
                        <img src="img/lion-5.jpg" class="d-block w-100" alt="Structure lion">
                      </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduit4" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduit4" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Suivant</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Parcours King Lion</h3>
                    <p class="card-text">Explorez la savane avec le Parcours King Lion ! Ce château gonflable de 12 mètres, 
                      inspiré par le roi des animaux, offre des obstacles amusants à l’intérieur pour divertir les enfants en toute sécurité.</p>
                    <p class="text-dark fw-bold"><mark>300€ / jour TTC</mark></p>
                    <a href="form.php" class="btn btn-primary">Réaliser un devis</a>
                  </div>
                </div>
              </div>


              
              <div class="col">
                <div class="card"  style="border-radius: 15px; overflow: hidden;">
                  <div id="carouselProduit2" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/jungle-géant-1.jpeg" class="d-block w-100" alt="Parcours Jungle">
                      </div>
                      <div class="carousel-item">
                        <img src="img/jungle-géant-2.jpeg" class="d-block w-100" alt="Parcours Jungle">
                      </div>
                      <div class="carousel-item">
                        <img src="img/jungle-géant-3.jpeg" class="d-block w-100" alt="Parcours Jungle">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduit2" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduit2" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Suivant</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Parcours Jungle</h3>
                    <p class="card-text">Offrez une aventure épique dans la jungle avec ce parcours de 24 mètres ! Composé de nombreux obstacles, 
                      il promet des heures de divertissement pour les plus grands, tout en garantissant une sécurité optimale.</p>
                    <p class="text-dark fw-bold"><mark>400€ / jour TTC</mark></p>
                    <a href="form.php" class="btn btn-primary">Réaliser un devis</a>
                  </div>
                </div>
              </div>




              <div class="col">
                <div class="card"  style="border-radius: 15px; overflow: hidden;">
                  <div id="carouselProduit3" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="img/pirate-1.jpg" class="d-block w-100" alt="Structure pirate">
                      </div>
                      <div class="carousel-item">
                        <img src="img/pirate-2.jpeg" class="d-block w-100" alt="Structure pirate">
                      </div>
                      <div class="carousel-item">
                        <img src="img/pirate-3.jpg" class="d-block w-100" alt="Structure pirate">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduit3" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProduit3" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Suivant</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <h3 class="card-title">Bâteau Pirate</h3>
                    <p class="card-text">Embarquez pour une aventure amusante avec ce château gonflable de bateau pirate. 
                      Parfait pour les enfants, il offre des obstacles et une expérience sécurisée pour des moments inoubliables !</p>
                    <p class="text-dark fw-bold"><mark>200€ / jour TTC</mark></p>
                    <a href="form.php" class="btn btn-primary">Réaliser un devis</a>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <!-- Section Spooky Island -->
<div class="container spookyContainer mb-5" id="spooky-island">
          <div class="row justify-content-center">
              <div class="col-md-5 text-center">
                  <img src="img/clown-tueur.jpeg" class="img-fluid rounded same-size" alt="Clown tueur">
              </div>
              <div class="col-md-6 text-left">
                  <h4 class="text-white custom-title mt-4">SPOOKY ISLAND !</h4>
                  <p class="text-white custom-text mt-3">
                      Plongez dans les ténèbres de Spooky Island, <strong>l’attraction d'horreur immersive</strong> qui vous confronte à vos pires cauchemars. 
                      Préparez-vous à vivre une aventure terrifiante dans un univers sombre et oppressant où chaque recoin cache une nouvelle frayeur. 
                      Oserez-vous franchir les portes de Spooky Island et découvrir si vous êtes assez courageux pour survivre ? 
                      Réservez dès maintenant pour une expérience inoubliable qui vous laissera sans voix !
                  </p>
                  <p class="text-white mt-5 call-info">
                    Pour <strong>plus d'informations</strong> ou <strong>réaliser un devis</strong>, appelez-nous au 
                    <a href="tel:+33777005168" class="text-white text-decoration-none border-bottom border-white">
                        07.77.00.51.68 !
                    </a>
                </p>
              </div>
          </div>
      </div>
        

      
        <!-- Section Contact -->
        <div class="container contactContainer border-top mb-5" id="contact">
          <h5 class="display-4 text-center">Nous contacter</h5>
          <div class="row w-100">
              <div class="col-md-6 d-flex flex-column align-items-center justify-content-center left-side">
                  <img src="img/spooking-2.svg" alt="Logo" class="img-fluid" width="400">
              </div>
      
              <div class="col-md-6 d-flex align-items-center">
                  <div class="right-side w-100">
                      <!-- Formulaire de Contact -->
                      <form action="send_mail.php" method="POST" class="form-contact">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                          <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" id="email" name="contact_email" placeholder="example@mail.com" required>
                          </div>
      
                          <div class="mb-3">
                              <label for="profession" class="form-label">Vous êtes ?</label>
                              <select class="form-select" id="profession" name="contact_profession" required>
                                  <option value="">Un particulier, une association...</option>
                                  <option value="Particulier">Particulier</option>
                                  <option value="Professionnel">Professionnel</option>
                                  <option value="Association">Association</option>
                              </select>
                          </div>
      
                          <div class="mb-3">
                              <label for="validationTextarea" class="form-label">Message</label>
                              <textarea class="form-control" id="validationTextarea" name="contact_message" placeholder="Entrez votre message." required></textarea>
                          </div>

                          <div class="mb-3 text-end">
                              <button class="btn btn-primary" type="submit">Envoyer</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
      <!-- Bannière de cookies -->
      <div id="cookie-banner" class="cookie-banner fixed-bottom bg-dark text-white p-4 text-center d-none">
  <p class="mb-3">
    🚀 Ce site utilise des cookies pour améliorer votre expérience. En poursuivant votre navigation, vous acceptez notre 
    <a href="politique.html" class="text-warning">politique de confidentialité</a>.
  </p>
  <div class="d-flex justify-content-center gap-3">
    <button id="accept-cookies" class="btn btn-success btn-lg px-4 py-2">Accepter</button>
    <button id="decline-cookies" class="btn btn-outline-danger btn-lg px-4 py-2">Refuser</button>
  </div>
</div>

      
        
      <footer>         
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://www.facebook.com/people/Spooking-Events/61573955486027/?locale=fr_FR" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/spookingevents/" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@spookingevents" target="_blank"> <!-- Remplace le "#" par le lien correct de TikTok -->
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>
            <div class="footerNav">
                <ul class="list-unstyled d-flex flex-wrap justify-content-center">
                    <li class="mx-3 my-2"><a href="#index">Accueil</a></li>
                    <li class="mx-3 my-2"><a href="#spooky-island">Spooky Island</a></li>
                    <li class="mx-3 my-2"><a href="#contact">Contact</a></li>
                    <li class="mx-3 my-2"><a href="legalnotice.html">Mentions légales</a></li>
                    <li class="mx-3 my-2"><a href="politique.html">Politique de confidentialité</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>© 2024 SpookingEvents. Tous droits réservés.</p>
        </div>
    </footer>
    

          <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener("click", function(e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute("href"));
                        if (target) {
                            window.scrollTo({
                                top: target.offsetTop - 100, // Ajuste selon la hauteur de la navbar
                                behavior: "smooth"
                            });
                        }
                    });
                });
            });
        </script>


<script>

document.addEventListener("DOMContentLoaded", function () {

  localStorage.clear();


  const banner = document.getElementById("cookie-banner");
  const acceptBtn = document.getElementById("accept-cookies");
  const declineBtn = document.getElementById("decline-cookies");

  // Vérifie si l'utilisateur a déjà accepté ou refusé les cookies
  if (!localStorage.getItem("cookieConsent")) {
      banner.classList.remove("d-none"); // Affiche la bannière si pas encore accepté/refusé
  }

  // Si l'utilisateur accepte les cookies
  acceptBtn.addEventListener("click", function () {
      localStorage.setItem("cookieConsent", "accepted");
      banner.classList.add("d-none"); // Cache la bannière
  });

  // Si l'utilisateur refuse les cookies
  declineBtn.addEventListener("click", function () {
      localStorage.setItem("cookieConsent", "declined");
      banner.classList.add("d-none"); // Cache la bannière
  });
});

</script>




      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>