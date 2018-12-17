<?php
include_once('include/class.phpmailer.php');
include_once('include/validazione.php');

if(isset($_GET['send']) and ($_GET['send']=='1')) {

    $nome=(trim($_POST['nome']));
    $email=(trim($_POST['email']));
    $telefono=(trim($_POST['telefono']));
    $messaggio=(trim($_POST['messaggio']));
    $privacy=(trim($_POST['privacy']));
    
    $oggettoemail="Richiesta Info Form NetBi";
    $testoalternativo="Richiesta Info Form NetBi";
    
    $destinatario="info@webtheory.it";
    $destinatario_nome="Web Theory";
    
    // INIZIO VALIDAZIONE
    $validazione = TRUE;
    $validazione_errore = "";

   	// Controllo Nome
    if ((validations_richiesto($nome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Nome<br>";
   	endif;

   	// Controllo Email
    if ((validations_richiesto($email) == FALSE) or (validations_email($email) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nella Email<br>";
   	endif;

 	// Controllo Telefono
    if ((validations_richiesto($telefono) == FALSE) or (validations_numero($telefono) == FALSE) or (validations_lunghezza(3, 15, $telefono) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Telefono, inserisci un numero di telefono valido<br>";
   	endif;

	//Controllo privacy
	if ((validations_richiesto($privacy) == FALSE)) :
		$validazione = FALSE;
		$validazione_errore .= "Accetta le condizioni della privacy per proseguire.<br>";
	endif;
		
   if ($validazione) {
	    $mail = new PHPMailer(); //chiamata per creare l'email
	    $body = "
	    	<p>Mittente: ".$nome." </p>
	    	<p>Numero di telefono: ".$telefono."</p>
	    	<p>Messaggio: ".$messaggio."</p>
	    	<p>E-Mail: ".$email."</p>
	    	";
	    $mail->From       = $email;
	    $mail->FromName   = $nome;
	    $mail->Subject    = $oggettoemail;
	    $mail->AltBody    = $testoalternativo;
	    $mail->MsgHTML($body);
	    // NetBi
	    $mail->AddAddress($destinatario, $destinatario_nome);
	    // Chi ha fatto richiesta
	    $mail->AddCC($email, $nome);
	    // Web Theory
	   
	    
	    $_SESSION=array();
	    
	    if(!$mail->Send()) :
	    	echo "Mailer Error: " . $mail->ErrorInfo; 
	    else :
	    	 echo "<script type='text/javascript'>alert('iscrizione avvenuta correttamente!')</script>";
	    endif;
	}
}
?>
