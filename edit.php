<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RSP - edit your collection of Pets</title>
</head>

<body>

  <h1>RSP - edit your collection of Pets</h1>

  <form method='POST'>
    <label for="name">pet name:</label>
    <input class='name' value=<?= $edit["name"] ?> name='name' type='text'> </input>
    <label for="type">type(skilling or combat):</label>
    <input class='type' value=<?= $edit["type"] ?> name='type' type='text'> </input>
    <label for="skill">skill: </label>
    <input class='skill' value=<?= $edit["skill"] ?> name='skill' type='text'></input>
    <label for="obtained">obtained:</label>
    <input class='obtained' <?= $edit["obtained"] ? 'checked' : '' ?> name='obtained' type='checkbox'> </input>
    <input type="submit" value="confirm changes">
  </form>
  <!-- <button></button> -->
  <a class="create" href="?">Return to overview</a>

</body>

</html>