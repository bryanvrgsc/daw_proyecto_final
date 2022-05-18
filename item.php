<?php

function item($producto_nombre, $producto_precio, $producto_imagen, $producto_id)
{
    $elemento = "

    <div class='col-lg-4 templatemo-item-col all imp'>
    <div class='meeting-item'>
        <div class='thumb'>
            <div class='price'>
                <span>$$producto_precio</span>
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

function carrito($producto_nombre, $producto_precio, $producto_imagen, $producto_id, $cantidad)
{
    $carrito = "
    
    
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
                    <!-- <button type='submit' class='btn btn-warning'>Guardar para despues</button> -->
                    <form action='carrito.php' method='post'>
                        <button type='submit' class='btn btn-danger mx-2' name='borrar'>Eliminar</button>
                        <input type='hidden' name='producto_id' value='$producto_id'>
                    </form>
                </div>
                <div class='col-md-3 py-5'>
                    <div>
                    <form action='' method='post'>
                        <button type='submit' class='btn bg-light border rounded-circle' name='aumentar'> <i class='fa fa-plus' aria-hidden='true'></i> </button>
                        <input type='hidden' name='producto_id' value='$producto_id'>
                        <input type='hidden' name='cantidad' value='$cantidad'>
                    </form>
                    <form action='' method='post'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-lg'>
                                    <input type='text' name='cantidad' value='$cantidad' class='form-control w-26'>
                                    <input type='hidden' name='producto_id' value='$producto_id'>
                                </div>
                                <div class='col'>
                                <button type='submit' class='btn btn-warning' name='actualizar'>Actualizar</button>
                                </div>
                            </div>
                        </div> 
                    </form> 
                    <form action='' method='post'>    
                        <button type='submit' class='btn bg-light border rounded-circle' name='disminuir'> <i class='fa fa-minus' aria-hidden='true'></i> </button>
                        <input type='hidden' name='cantidad' value='$cantidad'>
                        <input type='hidden' name='producto_id' value='$producto_id'>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    

    ";

    echo $carrito;
}

function listacarrito($producto_nombre, $producto_precio, $producto_imagen, $producto_id, $cantidad)
{

    $listacarrito = "

    <div class='p-3 mb-2 bg-white text-dark'>
        <div class='container'>
        <div class='row'>
        <div class='col-2'>
            <img src='data:image/jpg;base64,$producto_imagen' alt='$producto_nombre' />
        </div>
        <div class='col'>
        <div class='fw-bold'>$producto_nombre</div>
        <div class='fw-bold'>$$producto_precio</div>
        </div>
        <div class='col'>
            <span class='badge bg-primary rounded-pill'>$cantidad</span>
        </div>
        </div>
        </div> 
    </div>   

    ";

    echo $listacarrito;
}

function listausuario($nombre, $email, $fecha_nacimiento, $datos_bancarios)
{

    $listacarrito = "

    <div class='p-3 mb-2 bg-white text-dark'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                    Nombre
                </div>
                <div class='col'>
                    $nombre
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Email
                </div>
                <div class='col'>
                    $email
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Fecha de Nacimiento
                </div>
                <div class='col'>
                    $fecha_nacimiento
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Datos bancarios
                </div>
                <div class='col'>
                    $datos_bancarios
                </div>
            </div>
        </div>
    </div>   

    ";

    echo $listacarrito;
}

function listaproductos($id_producto, $nombre, $precio, $imagen_principal, $cantidad, $fabricante, $origen)
{

    $listacarrito = "

    <div class='p-3 mb-2 bg-white text-dark'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                    Imagen principal
                </div>
                <div class='col'>
                    <div class='col-2'>
                    <img src='data:image/jpg;base64,$imagen_principal' alt='$nombre' />
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    ID Producto
                </div>
                <div class='col'>
                    $id_producto
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Nombre
                </div>
                <div class='col'>
                    $nombre
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Precio
                </div>
                <div class='col'>
                    $precio
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Cantidad en Almacén
                </div>
                <div class='col'>
                    $cantidad
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Fabricante
                </div>
                <div class='col'>
                    $fabricante
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Origen
                </div>
                <div class='col'>
                    $origen
                </div>
            </div>
        </div>
    </div>   

    ";

    echo $listacarrito;
}

function listaordenes($id_orden, $id_producto, $id_usuario, $fecha_compra, $cantidad)
{

    $listacarrito = "

    <div class='p-3 mb-2 bg-white text-dark'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                    ID Orden
                </div>
                <div class='col'>
                    $id_orden
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    ID Producto
                </div>
                <div class='col'>
                    $id_producto
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    ID Usuario
                </div>
                <div class='col'>
                    $id_usuario
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Fecha de Compra
                </div>
                <div class='col'>
                    $fecha_compra
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    Cantidad de producto
                </div>
                <div class='col'>
                    $cantidad
                </div>
            </div>
        </div>
    </div>   

    ";

    echo $listacarrito;
}
