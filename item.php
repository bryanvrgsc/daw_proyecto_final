<?php

function item($producto_nombre, $producto_precio, $producto_imagen)
{
    $elemento = "
    
    <div class='col-lg-4 templatemo-item-col all imp'>
    <div class='meeting-item'>
        <div class='thumb'>
            <div class='price'>
                <span>$ $producto_precio </span>
            </div>
            <a href='meeting-details.html'><img src='$producto_imagen' alt=''></a>
        </div>
        <div class='down-content'>
            <a href='meeting-details.html'>
                <h4>$producto_nombre</h4>
                
                <button type='submit' class='btn btn-warning' name='agregar'> 🛒 Agregar al Carrito </button>
            </a>
            
        </div>
    </div>
</div>

    ";

    echo $elemento;
};
