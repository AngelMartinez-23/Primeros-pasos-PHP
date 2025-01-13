<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Nombres</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e3f2fd; /* Fondo azul claro */
            color: #1a237e; /* Azul oscuro para el texto */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #0d47a1; /* Azul intenso */
            text-align: center;
            margin-bottom: 10px;
        }

        /* Formulario */
        form {
            background-color: #ffffff; /* Blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #90caf9; /* Azul claro */
            border-radius: 5px;
            font-size: 14px;
        }

        input[type="text"]:focus {
            border-color: #0d47a1; /* Azul intenso al enfocar */
            outline: none;
        }

        button {
            background-color: #1e88e5; /* Azul brillante */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1565c0; /* Azul más oscuro al pasar el mouse */
        }

        hr {
            border: none;
            border-top: 1px solid #bbdefb; /* Azul muy claro */
            margin: 20px 0;
            width: 90%;
        }

        /* Resultados */
        .resultados {
            margin-top: 20px;
            text-align: center;
        }

        .resultados ul {
            list-style: none;
            padding: 0;
        }

        .resultados li {
            background-color: #bbdefb; /* Fondo azul claro */
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .resultados p {
            color: #1a237e; /* Azul oscuro */
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Buscar Nombres</h1>

    <!-- Formulario para ingresar la cadena -->
    <form method="GET" action="">
        <label for="cadena">Ingresa la cadena a buscar:</label>
        <input type="text" id="cadena" name="cadena" placeholder="Ej: Alejandro" required>
        <button type="submit">Buscar</button>
    </form>

    <hr>

    <div class="resultados">
        <?php
        $nombres = [
            "Yeray Almoguera González",  "Álvaro Caro Fernández", "Carlos Cordero Moreno", 
            "Alejandro Díaz Barea", "Santiago Domínguez Gómez", "Lucía Espinosa Sánchez", 
            "Alejandro González Benítez", "Víctor Jiménez Corada", "Ángel Martínez Sánchez", 
            "Pablo Olvera Colino", "Gonzalo Pulido Sánchez", "Francisco Javier Rodríguez Acosta", 
            "Nicolás Ruiz Ruiz", "Félix Sánchez González", "Alejandro Seoane Martínez", 
            "Rafael Tocino Batista", "Israel Valderrama García", "Isaac Vallet Colchero"
        ];

        function buscarNombres($cadena, $nombres) {
            $resultado = [];
            $cadena = strtolower($cadena);
            foreach ($nombres as $nombre) {
                if (strpos(strtolower($nombre), $cadena) !== false) {
                    $resultado[] = $nombre;
                }
            }
            return $resultado;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cadena'])) {
            $cadena = trim($_GET['cadena']);
            if (!empty($cadena)) {
                $nombresEncontrados = buscarNombres($cadena, $nombres);
                if (count($nombresEncontrados) > 0) {
                    echo "<h2>Nombres encontrados para la cadena '$cadena':</h2>";
                    echo "<ul>";
                    foreach ($nombresEncontrados as $nombre) {
                        echo "<li>" . htmlspecialchars($nombre) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No se encontraron nombres que coincidan con '$cadena'.</p>";
                }
            } else {
                echo "<p>Por favor, proporciona una cadena válida.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
