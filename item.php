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
            <a href='meeting-details.html'><img src='data:image/jpg;base64,$producto_imagen' alt='Red dot' />
            
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

function getdata()
{
    $con = mysqli_connect("localhost", "a00348428", "p0348428_Rockeilo", "cafe");
    $sql = "SELECT * FROM producto;";

    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        item($row['nombre'], $row['precio'], $row['imagen_principal']);
        echo "<br>";
    }
}
