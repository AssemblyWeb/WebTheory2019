<?php /* ########################################## INCLUDE - INIZIO ################################################## */
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/header.php");
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/nav.php"); 
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/mailer.php");
/* ################################################ INCLUDE - FINE ################################################# */ ?>
 <div class="container">
            <div class="row">
	            <!--Contattami -->
                <div class="col-lg-12 col-sm-12">
	                <h2 class="textcenter">Contattami</h2>
                </div>
            </div>
            <div class="row textcenter rowpadding">
				<div class="col-lg-4 col-sm-12">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/contact%20mail%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blue"><a class="textalign" href="mailto:info@webtheory.it">info@webtheory.it</a></h3>
	                    
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 midlebox">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/tel%20contantc%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3><a class="textalign" href="tel:3495656479">3495656479</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="col-lg-2">
		                <img class="iconcontact" src="img/facebook%20contact%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3><a class="textalign" href="https://www.facebook.com/WebTheory.it/" target="_blank">facebook</a></h3>
                    </div>
                </div>
            </div>
            
            <div class="row textcenter">
	            <!--vieni a trovarmi -->
                <div class="col-lg-12 col-sm-12">
	                <h2>Vieni a trovarmi</h2>
	                <p> Al <a href="https://sellalab.com/"><strong class="blu">SellaLab</strong>  </a>Biella (<strong>Si riceve solo su appuntamento</strong>)</p>
                </div>
            </div>
            <div class="row textcenter rowpadding">
				<div class="col-lg-4 col-sm-12 ">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/contact%20mail%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu">Lun-Mer-Ven</h3>
	                    
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 midlebox">
	                <div class="col-lg-2">
		                <img class="iconcontact" src="img/tel%20contantc%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu">9:00 - 18:00</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="col-lg-2">
		                <img class="iconcontact" src="img/facebook%20contact%20icon@2x.png">
	                </div>
                    <div class="col-lg-10">
	                    <h3 class="blu">Via Corradino Sella, 10</h3>
                    </div>
                </div>
            </div>
			
 </div>
<div class="row">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4426.106844273936!2d8.053574643731775!3d45.57184762357122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeeac9af52f9ee53f!2sWeb+Theory+Consulenza+Informatica!5e0!3m2!1sit!2sit!4v1545081910585" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

	 <div class="container">
            <div class="row">
	            <!--Contattami -->
                <div class="col-lg-12 col-sm-12">
	                <h2 class="textcenter">Oppure scrivimi</h2>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-sm-12">
                <?php
                        	if (isset($validazione) and ($validazione == FALSE)) {
                            	echo ' <div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert">&times;</a>'.'<strong>ERRORE!</strong><br>'.' '. $validazione_errore . '</div>';
                        	}
                        ?>

                        <?php
                        if(isset($_GET['ok'])) 
                        { 
                        ?>
                            <div class="alert alert-success fade in"> 
                                <h3>Messaggio inviato con successo!</h3>
                            </div>

                        <br /><br /><br /><br /><br /><br />

						<?php }
							if(!isset($_GET['ok'])) 
							{ 
						?>

				
				<form  class="popup-form"  method="post" action="index.php?send=1">
					<h4>Nome</h4>
					<input type="text" class="form-control form-white" placeholder="Nome e Cognome" name="nome" value="<?php if (isset($nome)) echo $nome;?>">
					<h4>Email</h4>
					<input type="text" class="form-control form-white" placeholder="Indirizzo E-mail" name="email" value="<?php if (isset($email)) echo $email;?>">
					<h4>Telefono</h4>
					<input type="text" class="form-control form-white"  placeholder="Telefono" name="telefono" required="required" value="<?php if (isset($telefono)) echo $telefono;?>">
						<h4>Oggetto</h4>
					<input type="text" class="form-control form-white" placeholder="Oggetto" name="oggetto" value="<?php if (isset($oggetto)) echo $oggetto;?>">
					<div class="checkbox-holder text-left">
						<h4>Come posso aiutarti?</h4>
						 <textarea class="form-control" placeholder="testo" rows="5" id="comment" name="messaggio" value="<?php if (isset($messaggio)) echo $messaggio;?>"></textarea>
						
						<div class="checkbox">
							 <input type="checkbox" value="true" id="squaredOne" name="privacy" required="required"/>

							<label for="squaredOne"><span>Acconsento a <strong>Termini &amp; Condizioni</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Invia</button>
				</form>
				 <?php } ?>
                </div>
                <div class="col-lg-3"></div>
            </div>
	 </div>

    
  <?php /* ########################################## INCLUDE - INIZIO ################################################## */
include($_SERVER['DOCUMENT_ROOT']."/includes/structures/footer.php");
/* ################################################ INCLUDE - FINE ################################################# */ ?>