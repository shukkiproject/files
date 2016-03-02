
<!doctype html>
    <html>
        <head>
            <title>Télé 2000</title>
            <meta charset="utf8"/>
            <link rel="stylesheet" href="./public/style/style.css"/>
        </head>
        <body>
            <?php include('./View/layout/header/header.php');?>
            <div>
                <?php include('./View/layout/menus/menu.php');?>
                <?= $contenu; ?>
            </div>
            <?php include('./View/layout/footer/footer.php');?>
        </body>
    </html>