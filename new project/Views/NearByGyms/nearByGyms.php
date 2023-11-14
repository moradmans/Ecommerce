<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Leaflet</title>

    <!-- Incluye Leaflet desde un CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        /* Estilo para el contenedor del mapa */
        #map {
            height: 400px;
        }
    </style>
</head>
<body>
    <h1>Mapa con Leaflet</h1>

    <!-- Contenedor del mapa -->
    <div id="map"></div>

    <!-- Script para inicializar el mapa con Leaflet -->
    <script>
        // Inicializa el mapa con Leaflet
        var map = L.map('map').setView([40.7128, -74.0060], 12);

        // Añade una capa de mapa (usando OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Añade un marcador
        L.marker([40.7128, -74.0060]).addTo(map)
            .bindPopup('Ubicación de interés').openPopup();
    </script>
</body>
</html>
