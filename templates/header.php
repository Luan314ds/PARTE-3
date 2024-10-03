<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TUDAI-WEB2</a>
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="marcas">Marcas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos">Productos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>

    <?php


// function showTables(){


//     $db = new PDO('mysql:host=localhost;dbname=tp°1_web_2;charset=utf8','root','');

//     $query= $db->prepare('SELECT * FROM marca');
//     $query-> execute();

//     $marcas = $query->fetchAll(PDO::FETCH_OBJ);

//     echo "<h2>Lista de marcas</h2>";
//     echo "<ul>";
//     foreach($marcas as $marca){
//         echo "<li>$marca->id-$marca->nombre_marca - $marca->importador - $marca->pais_origen </li>";
//     }
//     echo "</ul>";
// }

// function delete($idsecundaria){
//      //1-Vinculamos la conexion 
//      $db = new PDO('mysql:host=localhost;dbname=tp°1_web_2;charset=utf8','root','');

//     // Paso 1: Eliminar primero los productos relacionados con la marca
//     $queryProductos = $db->prepare("DELETE FROM productos WHERE id_marca = ?");
//     $queryProductos->execute([$idsecundaria]);// evitar la inyeccion SQL

   
//     //2- Envio la consulta
//     $query= $db->prepare("DELETE FROM marca WHERE id = ?");
//     $query->execute([$idsecundaria]);
// }

// delete(3);

// showTables();
?>

</body>
</html>