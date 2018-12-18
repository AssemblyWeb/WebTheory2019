
		     
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