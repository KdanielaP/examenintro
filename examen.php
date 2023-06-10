<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        $conexion = new PDO('mysql:hot=localhost;dbname=examen', 'root', '', $pdo_options);
        if(isset($_POST["accion"])){
            echo"Quieres ". $_POST["accion"]; 
            if ($_POST["accion"]=="crear"){
                $insert = $conexion->prepare("INSERT INTO alumno (carne,nombre,telefono,grado) VALUES (:carne,:nombre,:telefono,:grado)" );

                $insert->bindValue('carne', $_POST['carne']);
                $insert->bindValue('nombre', $_POST['nombre']);
                $insert->bindValue('dpi', $_POST['telefono']);
                $insert->bindValue('direccion', $_POST['grado']);
            }

            if ($_POST["accion"]=="editado"){
                $update = $conexion->prepare("UPDATE alumno SET nombre = :nombre, telefono=:telefono, grado=:grado WHERE carne=:carne" );

                $update->bindValue('carne', $_POST['carne']);
                $update->bindValue('nombre', $_POST['nombre']);
                $update->bindValue('dpi', $_POST['telefono']);
                $update->bindValue('direccion', $_POST['grado']);
                //header("Refresh: 0;");
            }
        }
        $select = $conexion->query("SELECT carne, nombre, telefono, grado FROM alumno");

    ?>
    <?php
        if(isset($_POST["accion"]) && $_POST["accion"] == "editar"){
    ?>
        <label>Ingresa tus datos</label>
        <form method= "POST">
            <input type="text" name = "carne" value = "<?php echo $_POST ["carne"] ?>" placeholder = "Ingresa tu carne">
            <input type="text" name = "nombre" placeholder = "Ingresa tu nombre">
            <input type="text" name = "telefono" placeholder = "Ingresa tu grado">
            <input type="text" name = "grado" placeholder = "Ingresa tu numero de telefono">
            <input type="hidden" name="accion" value = "editado"/>
            <button type = "submit">Guardar</button>
        </form>
        <?php } else{?>
            <input type="text" name = "carne" placeholder = "Ingresa tu carne">
            <input type="text" name = "nombre" placeholder = "Ingresa tu nombre">
            <input type="text" name = "grado" placeholder = "Ingresa tu grado">
            <input type="text" name = "telefono" placeholder = "Ingresa tu numero de telefono">
            <input type="hidden" name="accion" value = "crear"/>
            <button type = "submit">crear</button>
            <?php }?>
    <table border="1">
        <thead>
            <tr>
                <th>carne</th>
                <th>nombre</th>
                <th>grado</th>
                <th>telefono</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($select->fetchAll() as $alumno){ ?>
         <tr>
            <td><?php echo $alumno["carne"]; ?></td>
            <td><?php echo $alumno["nombre"]; ?></td>
            <td><?php echo $alumno["grado"]; ?></td>
            <td><?php echo $alumno["telefono"]; ?></td>
            <td>
                <form method ="POST">
                    <button type="submit">editar</button>
                    <input type="hidden" name ="accion" value ="editar">
                    <input type="hidden" name = "carne" value ="<?php echo $alumno["carne"] ?>"/>
                </form>
            </td>
         </tr> 
         <?php
        }
        ?>
        </tbody>
    </table>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 8px;
            width: 200px;
        }

        button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</body>
</html>
git init

git add .

git commit -m "first commit"

git remote add origin https://github.com/NOMBRE_USUARIO/NOMBRE_PROYECTO.git

git push -u origin master
