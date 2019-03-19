<?php
include_once('include/class.phpmailer.php');
include_once('include/validazione.php');

if(isset($_GET['send']) and ($_GET['send']=='1')) {

    $mittente=(trim($_POST['email']));
    $nome=(trim($_POST['nome']));
    $cognome=(trim($_POST['cognome']));
    $nomemittente=($cognome.' '.$nome);
    $telefono=(trim($_POST['telefono']));
    $oggettoemail="Nuovo Messaggio Ricevuto dal form Contatti WebTheory";
    $testoalternativo="Nuovo Messaggio Ricevuto da Sito WebTheory";
    $destinatario="info@webtheory.it";
    $messaggio=(trim($_POST['text']));

    // INIZIO VALIDAZIONE
    $validazione = TRUE;
    $validazione_errore = "";

   

   	// Controllo Nome
    if ((validations_richiesto($nome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Nome<br>";
   	endif;

 // Controllo Email
    if ((validations_richiesto($mittente) == FALSE) or (validations_email($mittente) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nella Email<br>";
   	endif;

   	// Controllo Cognome
    if ((validations_richiesto($cognome) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Cognome<br>";
   	endif;

   	// Controllo Messaggio
    if ((validations_richiesto($messaggio) == FALSE) or (validations_lunghezza(3, 600, $messaggio) == FALSE)) :
    	$validazione = FALSE;
    	$validazione_errore .= "Errore nel Messaggio<br>";
   	endif;


    if ($validazione) {
	    $mail             = new PHPMailer(); //chiamata per creare l'email
	    $body             = "<p>Mittente: ".$nomemittente. "</p>"."<p>Numero di telefono: ".$telefono."<p>Messaggio: ".$messaggio."</p>"; 
	    //mail->getFile("include/mails/user_reg.php"); 
	    //$body             = eregi_replace("[\]",'',$body);
	    $mail->From       = $mittente;
	    $mail->FromName   = $nomemittente;
	    $mail->Subject    = $oggettoemail;
	    $mail->AltBody    = $testoalternativo;
	    $mail->MsgHTML($body);
	    $mail->AddAddress($destinatario, "WebTheory");
	    //$mail->AddAttachment("images/phpmailer.gif"); 
	    $_SESSION=array();
	    if(!$mail->Send()) { echo "Mailer Error: " . $mail->ErrorInfo; } 
	    else { header("location:contact.php?ok=1"); }
	}
}
?>

		     
		            <?php
                        if (isset($validazione) and ($validazione == FALSE)) {
                            echo ' <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>'.'<strong>ERRORE!</strong><br>'.' '. $validazione_errore . '</div>';
                        }
                        ?>

                        <?php
                        if(isset($_GET['ok'])) { ?>
                            <div class="alert alert-success fade in">
                                <a href="Thankyoupage.php" class="close" data-dismiss="alert">&times;</a>
                                <h3>Messaggio inviato con successo!</h3>
                            </div>

                        <br /><br /><br /><br /><br /><br />

                <?php }
                if(!isset($_GET['ok'])) { ?>

				
				<form  class="popup-form"  method="post" action="form.php?send=1">
					<h4>Come ti chiamo quando ti saluterò per risponderti?</h4>
					<input type="text" class="form-control form-white" placeholder="Nome e Cognome" name="nome" value="<?php if (isset($nome)) echo $nome;?>">
					<h4>A quale email posso scriverti?</h4>
					<input type="text" class="form-control form-white" placeholder="Indirizzo E-mail" name="email" value="<?php if (isset($email)) echo $email;?>">
					<h4>A quale numero di telefono posso telefonarti?</h4>
					<input type="text" class="form-control form-white"  placeholder="Telefono" name="telefono" required="required" value="<?php if (isset($telefono)) echo $telefono;?>">
					<div class="checkbox-holder text-left">
						<h4>Come posso aiutarti?</h4>
						 <textarea class="form-control" placeholder="testo" rows="5" id="comment" name="messaggio" value="<?php if (isset($messaggio)) echo $messaggio;?>"></textarea>
						
						<div class="checkbox col-lg-12 ">
							 <div class="col-lg-12">
							 	<input type="checkbox" value="true" id="squaredOne" name="privacy" required="required"/>

							 	<label for="squaredOne"><span>Ho letto e acconsento a <strong>Termini &amp; Condizioni</strong></span></label>
							 	</div>
						</div>
					</div>
					  <button type="submit" class="btn btn-default btn-wt" value="Send" style="margin-top: 10px;">Invia</button>
				</form>
				 <?php } ?>