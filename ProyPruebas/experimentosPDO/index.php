<?php
// index.php
$link = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', 'mestre');

$result = $link->query('SELECT idcat, nome FROM post');
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Posts</title>
</head>
<body>
<h1>List of Posts</h1>
<ul>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <li>
            <a href="/show.php?id=<?php echo $row['idcat'] ?>">
                <?php echo $row['nome'] ?>
            </a>
        </li>
    <?php endwhile ?>
</ul>
</body>
</html>

<?php
$link = null;
?>

    
