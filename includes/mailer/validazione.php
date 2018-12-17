<?php
/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di controllo esistenza VALORE
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_richiesto($valore)
|-----PARAMETRI------------------------------------------------------------------------------------
| $valore: Passo il valore da controllare
|-------------------------------------------------------------------------------------------------*/ 
function validations_richiesto($valore)
	{
	// Controlla l'esistenza del VALORE
	if ((isset($valore)) and
		($valore != "") and
		($valore != NULL)
		) :
		// Il VALORE esiste
		return TRUE;
	else :
		// Il VALORE non esiste
	    return FALSE;
	endif;
	}


// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione LUNGHEZZA stringa
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_lunghezza($minima, $massima, $stringa)
|-----PARAMETRI------------------------------------------------------------------------------------
| $minima: Lunghezza minima della stringa da validare
| $massima: Lunghezza massima della stringa da validare
| $stringa: Passo la stringa da validare
|-------------------------------------------------------------------------------------------------*/ 
function validations_lunghezza($minima, $massima, $stringa)
	{
	// Controlla la validità della EMAIL inserita
	$lunghezza = strlen($stringa);
	if (($lunghezza >= $minima) and ($lunghezza <= $massima)
		) :
		// La LUNGHEZZA è valida
		return TRUE;
	else :
		// La LUNGHEZZA non è valida
	    return FALSE;
	endif;
	}


// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione EMAIL
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_email($email)
|-----PARAMETRI------------------------------------------------------------------------------------
| $email: Passo la stringa da validare
|-------------------------------------------------------------------------------------------------*/ 
function validations_email($email)
	{
	// Controlla la validità della EMAIL inserita
	$condizione = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	if ((preg_match($condizione, $email))
		) :
		// La EMAIL è valida
		return TRUE;
	else :
		// La EMAIL non è valida
	    return FALSE;
	endif;
	}


// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione PASSWORD
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_password($password1, $password2)
|-----PARAMETRI------------------------------------------------------------------------------------
| $password1: Prima password da convalidare
| $password2: Seconda password da convalidare
|-------------------------------------------------------------------------------------------------*/ 
function validations_password($password1, $password2)
	{
	// Controlla la prima PASSWORD
	// 1) deve avere almeno 1 numero (?=.*[0-9])
	// 2) deve avere almeno 1 lettera (?=.*[a-zA-Z])
	// 3) deve essera da 6 a 12 caratteri di lunghezza {6,12}
	// $condizione = "/((?=.*[0-9])(?=.*[a-zA-Z]).{6,12})/";
	// if ((preg_match($condizione, $password1)) and
		// (preg_match($condizione, $password2))
		// ) :
		// Controllo le password inserite
		if ($password1 == $password2) :
			// Le password sono UGUALI e rispettano i criteri
			return TRUE;
		else :
			// Le password sono DIVERSE
			return FALSE;
		endif;
	// else :
		// La password inserita non corrisponde ai criteri base
	   // return FALSE;
	//endif;
	}


// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione STRINGA
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_stringa($stringa)
|-----PARAMETRI------------------------------------------------------------------------------------
| $stringa: Stringa da convalidare
|-------------------------------------------------------------------------------------------------*/ 
function validations_stringa($stringa)
	{
	// Controlla la presenza di soli CARATTERI
	$condizione = "/^[a-zA-Z]+$/";
	if ((preg_match($condizione, $stringa))
		) :
		// La stringa è fatta di soli CARATTERI
		return TRUE;
	else :
		// La stringa non è di soli CARATTERI
	    return FALSE;
	endif;
	}


// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione NUMERO
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_numero($numero)
|-----PARAMETRI------------------------------------------------------------------------------------
| $numero: Numero da convalidare
|-------------------------------------------------------------------------------------------------*/ 
function validations_numero($numero)
	{
	// Controlla la presenza di soli NUMERI
	$condizione = "/^[0-9]+$/";
	if ((preg_match($condizione, $numero))
		) :
		// La stringa è fatta di soli NUMERI
		return TRUE;
	else :
		// La stringa non è di soli NUMERI
	    return FALSE;
	endif;
	}

	
// *********************************************************************************************************


/*--------------------------------------------------------------------------------------------------
| VALIDATIONS - Funzione di validazione NUMERO
|-----FUNZIONE--------------------------------------------------------------------------------------
| validations_numero($numero)
|-----PARAMETRI------------------------------------------------------------------------------------
| $numero: Numero da convalidare
|-------------------------------------------------------------------------------------------------*/ 
function validations_anno($min, $max, $anno)
	{
	
		if(( $anno >= $min) and ($anno<=$max )) :
		// La stringa è fatta di soli NUMERI
		return TRUE;
	else :
		// La stringa non è di soli NUMERI
	    return FALSE;
	endif;
	}
	?>