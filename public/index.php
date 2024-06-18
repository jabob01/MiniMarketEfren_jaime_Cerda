<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información de productos</title>
    <link href="./css/tailwind.css" rel="stylesheet">
</head>
<body class=" flex items-center justify-center min-h-screen">
    <div class="bg-blue-600 rounded-lg shadow-md p-8 flex flex-wrap">
        <div class="w-full md:w-1/2 p-4">
            <h2 class="text-4xl mb-6 text-center text-gray-800 font-bold">Información de productos</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="space-y-4" id="miFormulario">
                <div>
                    <label for="name" class="block text-gray-700">Nombre del producto</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                </div>
                <div>
                    <label for="price" class="block text-gray-700">Precio por unidad</label>
                    <input type="number" step="0.01" id="price" name="price" class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700">Cantidad en inventario</label>
                    <input type="number" id="quantity" name="quantity" class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                </div>
                
                <button type="submit" class="w-full bg-pink-500 text-white p-2 rounded-lg hover:bg-pink-600 transition duration-300">Ingresar</button>
            </form>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['name'];
            $precio = $_POST['price'];
            $cantidad = $_POST['quantity'];

            $producto = array(
                'Nombre' => $nombre,
                'Precio por unidad' => $precio,
                'Cantidad en inventario' => $cantidad
            );

            // Verificar si la función ya existe
            if (!function_exists('calcularValores')) {
                function calcularValores($producto) {
                    $producto['Valor total'] = $producto['Precio por unidad'] * $producto['Cantidad en inventario'];
                    $producto['Estado'] = $producto['Cantidad en inventario'] == 0 ? 'Agotado' : 'En stock';
                    return $producto;
                }
            }

            $producto = calcularValores($producto);
            ?>
            <div class="w-full md:w-1/2 p-4">
                <h3 class="text-2xl mb-4 text-center text-gray-800 font-bold">Información del Producto</h3>
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4">Nombre del producto</th>
                            <th class="py-2 px-4">Precio por unidad</th>
                            <th class="py-2 px-4">Cantidad en inventario</th>
                            <th class="py-2 px-4">Valor total</th>
                            <th class="py-2 px-4">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($producto['Nombre']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($producto['Precio por unidad']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($producto['Cantidad en inventario']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($producto['Valor total']); ?></td>
                            <td class="py-2 px-4"><?php echo htmlspecialchars($producto['Estado']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
        
    </div>
</body>
<script src="main.js"></script>
</html>

<?php
// Verificar si la función ya existe
if (!function_exists('calcularValores')) {
    function calcularValores($producto) {
        $producto['Valor total'] = $producto['Precio por unidad'] * $producto['Cantidad en inventario'];
        $producto['Estado'] = $producto['Cantidad en inventario'] == 0 ? 'Agotado' : 'En stock';
        return $producto;
    }
}
?>
