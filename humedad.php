<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>3DRobot</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum=1.0">
    <link rel="stylesheet" href="css/estilos.css">

    <link href="https://file.myfontastic.com/gnWRRXuo9zePP5DXLSsseZ/icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


</head>

<body>

    <?php include "login.php"; ?>
    <?php include "upload.php"; ?>
    <header class="header">
        <div class="contenedor">
            <h2 class="logo slider" class="display-4">3DRobot</h2>

            <span class="icon-menu" id="btn-menu"></span>
            <nav class="nav" id="nav">
                <ul class="menu">
                    <li clas="menu__item"><a class="menu__link select" href="pagina1.php">Inicio</a></li>
                    <li clas="menu__item"><a class="menu__link" href="cursos.html">Infomación</a></li>
                    <li clas="menu__item"><a class="menu__link" href="logout.php">Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="limiter">

        <div class="container-login1004">

            <video id="video" width="854" height="480" controls></video>
            <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
            <script>
                const video = document.getElementById('video');
                const videoSrc = 'http://localhost:8080/livestream/stream.m3u8';

                if (Hls.isSupported()) {
                    const hls = new Hls();

                    hls.loadSource(videoSrc);
                    hls.attachMedia(video);
                    hls.on(Hls.Events.MANIFEST_PARSED, () => {
                        video.play();
                    });
                } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                    video.src = videoSrc;
                    video.addEventListener('loadedmetadata', () => {
                        video.play();
                    });
                }
            </script>


            <div class="wrap-login1004">

                <h1>Upload file</h1>

                <form method="post" enctype="multipart/form-data">
                    Select gcode file to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" value="Upload File">
                    <input type="submit" value="Upload File" name="submit">
                </form>
                Info: <input class="inputinfo" type="text" name="info" value="<?php echo $info; ?>">

            </div>

        </div>

        <!--Dayspedia.com widget<iframe width='202' height='122' style='padding:0!important;margin:0!important;border:none!important;background:none!important;background:transparent!important' marginheight='0' marginwidth='0' frameborder='0' scrolling='no' comment='/*defined*/' src='https://dayspedia.com/if/digit/?v=1&iframe=eyJ3LTEyIjp0cnVlLCJ3LTExIjp0cnVlLCJ3LTEzIjp0cnVlLCJ3LTE0IjpmYWxzZSwidy0xNSI6ZmFsc2UsInctMTEwIjpmYWxzZSwidy13aWR0aC0wIjp0cnVlLCJ3LXdpZHRoLTEiOmZhbHNlLCJ3LXdpZHRoLTIiOmZhbHNlLCJ3LTE2IjoiMTZweCAxNnB4IDI0cHgiLCJ3LTE5IjoiMzIiLCJ3LTE3IjoiMTIiLCJ3LTIxIjpmYWxzZSwiYmdpbWFnZSI6LTIsImJnaW1hZ2VTZXQiOmZhbHNlLCJ3LTIxYzAiOiIjZmZmZmZmIiwidy0wIjpmYWxzZSwidy0zIjpmYWxzZSwidy0zYzAiOiIjMzQzNDM0Iiwidy0zYjAiOiIxIiwidy02IjoiIzM0MzQzNCIsInctMjAiOmZhbHNlLCJ3LTQiOiIjMDA3ZGJmIiwidy0xOCI6ZmFsc2UsInctd2lkdGgtMmMtMCI6IjMwMCIsInctMTE1IjpmYWxzZX0=&lang=es&cityid=7423'></iframe>-->

    </div>
    Info: <input class="inputinfo" type="text" name="info" value="<?php echo $info2; ?>">

    <h1>Datos de temperatura.</h1>
    <table>
        <tr>
            <th>idnodo</th>
            <th>TEMPERATURA</th>
            <th>FECHA</th>
        </tr>
        <!-- <?php
                $url_rest = "http://localhost:3000/datos";
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");

                }
                curl_close($curl);

                //echo $respuesta;
                $resp = json_decode($respuesta);
                $tam = count($resp);
                for ($i = 0; $i < $tam; $i++) {
                    $j = $resp[$i];
                    $idnodo = $j->idnodo;
                    $temp = $j->temperatura;
                    $fecha = $j->fecha;
                    echo "<tr><td>$idnodo</td><td>$temp</td><td>$fecha</td></tr>";
                    
                }
                ?> -->
    </table>
    <footer class="footer">
        <div class="social">
            <a href="https://github.com/santiagorg2401/3drobot" target="_blank">
                <i class="fa fa-github fa_custom fa-4x"></i>
            </a>
        </div>
        <p class="copy">&copy;3DRobot 2022 - Todos los derechos reservados </p>
    </footer>

</body>

</html>