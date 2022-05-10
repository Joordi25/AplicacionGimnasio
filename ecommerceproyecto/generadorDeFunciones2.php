<?php



class MyClass {
function function1DeMyClass($arg1, $arg2) {
echo __METHOD__, " ha recibido $arg1 y $arg2<br>";
}
function function2DeMyClass($arg1, $arg2) {
echo __METHOD__, " ha recibido $arg1, $arg2<br>";
}
}



echo "<br><br> Llamar al método function1MyClass de la clase MyClass() con 2 argumentos<br>";
$classObject = new MyClass();
call_user_func_array(array($classObject, "function1DeMyClass"), array("cuatro","cinco"));
?>