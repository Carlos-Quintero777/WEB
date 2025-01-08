<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelota con Giroscopio</title>
  <style>
    body {
      margin: 0;
      overflow: hidden;
    }

    #lienzo {
      display: block;
      background-color: #f0f0f0;
    }

    #pelota {
      width: 50px;
      height: 50px;
      background-color: red;
      border-radius: 50%;
      position: absolute;
    }
  </style>
</head>
<body>
  <div id="pelota"></div>

  <script>
    const pelota = document.getElementById('pelota');
    let x = window.innerWidth / 2;
    let y = window.innerHeight / 2;

    function actualizarPosicion() {
      pelota.style.left = x + 'px';
      pelota.style.top = y + 'px';
    }

    actualizarPosicion();

    window.addEventListener('deviceorientation', (evento) => {
      const beta = evento.beta;
      const gamma = evento.gamma;

      const sensibilidad = 2;

      x += gamma * sensibilidad;
      y += beta * sensibilidad;

      x = Math.max(0, Math.min(window.innerWidth - 50, x));
      y = Math.max(0, Math.min(window.innerHeight - 50, y));

      actualizarPosicion();
    });

    if (!window.DeviceOrientationEvent) {
      alert('Tu dispositivo no es compatible con el sensor de orientación.');
    }
  </script>
</body>
</html>
