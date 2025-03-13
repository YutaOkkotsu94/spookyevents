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
    <title>Devis</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <div class="container-fluid">
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
                        <a class="nav-link active" aria-current="page" href="index.php">Retour à l'accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    



    <div class="container d-flex justify-content-center mt-5">
        <div class="card p-4 shadow" style="max-width: 900px; width: 100%;">
            <h2 class="text-center mb-4 shadow-sm p-3 mb-5 bg-body-tertiary rounded">Demande de devis</h2>
            <form action="send_mail.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com" required>
                </div>
                
                <div class="mb-3">
                    <label for="entreprise" class="form-label">Nom de l'entreprise (facultatif)</label>
                    <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Nom de l'entreprise">
                </div>
            
                <div class="mb-3">
                    <label for="facturation" class="form-label">Adresse de facturation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="facturation" name="facturation" placeholder="Adresse complète" required>
                </div>
            
                <div class="mb-3">
                    <label for="livraison" class="form-label">Adresse de livraison <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="livraison" name="livraison" placeholder="Adresse complète" required>
                </div>
            
                <div class="mb-3">
                    <label for="date" class="form-label">Date de la prestation <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
    
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="codePostal" class="form-label">Code Postal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="codePostal" name="codePostal" placeholder="75000" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ville" class="form-label">Ville <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="ville" name="ville" placeholder="Paris" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pays" class="form-label">Pays <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="pays" name="pays" placeholder="France" required>
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="telephone" class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="06 12 34 56 78" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Structures à louer <span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="safari" name="structures[]" value="Safari World">
                        <label class="form-check-label" for="safari">Safari World</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lion" name="structures[]" value="Parcours King Lion">
                        <label class="form-check-label" for="lion">Parcours King Lion</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="jungle" name="structures[]" value="Parcours Jungle">
                        <label class="form-check-label" for="jungle">Parcours Jungle</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pirate" name="structures[]" value="Bâteau Pirate">
                        <label class="form-check-label" for="pirate">Bâteau Pirate</label>
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="horaires" class="form-label">Horaires de livraison <span class="text-danger">*</span></label>
                    <select class="form-select" id="horaires" name="horaires" required>
                        <option selected disabled>Choisissez un créneau</option>
                        <option value="8-10h">08h00 - 10h00</option>
                        <option value="10-12h">10h00 - 12h00</option>
                        <option value="14-16h">14h00 - 16h00</option>
                        <option value="16-18h">16h00 - 18h00</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="paiement" class="form-label">Moyen de paiement <span class="text-danger">*</span></label>
                    <select class="form-select" id="paiement" name="paiement" required>
                        <option selected disabled>Choisissez un moyen de paiement</option>
                        <option value="Virement">Virement</option>
                        <option value="Bon Administratif">Bon Administratif</option>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="message" class="form-label">Message (facultatif)</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Détails supplémentaires..."></textarea>
                </div>
                

                <button type="submit" class="btn btn-primary w-100">Envoyer la demande</button>
            </form>
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
            <ul>
              <li><a href="index.php">Accueil</a></li>
              <li><a href="legalnotice.html">Mentions légales</a></li>
              <li><a href="politique.html">Politique de confidentialité</a></li>
            </ul>
          </div>
          
        </div>
        <div class="footerBottom">
          <p>© 2024 SpookingEvents. Tous droits réservés.</p>
        </div>
        </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>