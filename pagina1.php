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

    <div id="container">
        <div class="item" id="item3">
            <h1>Upload file: </h1>

            <form method="post" enctype="multipart/form-data">
                Select gcode file to upload:
                <input type="file" name="fileToUpload" id="fileToUpload" value="Upload File">
                <input type="submit" value="Upload File" name="submit">
            </form>
            Info: <input class="inputinfo" type="text" name="info" value="<?php echo $info; ?>">

        </div>
        <div class="item" id="item4">
            <video id="video" width="800" height="450" controls></video>
            <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
            <script>
                const video = document.getElementById('video');
                const videoSrc = 'http://20.40.65.188:8080/livestream/stream.m3u8';

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
        </div>
        <?php
        $url_rest = "http://20.40.65.188:3000/datos";

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

        $dataPoints = array();

        for ($i = 0; $i < $tam; $i++) {
            $j = $resp[$i];
            $robot_id = $j->robot_id;
            $temperature = $j->temperature;
            $weight = $j->weight;
            $timedate = $j->timedate;
            $powerState = $j->powerState;

            array_push($dataPoints, array("x" => $i, "y" => $temperature));
            $info = $weight;
            $info2 = $powerState;
        }
        ?>
        <div class="item" id="item5">
            <script>
                window.onload = function() {
                    var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light2", // "light1", "light2", "dark1", "dark2"
                        animationEnabled: true,
                        zoomEnabled: true,
                        title: {
                            text: "Temperature over time in °C."
                        },
                        axisX: {
                            title: "Time in milliseconds."
                        },
                        axisY: {
                            suffix: "°C"
                        },
                        data: [{
                            type: "line",
                            dataPoints: dataPoints
                        }]
                    });
                    chart.render();

                }
            </script>
            <div id="chartContainer" style="height: 250px; width: 100%;"></div>


            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div class="item" id="item6">
        <h1> Filament Weight in Kg: </h1>
            <input class="inputinfo" type="text" name="info" value="<?php echo $info; ?>">
           
        </div>
        <div class="item" id="item7">
        <h1>Power state: </h1>
            <input class="inputinfo" type="text" name="info" value="<?php echo $info2; ?>">

        </div>
    </div>


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
