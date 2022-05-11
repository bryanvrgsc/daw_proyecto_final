<?php

function item($producto_nombre, $producto_precio, $producto_imagen, $producto_id)
{
    $elemento = "

    <div class='col-lg-4 templatemo-item-col all imp'>
    <div class='meeting-item'>
        <div class='thumb'>
            <div class='price'>
                <span>$ $producto_precio </span>
            </div>
            <img src='data:image/jpg;base64,$producto_imagen' alt='Red dot' />
        </div>
        <div class='down-content'>
            <h4>$producto_nombre</h4>
            <form action='tienda_session.php' method='post'>
                <button type='submit' class='btn btn-warning' name='agregar'> 🛒 Agregar al Carrito </button>
                <input type='hidden' name='producto_id' value='$producto_id'>
            </form>
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
        item($row['nombre'], $row['precio'], $row['imagen_principal'], $row['id_producto']);
    }
}
