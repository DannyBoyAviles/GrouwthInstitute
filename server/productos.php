<?php
function operaciones($producto)
{
    $precioMax = 70;
    $precioMed = 60;
    $precioMin = 50;

    if ($producto <= 10) {
        $total = $producto*$precioMax;
        return $total;
        #echo $total;
    } elseif ($producto <= 20) {
        $total = $producto*$precioMed;
        return $total;
        #echo $total;
    } elseif ($producto >= 21) {
        $total = $producto*$precioMin;
        return $total;
        #echo $total;
    }
}

?>