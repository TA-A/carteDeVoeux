<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Contact.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    
</head>
<body>
    <p>Bonjour</p>

    <?php print_r($_POST); ?>

    <?php
        echo $_POST["prenom"];
    ?>

    <?php
        echo $_POST["nom"];
    ?>

    <?php
        echo $_POST["email"];
    ?>

    <?php
        echo $_POST["objet"];
    ?>

    <?php
        echo $_POST["message"];
    ?>


    <?php
    function sanityze_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    
    $mail_from = "Carte de voeux";
    $to_email = $_POST ["email"];
    $subject = $_POST["objet"];
    $message = $_POST["message"];
    $noel =
    "<html>
    <body>
    <img src='https://thecleaureliea.promo-24.codeur.online/cartedevoeuxnoel'>
    </body>
    </html>";
    
    $header="MIME-Version: 1.0\r\n";
    $headers = "From: Carte de voeux $mail_from";
    $header.='Content-Type:text/html; charset="utf-8"'."/n";
    $header.='Content-Transfer-Encoding: 8bit';

    //check if the email address is invalid $secure_check
    $secure_check = sanityze_my_email($to_email);
    if ($secure_check == false) {
        echo "Formulaire non valide";
    } else { //envoi du mail
        mail($to_email,$subject,$message,$noel,$headers);
        echo " Votre message à bien été envoyer";
        echo $noel;
    }
        

    define(
        'EMAIL_MATCHER',
        '/^[^@\s]+\@(\[?)([-\w]+\.)+([a-zA-Z]{2,6}|[0-9]{1,3})(\]?)$/'
    );
    if(!preg_match(EMAIL_MATCHER,$to_email))
    {
        $messagenotvalid = "The address you entered for yourself" . "does not appear to be valid. You entered" . $email_from . "text";
        $errors[] = $messagenotvalid;
    }

    if($_POST["nom"] == '')
    {
        $errors[] = "Entrez votre nom.";
    }

    if(!preg_match("/^[a-zA-Z ']$/" , $_POST["nom"]))
    {
        $messagenotvalid = "Votre nom ne peut contenir que des lettres, des espaces et des apostrophes.";
        $errors[] = $messagenotvalid;
    }

    if(strlen($_POST["nom"]) > 25)
    {
        $errors[] = "Votre nom ne doit pas dépasser 25 caractères.";
    }

    if(strlen($message) >200)
    {
        $messagenotvalid = "Vous pouvez utilisez seulement 200 caractère pour le message, cette restriction est une prévention contre les spams.";
        $errors[] = $messagenotvalid;
    }
    if (count($errors) >0)
    {
        echo "Merci pour votre envoi, néanmoins, nous avons rencontrer les erreurs suivantes:"; 
        echo implode('&lt;br&gt;',$errors);
        echo "Veuiller retournez vers la page contact et essayer encore.";
    }
    else
    {
        if (mail($to_email,$subject,$message,$headers))
        {
            echo "Votre message à bien été envoyé";
        }
        else
        {
            echo "Oups. Un bug empêche l'envoi du message à $to_email.";
        }
    }
    
    ?>