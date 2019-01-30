<?php
    // démarre une session au chargement de la page
    // ou récupère la session précédente
    require_once("app/frontController.class.php");
    //instancie le service s'occupant de la session et le front controller (s'occupant du reste)
    $front = new FrontController();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
        <title>Diatem</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="jquery.js"></script>
    </head>
    <body>
        <section id="container">
            <header>
                <h1 class='bandeau'>diatem</h1>
                <p><b>connecting</b> everything</p>
            </header>

            <main class="wrapper">

                <?php
                   include $front->render($front->getPage());
                ?>
                <p id="message">
                    <?php echo $front->getSession()->getMessage(); ?>
                </p>
            </main>
        </section>

        <script>
            $(document).ready(function(){
                var text = $.trim($('#message').text());
                if(text != ""){
                    $("#message").fadeIn(2000).slideUp(2000);
                }
            });
            $(document).ready(function() {
              M.updateTextFields();
            });
        </script>
    </body>

</html>
