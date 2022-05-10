<?php



//1
$arrayFind= array("Ç","Ü","Ï","L·L","Ñ");
$arrayReplace= array("C","U","I","LL","N");
$url_in="UÑOÜZÇJ";
$url_out=str_replace($arrayFind, $arrayReplace, $url_in);
print("<br> $url_in <br>"); print("$url_out <br>");



//2
$arrayFind= array("á","é","í","ó","ú", "ñ");
$arrayReplace= array("a","e","i","o","u","n");
$url_in="aábóné8";
$url_out=str_replace($arrayFind, $arrayReplace, $url_in);
print("<br> $url_in <br>"); print("$url_out <br>");



//3



//Expreciones Regulares
//replace vowels with *
$url_in = "La vida de un estudiante de 2DAW es super divertida";
$url_out = preg_replace("/[aeiou]/", "*", $url_in);
print("<br> $url_in <br>"); print("$url_out <br>");



$url_in = "1234567";
$pattern = "/^[[:digit:]]+$/";



if (preg_match($pattern, $url_in)){
print "<p>$url_in son sólo números.</p>\n";
}else{
print "<p>$url_in No son sólo números.</p>\n";
}



$url_in="abcdefAZg";
$pattern1 = "/^[a-z]+$/";
$pattern2 = "/^[a-z]+$/i";
if (preg_match($pattern1, $url_in)) {
print "<p>$url_in son sólo letras.</p>\n";
}else{
print "<p>$url_in No son sólo letras.</p>\n";
}



if (preg_match($pattern2, $url_in)) {
print "<p>$url_in son sólo letras.</p>\n";
}else{
print "<p>$url_in No son sólo letras.</p>\n";
}
?>