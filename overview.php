<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>RSP - track your collection of Runescape pets</title>
</head>

<body>

  <h1>RSP - track your collection of Runescape pets</h1>
  <a class="create" href="?action=create">Create new pet</a>

  <ul>
    <?php foreach ($cards as $card): ?>
      <ol><?= $card['name'] ?></ol>
      <ol><?= $card['type'] ?></ol>
      <ol><?= $card['skill'] ?></ol>
      <ol><?= $card['obtained'] ?></ol>
      <ol><a href="?action=edit&name=<?= $card['name'] ?>">edit</a>
        <a href="?action=delete&name=<?= $card['name'] ?>">delete</a>
      </ol>
    <?php endforeach; ?>
  </ul>

</body>

</html>