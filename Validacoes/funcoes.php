<?php

function isNumeric($string){
	if (!filter_var($string, FILTER_VALIDATE_INT)) 
        return false;
    else
        return true;
}

function isFloat($string){
	if (!filter_var($string, FILTER_VALIDATE_FLOAT)) 
        return false;
    else
        return true;
}

function isBoolean($string){
	if (!filter_var($string, FILTER_VALIDATE_BOOLEAN)) 
        return false;
    else
        return true;
}

function isValidIP($string) {
    if (!filter_var($string, FILTER_VALIDATE_IP)) 
        return false;
    else
        return true;
}

function isValidUrl($string) {
    if (!filter_var($string, FILTER_VALIDATE_URL)) 
        return false;
    else
        return true;
}

function isValidEmail($string) {
    if (!filter_var($string, FILTER_VALIDATE_EMAIL)) 
        return false;
    else
        return true;
}

function isEqual($string1, $string2){
    if ($string2 != $string1)
        return false;
    else
        return true;
}

/*  Se $STRING é válida sem números mas com ~, ^. */
function isValidName($string){
    if (!preg_match('/^[A-ZÀ-Ÿ][A-zÀ-ÿ\'.]+\s([A-zÀ-ÿ\'.]\s?)*[A-ZÀ-Ÿ.][A-zÀ-ÿ\'.]+$/', $string))
        return false;
    else
        return true;
}

/*  IS A DINAMIC FUNCTION, GET THE SIZE OF STRING AND IF IS BIGGER THAN 7, APPLY THE MOST 
RULES FOR SECURE PASSWORD. MINIMUM 8 CHARACTER, AT LAST 1 ESPECIAL, 1 UPPER C. AND 1 LOWER. */
function isSecurePass($string){
	if (strlen($string) > 7)
		if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{'.strlen($string).'}$/', $string)) 
			return false;
		else 
			return true;
	else
		return false;
}

function isPrice($string){
	if (!preg_match('/^([1-9]\d{0,2})?(\.\d{3})*,\d{2}$/', $string))
        return false;
    else
        return true;
}

/*  Checar se string é CPF ou CPNJ com ou sem ontuação */
function isValidCPForCNPJ($string){
    if (!preg_match('/^([0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}|[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/', $string))
        return false;
    else
        return true;
}

/*  Checar se string é data válida no formato 03/06/2020 */
function isDate($string){
    if (!preg_match('/^([0-9]{2}\/[0-9]{2}\/[0-9]{4})$/', $string))
      return false;
    else
      return true;
}

/*  Checar se string é CPF ou CPNJ com ou sem ontuação */
function isCPForCNPJ($string){
    $string = preg_replace('/[^0-9]/', '', $valor);
    if (strlen($string) == 11)
    {
        $result->cpf = $valor;
    }
    elseif (strlen($string) == 14)
    {
        $result->cnpj = $valor;
    }
}

/*  Checar se uma string é uma chave válida com 40 carcteres */
function isValidKey($string) {
    $string = strip_tags($string);
    if(strlen($string) != 40 AND !preg_match("/^.[a-z0-9]+$/", $string))
      return false;
    else
      return true;
}

/*  Checar se um número é float entre 1 e 5 com intervalos de 0.5 */
function isValidAvaliateStar($string){
    if (!preg_match('/^[1,2,3,4,5]{1}\.[0|5]{1}$/', $string))
        return false;
    else
        return true;
}

function isValidDate($string){
    if (!preg_match('/^(19[0-9]{2}|2[0-9]{3})\-(0[1-9]|1[0-2])\-(0[1-9]|1[0-9]|2[0-9]|3[0-1])((T|\s)(0[0-9]{1}|1[0-9]{1}|2[0-3]{1})\:(0[0-9]{1}|1[0-9]{1}|2[0-9]{1}|3[0-9]{1}|4[0-9]{1}|5[0-9]{1})\:(0[0-9]{1}|1[0-9]{1}|2[0-9]{1}|3[0-9]{1}|4[0-9]{1}|5[0-9]{1})((\+|\.)[\d+]{4,8})?)?$/', $string))
        return false;
    else
        return true;
}

function isValidCredCard($string) {
    // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
    $string=preg_replace('/\D/', '', $string);
  
    // Set the string length and parity
    $number_length=strlen($string);
    $parity=$number_length % 2;
  
    // Loop through each digit and do the maths
    $total=0;
    for ($i=0; $i<$number_length; $i++) {
      $digit=$string[$i];
      // Multiply alternate digits by two
      if ($i % 2 == $parity) {
        $digit*=2;
        // If the sum is two digits, add them together (in effect)
        if ($digit > 9) {
          $digit-=9;
        }
      }
      // Total up the digits
      $total+=$digit;
    }

    // If the total mod 10 equals 0, the number is valid
    return ($total % 10 == 0) ? TRUE : FALSE;
}

// $str = '.123ab-c34ABz~^';

function soNumeros($str) {
    // Dica de um colega do grupo PHP Brasil - 
    return preg_replace("/[^0-9]/", "", $str);
}

function soMinusculas($str) {
    return preg_replace("/[^a-z]/", "", $str);
}

function soMaiusculas($str) {
    return preg_replace("/[^A-Z]/", "", $str);
}

function soAlfaNumericos($str) {
    return preg_replace("/[^A-Za-z0-9]/", "", $str);
}

function soSimbolos($str){
    return preg_replace("/[^-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/", "", $str);
}

function soSimbolos2($str){
    return preg_replace("/[\W\S]/", "", $str);
}

//print soSimbolos($str);


