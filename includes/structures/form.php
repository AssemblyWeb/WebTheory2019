<?php
include_once('includes/mailer/class.phpmailer.php');
include_once('includes/mailer/validazione.php');

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

				
				<form  class="popup-form"  method="post" action="index.php?send=1">
					<h4>Nome</h4>
					<input type="text" class="form-control form-white" placeholder="Nome e Cognome" name="nome" value="<?php if (isset($nome)) echo $nome;?>">
					<h4>Email</h4>
					<input type="text" class="form-control form-white" placeholder="Indirizzo E-mail" name="email" value="<?php if (isset($email)) echo $email;?>">
					<h4>Telefono</h4>
					<input type="text" class="form-control form-white"  placeholder="Telefono" name="telefono" required="required" value="<?php if (isset($telefono)) echo $telefono;?>">
					<div class="checkbox-holder text-left">
						<h4>Come posso aiutarti?</h4>
						 <textarea class="form-control" placeholder="testo" rows="5" id="comment" name="messaggio" value="<?php if (isset($messaggio)) echo $messaggio;?>"></textarea>
						
						<div class="checkbox col-lg-12 ">
							 <div class="col-lg-12">
							 	<input type="checkbox" value="true" id="squaredOne" name="privacy" required="required"/>

							 	<label for="squaredOne"><span>Acconsento a <strong>Termini &amp; Condizioni</strong></span></label>
							 	</div>
						</div>
					</div>
					  <button type="submit" class="btn btn-default btn-wt" value="Send" style="margin-top: 10px;">Invia</button>
				</form>
				 <?php } ?>