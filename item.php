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
            <img src='data:image/jpg;base64,$producto_imagen' alt='$producto_nombre' />
        </div>
        <div class='down-content'>
            <h4>$producto_nombre</h4>
            <form action='tienda_session.php' method='post'>
                <button type='submit' class='btn btn-warning' name='agregar'>  Agregar al Carrito <i class='fa fa-shopping-cart' aria-hidden='true'></i> </button>
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

function carrito($producto_nombre, $producto_precio, $producto_imagen, $producto_id)
{
    $carrito = "
    
    <form action='cart.php?action=remove&id=$producto_id' method='post' class='cart-items'>
        <div class='border rounded'>
            <div class='row bg-white'>
                <div class='col-md-4'>
                <img src='data:image/jpg;base64,$producto_imagen' alt='$producto_nombre' />
                </div>
                <div class='col-md-5'>
                    <h5 class='pt-2'>$producto_nombre</h5>
                    <br>
                    <h5 class='pt-2'>$$producto_precio</h5>
                    <br>
                    <button type='submit' class='btn btn-warning'>Guardar para despues</button>
                    <button type='submit' class='btn btn-danger mx-2' name='remove'>Remover</button>
                </div>
                <div class='col-md-3 py-5'>
                    <div>
                        <button type='button' class='btn bg-light border rounded-circle'> <i class='fa fa-plus' aria-hidden='true'></i> </button>
                        <input type='text' value='1' class='form-control w-25'>
                        <button type='button' class='btn bg-light border rounded-circle'> <i class='fa fa-minus' aria-hidden='true'></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    ";

    echo $carrito;
}
