<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>PHP Dischi Valerio</title>
</head>

<body>

    <?php
    include __DIR__ . '/database.php';
    if (isset($_GET['filter'])) {
        $filter = strtolower($_GET['filter']);
        $data = [];
        foreach ($database as $album) {
            if (strlen($filter) === 0 || strtolower($album['genre'] === $filter)) {
                $data[] = $album;
            }
        }
        $database = $data;
    }
    ?>

    <header>
        <form action="./index.php" method="get">
            <input type="text" name="filter">
            <input type="submit" value="Search">
        </form>
    </header>

    <div class="container">
        <div class="album-container">

            <?php
            foreach ($database as $album) {
            ?>
                <div>

                    <?php
                    include __DIR__ . '/card.php';
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>