<?php 
class Cart {
    public $articulos = [];

    
    function __construct($idArticulo,$cantidad) {
        $this->articulos[$idArticulo] = $cantidad;
    }
    
    public function deleteElemArticulo($idArticulo){
        unset($this->articulos[$idArticulo]);
    } 
    
    public function addArticulo($idArticulo, $cantidad){
        
        if (array_key_exists($idArticulo, $this->articulos)) {
            $this->articulos[$idArticulo] += $cantidad;
        }else{
            $this->articulos[$idArticulo] = $cantidad;
        }
    }
    
    public function deleteArticulo($idArticulo, $cantidad){
        
        if (array_key_exists($idArticulo, $this->articulos)) {
            if($cantidad > $this->articulos[$idArticulo]){
                $this->articulos[$idArticulo] = 0;
            }else{
                $this->articulos[$idArticulo] -= $cantidad;
            }
            
        }
    }
}

class ClientCart extends Cart {
    public $cliente;
    
    function __construct() {
        $this->articulos['10'] = '1';
    }
    
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    
    
}

/* Creamos un objeto de tipo Cart llamado Carro1
 * que le añadimos un articulo en el mismo Constructor.
 */
$carro1 = new Cart('Leche', 1);

/*Añadimos unos articulos nuevos*/
$carro1->addArticulo('Harina', 10);
$carro1->addArticulo('Huevos', 12);

/*Añadimos más elementos de un articulo ya existente*/
$carro1->addArticulo('Leche', 10);

/*Borramos una cantidad de un articulo existente*/
$carro1->deleteArticulo('Leche', 6);

/*Borramos un articulo existente*/
$carro1->deleteElemArticulo('Huevos');



/*Recorremos los articulos del Carro1*/
echo "Prueba del objeto CART<br>";
foreach($carro1->articulos as $idArticulo=>$cantidad){
    echo "ID: " . $idArticulo . " Cantidad: " . $cantidad;
    echo "<br>";
}

/* Creamos un objeto de tipo ClientCart
 * Que ya viene con un articulo con id 10 y cantidad 1
 */
$carroClient = new ClientCart();

// Le asignamos un cliente con el método setCliente
$carroClient->setCliente("Denis Perdomo");


/*Recorremos los articulos del carroClient
 * y podemos ver que existe dicho articulo
 */
echo "<br>Prueba del objeto CLIENTCART<br>";
foreach($carroClient->articulos as $idArticulo=>$cantidad){
    echo "ID: " . $idArticulo . " Cantidad: " . $cantidad;
    echo "<br>";
}
echo "Nombre Cliente: ".$carroClient->cliente;
?>