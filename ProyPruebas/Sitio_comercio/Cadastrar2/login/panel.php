<?php
session_start();
include_once '../connect/connect.php';
if (isset($_SESSION['user'])){?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
    <div>
        <article>
            <p>
                fdskjhgkfsdjghfdskjghdfkjghfdkjghfdkjghfdkjghdfskjghfdkjg <br>
                fjgkjfdghkjfdhgkjfdhgkjfd <br>
                njkhfjkhfj
            </p>
        </article>
                <a href="http://localhost:8080/login/logout.php"><button>Salir</button></a>
    </div>
    </body>
    </html>
    <?php
}else
{?>
    <script>window.location="login.php"</script>
    <?php
}
?>


