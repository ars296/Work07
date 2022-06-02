<?php

$db_host = "localhost";
$db_name = "ars";
$db_user = "ars_www";
$db_pass = "***********";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT *
        FROM article
        WHERE id = 1";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $article = mysqli_fetch_assoc($results);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Myブログ</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>Myブログ</h1>
    </header>

    <main>
        <?php if ($article === null): ?>
            <p>記事が見つかりません</p>
        <?php else: ?>

            <article>
                <h2><?= $article['title']; ?></h2>
                <p><?= $article['content']; ?></p>
            </article>

        <?php endif; ?>
    </main>
</body>
</html>
