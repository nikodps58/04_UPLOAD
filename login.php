
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 3 Ciudades - Viajes Donostia | Acceso privado</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1> Acceso a zona privada  </h1>
    <!-- nav -->
    <?php
         /* include "./php/nav.php" */
    ?>

    <main>
        
        <section id="sect_form">
            <h2> Entre sus datos</h2>
            <article>                             
                <form action="./validar_login.php" method="post">
                   <?php
                        if(isset($_GET["me"])){
                            $ctexto=$_GET["me"];
                    ?>
                        <section>
                            <p class="error"> <?=$ctexto?> </p>
                        </section>
                    <?php
                            }
                    ?>
                    <input type="email" name="email"  placeholder="Usuario" require>
                    <input type="password" name="pass" placeholder="Password" require>
                    <input type="submit" value="login">
                </form>
            </article>
        </section>
    </main>

    <header>
        
    </header>
</body>
</html>