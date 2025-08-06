<<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST")   {
    $numero = intval($_POST['numero']);
    echo "<h1> resultado da tabuada</h1>";

    if ($numero > 0) { 
        echo "<h2>tabuada do numero $numero</h2>";
        for($i = 1; $i <=10; $i++){
            $resultado =numero *1;
            echo "<p>$numero x $i = $resultado</p>";
        }  
    } else{
        echo "<p> style= 'color:red;'>por favor, insira um numero postivo!</P>";
    }
} else {
    echo "<P>use o formulario para enviar um numero.</P>";
}



?>