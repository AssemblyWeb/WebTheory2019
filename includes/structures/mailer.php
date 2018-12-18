<?php
include_once('/includes/mailer/class.phpmailer.php');
include_once('/includes/mailer/validazione.php');

if(isset($_GET['send']) and ($_GET['send']=='1')) {

    $nome=(trim($_POST['nome']));
    $cognome=(trim($_POST['cognome']));
    $email=(trim($_POST['email']));
    $telefono=(trim($_POST['telefono']));
    $privacy=(trim($_POST['privacy']));
    $messaggio=(trim($_POST['messaggio']));

    $oggettoemail="Nuovo Messaggio Ricevuto dal form contatti Web Theory";
    $testoalternativo="Nuovo Messaggio Ricevuto dal form contatti Web Theory";

    $destinatario="erikalem87@gmail.com";
    $destinatario_nome="Web Theory";

    // INIZIO VALIDAZIONE
    $validazione = TRUE;
    $validazione_errore = "";

   	// Controllo Nome
    if ((validations_richiesto($nome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Nome<br>";
   	endif;

   	// Controllo Cognome
    if ((validations_richiesto($cognome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Cognome<br>";
   	endif;

   	// Controllo Email
    if ((validations_richiesto($email) == FALSE) or (validations_email($email) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nella Email<br>";
   	endif;

   	// Controllo Telefono
    if ((validations_richiesto($telefono) == FALSE) or (validations_numero($telefono) == FALSE) or (validations_lunghezza(3, 15, $telefono) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Telefono<br>";
   	endif;

    if ($validazione) {
	    $mail = new PHPMailer(); //chiamata per creare l'email
	    $body = "<p>Mittente: ".$nome." ".$cognome. "</p>"."<p>Numero di telefono: ".$telefono."</p>"."<p>messaggio: ".$messaggio."</p>"."<p>E-Mail: ".$email."</p>";
	    //mail->getFile("include/mails/user_reg.php");
	    //$body = eregi_replace("[\]",'',$body);
	    $mail->IsSMTP();
		// $mail->SMTPDebug = 2;

		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = 'erikalem87@gmail.com';
		$mail->Password = 'WebTheory87';

	    $mail->From       = $email;
	    $mail->FromName   = $nome." ".$cognome;
	    $mail->Subject    = $oggettoemail;
	    $mail->AltBody    = $testoalternativo;
	    $mail->MsgHTML($body);
	    // Bombolibri
	    $mail->AddAddress($destinatario, $destinatario_nome);
	    // Chi ha fatto richiesta
	    $mail->AddCC($email, $nome." ".$cognome);
	    // Erik
	    $mail->AddBCC("webmaster@webtheory.it", "WebTheory");
	    
	    $_SESSION=array();

	    if(!$mail->Send()) :
	    	echo "Mailer Error: " . $mail->ErrorInfo;
	    else :
	    	header("location:Thankyoupage.php");
	    endif;
	}
}
?>