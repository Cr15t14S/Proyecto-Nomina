<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomina</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customStyles.css">

</head>

<body id="body">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active h3">Proyecto Nomina <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <div class="header-container">
            <h2>Nomina</h2>
        </div>
        <div class="row">
            <div id="content" class="col-lg-12">
                <form action="./rep.php" method='get'>
                    <table class="table table-borderless">
                        <div>
                            <thead class="table-header">
                                <tr>
                                    <td class="font-weight-bold text-center">Nombre</td>
                                    <td class="font-weight-bold text-center">Centro de costo</td>
                                    <td class="font-weight-bold text-center">   Cargo   </td>
                                    <td class="font-weight-bold text-center">No. Identificacion</td>
                                    <td class="font-weight-bold text-center">Sueldo</td>
                                    <td class="font-weight-bold text-center">Dias laborados</td>
                                    <td class="font-weight-bold text-center">Dias incapacidad por EPS</td>
                                    <td class="font-weight-bold text-center">Dias incapacidad por ARL</td>
                                    <td class="font-weight-bold text-center">Horas nocturnas</td>
                                    <td class="font-weight-bold text-center">Horas dominicacles</td>
                                </tr>
                            </thead>
                        </div>
                        <tbody id="tabla-dinamica">
                            <!-- Fila inicial -->
                            <tr class='bg-custom'>
                                <td><input class='form-control' type='text' name='nomb[]' required></td>
                                <td><select class='form-control' name='cent[]'>
                                <option value="Administración">Administración</option>
                                <option value="Las Delicias - Villavicencio">Las Delicias - Villavicencio</option>
                                <option value="Mangos y Naranjos - Tausa">Mangos y Naranjos - Tausa</option>
                                </select></td>
                                <td><select class='form-control' name='carg[]'>
                                <option value="Gerente">Gerente</option>
                                <option value="Subgerente">Subgerente</option>
                                <option value="Cordinador Agro">Cordinador Agro</option>
                                <option value="Asistente varios">Asistente varios</option>
                                <option value="Mayordomo">Mayordomo</option>
                                <option value="Aux mayordomo">Aux mayordomo</option>
                                <option value="Servicios Generales">Servicios Generales</option>
                                <option value="Coor administrativa">Coor administrativa</option>
                                </select></td>
                                <td><input class='form-control' type='number' name='id[]' min="0" required></td>
                                <td><input class='form-control' type='number' name='suel[]' min="1300000" required></td>
                                <td><input class='form-control' type='number' name='dias[]' min="1" max="31" required></td>
                                <td><input class='form-control' type='number' name='diasEPS[]' min="0" max="90"></td>
                                <td><input class='form-control' type='number' name='diasARL[]' min="0" max="90"></td>
                                <td><input class='form-control' type='number' name='Hnoc[]' min="0" max="372"></td>
                                <td><input class='form-control' type='number' name='Hdomin[]' min="0" max="96"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" id="agregar-fila">
                        <i class="fa fa-plus" aria-hidden="true"></i> Añadir Filas
                    </button>
                    <br><br>
                    <input class="btn btn-primary" type='submit' value='Enviar'>
                    <input class="btn btn-info" type='reset' value='Reset'>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('agregar-fila').addEventListener('click', function () {
            // Obtener la tabla de la fila dinámica
            var tablaDinamica = document.getElementById('tabla-dinamica');

            // Crear una nueva fila clonando la primera fila
            var nuevaFila = tablaDinamica.rows[0].cloneNode(true);

            // Limpiar los valores de los inputs en la nueva fila
            var inputs = nuevaFila.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }

            // Añadir la nueva fila a la tabla
            tablaDinamica.appendChild(nuevaFila);
        });
    </script>
</body>

</html>
