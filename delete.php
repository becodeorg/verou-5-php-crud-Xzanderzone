<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RSP - remove a pet from your collection of Pets</title>
</head>

<body>

  <h1>RSP - remove a pet from your collection of Pets</h1>
  <h2>Confirm Delete:</h2>
  <form method='POST'>
    <label for="name">pet name:</label>
    <input disabled='true' class='name' value=<?= $edit["name"] ?> name='name' type='text'> </input>
    <label for="type">type(skilling or combat):</label>
    <input disabled='true' class='type' value=<?= $edit["type"] ?> name='type' type='text'> </input>
    <label for="skill">skill: </label>
    <input disabled='true' class='skill' value=<?= $edit["skill"] ?> name='skill' type='text'></input>
    <label for="obtained">obtained:</label>
    <input disabled='true' class='obtained' <?= $edit["obtained"] ? 'checked' : '' ?> name='obtained' type='checkbox'>
    </input>
    <input type="submit" value="confirm delition">
  </form>
  <!-- <button></button> -->
  <a class="create" href="?">Return to overview</a>

</body>

</html>