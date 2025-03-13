<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/vlucas/phpdotenv/src/Dotenv.php';

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Générer un token CSRF
}

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur CSRF : Token invalide.");
}

// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$SMTP_USER = $_ENV['SMTP_USER'];
$SMTP_PASS = $_ENV['SMTP_PASS'];

// Vérification que la requête est bien en POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Accès interdit.");
}

// Fonction pour nettoyer et valider les entrées
function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Vérifie si c'est un formulaire de contact ou de devis
if (isset($_POST['contact_email']) && isset($_POST['contact_message'])) {
    // 📨 FORMULAIRE DE CONTACT
    $email = filter_var(clean_input($_POST['contact_email']), FILTER_VALIDATE_EMAIL);
    $message = clean_input($_POST['contact_message']);
    $profession = isset($_POST['contact_profession']) ? clean_input($_POST['contact_profession']) : "Non spécifié";

    if (!$email || !$message) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    $mail_subject = "Nouveau message de contact";
    $mail_body = "
        <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 10px; max-width: 600px; margin: auto; background-color: #f9f9f9;'>
            <h2 style='text-align: center; color: #007bff;'>Nouveau message de contact</h2>
            <p><strong>Email :</strong> <a href='mailto:$email'>$email</a></p>
            <p><strong>Profession :</strong> $profession</p>
            <p><strong>Message :</strong><br>$message</p>
        </div>";
} elseif (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
    // 📨 FORMULAIRE DE DEVIS
    $nom = clean_input($_POST["nom"]);
    $prenom = clean_input($_POST["prenom"]);
    $email = filter_var(clean_input($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $entreprise = isset($_POST["entreprise"]) ? clean_input($_POST["entreprise"]) : '';
    $facturation = clean_input($_POST["facturation"]);
    $livraison = clean_input($_POST["livraison"]);
    $date = clean_input($_POST["date"]);
    $codePostal = clean_input($_POST["codePostal"]);
    $ville = clean_input($_POST["ville"]);
    $pays = clean_input($_POST["pays"]);
    $telephone = clean_input($_POST["telephone"]);
    $horaires = isset($_POST["horaires"]) ? clean_input($_POST["horaires"]) : '';
    $paiement = isset($_POST["paiement"]) ? clean_input($_POST["paiement"]) : '';
    $messageClient = clean_input($_POST["message"]);
    $structures = isset($_POST["structures"]) ? implode(", ", array_map("clean_input", $_POST["structures"])) : "Aucune sélectionnée";

    if (!$email || !$nom || !$prenom) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    $mail_subject = "Nouvelle demande de devis";
    $mail_body = "
        <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 10px; max-width: 600px; margin: auto; background-color: #f9f9f9;'>
            <h2 style='text-align: center; color: #007bff;'>Nouvelle demande de devis</h2>
            <p><strong>Nom :</strong> $nom</p>
            <p><strong>Prénom :</strong> $prenom</p>
            <p><strong>Email :</strong> <a href='mailto:$email'>$email</a></p>
            <p><strong>Entreprise :</strong> $entreprise</p>
            <hr>
            <p><strong>📍 Adresse de facturation :</strong> $facturation</p>
            <p><strong>📦 Adresse de livraison :</strong> $livraison</p>
            <p><strong>📅 Date de la prestation :</strong> $date</p>
            <p><strong>🏙️ Ville :</strong> $ville, <strong>Code Postal :</strong> $codePostal, <strong>Pays :</strong> $pays</p>
            <p><strong>📞 Téléphone :</strong> $telephone</p>
            <p><strong>🕒 Horaires de livraison :</strong> $horaires</p>
            <p><strong>💳 Moyen de paiement :</strong> $paiement</p>
            <hr>
            <h3 style='color: #28a745;'>Structures choisies :</h3>
            <p style='background: #e9ffe9; padding: 10px; border-radius: 5px;'>$structures</p>
            <hr>
            <p><strong>📜 Message :</strong></p>
            <p style='background: #fff3cd; padding: 10px; border-radius: 5px;'>$messageClient</p>
            <hr>
        </div>";
} else {
    die("Données invalides.");
}

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $SMTP_USER;
    $mail->Password = $SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom($SMTP_USER, "Spooking Events");
    $mail->addAddress($SMTP_USER, "Destinataire");

    // Sécurisation des en-têtes email
    $mail->addReplyTo($email);

    // Contenu du mail
    $mail->isHTML(true);
    $mail->Subject = $mail_subject;
    $mail->Body = $mail_body;

    if ($mail->send()) {
        echo '<script type="text/javascript">
                alert("Votre message a été envoyé avec succès !");
                window.location.href = "index.php";
              </script>';
    } else {
        error_log("Erreur d'envoi: " . $mail->ErrorInfo);
        echo "Erreur lors de l'envoi du message.";
    }
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
    echo "Une erreur est survenue.";
}
?>
