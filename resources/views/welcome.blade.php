<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba tecnica</title>
  <!-- Integramos Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style>
    .container {
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Pluralizador</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.html" id="alternar">Vista General</a>
          </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="container">
    <div id="resultado"></div>
    <form id="formulario">
    @csrf
      <div class="form-group">
        <label for="texto">Texto (máximo 250 palabras):</label>
        <textarea class="form-control" id="texto" name="texto" rows="6" maxlength="250" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Analizar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <script>
$('#formulario').on('submit', function (e) {
  e.preventDefault();

  var texto = $('#texto').val();

  // Realizar la solicitud a la API
  $.ajax({
    type: 'POST',
    url: '/pluralizador',
    data: { texto: texto },
    success: function (respuesta) {
     
      $('#resultado').html(JSON.stringify(respuesta, null, 2));
    }
  });
});

  </script>
</body>
</html>
