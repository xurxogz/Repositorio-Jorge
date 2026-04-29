<?php

/**
 * Clase que representa un producto dentro del inventario.
 * * Permite gestionar la información básica de los artículos y 
 * realizar operaciones de venta controlando el stock.
 */
class Producto {
    
    /** @var string El nombre del producto */
    public string $nombre;

    /** @var float El precio unitario del producto */
    public float $precio;

    /** @var int Cantidad de unidades disponibles en almacén */
    private int $stock;

    /**
     * Constructor de la clase Producto.
     *
     * @param string $nombre Nombre descriptivo.
     * @param float $precio Valor monetario.
     * @param int $stock Cantidad inicial disponible.
     */
    public function __construct(string $nombre, float $precio, int $stock) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    /**
     * Obtiene una cadena de texto con la información detallada del producto.
     *
     * @return string Resumen del producto, precio y stock actual.
     */
    public function obtenerDetalles(): string {
        return "Producto: {$this->nombre} | Precio: {$this->precio} | Stock: {$this->stock}";
    }

    /**
     * Registra la venta de un producto y reduce el stock.
     *
     * @param int $cantidad Número de unidades a vender.
     * @return void
     */
    public function vender(int $cantidad): void {
        if ($cantidad <= $this->stock) {
            $this->stock -= $cantidad;
            echo "Venta realizada: $cantidad {$this->nombre}(s).<br>";
        } else {
            echo "Error: Stock insuficiente para {$this->nombre}.<br>";
        }
    }
}

/**
 * Ejecución del programa
 */
$producto1 = new Producto("Laptop", 1200.50, 10);
$producto2 = new Producto("Mouse", 25.99, 50);

echo $producto1->obtenerDetalles() . "<br>";
echo $producto2->obtenerDetalles() . "<br>";

echo "<hr>";

$producto1->vender(2);
$producto1->vender(10);
echo $producto1->obtenerDetalles() . "<br>";

?>