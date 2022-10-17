<!doctype html>
<html>

<head>
    <title>Mostrar resultado</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="JUAN JOSE GONZALEZ CARDENAS" />
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <link href="CSS/columnas.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efa9459789.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="col-12 header">
            <!--ENCABEZADO-->
            <?php require_once 'header2.html'; ?>
        </div>
        <!--ENCABEZADO-->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="col-3 menu">
                <!--etiqueta que especifica la navegación del sitio web-->
                <?php require_once 'Menu2.html'; ?>
            </div>
            <!--etiqueta que especifica la navegación del sitio web-->
            <div class="col-9">
                <p class="inicio">Autor: Juan José Gonzalez Cardenas</p>
                <p class="inicio">Estudiante de Ingeniería Informática en el Instituto Tecnológico Superior de Apatzingán, </p>
                <p class="link"><a  href="https://github.com/JUANJOWORK" target="_blank">GitHub</a></p>
                <p class="link"><a  href="https://www.linkedin.com/in/juan-jose-gonzalez-cardenas-b13b5721b">Linkedin</a></p>

            </div>
        </div>
    </div>
        <footer class="col-12 footerend">
            <!--pie de pagina-->
            <?php require_once 'footer.html'; ?>
        </footer>
</body>

</html>