<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;
// echo 'testing' . $action;
// Load the relevant action
switch ($action) {
  case 'create':
    create();
    break;
  case 'edit':
    edit();
    break;
  case 'delete':
    delete();
    break;
  default:
    overview();
    break;
}

function overview()
{
  // Load your view
  // Tip: you can load this dynamically and based on a variable, if you want to load another view
  global $cardRepository;
  $cards = $cardRepository->get();
  require 'overview.php';

}

function create()
{
  // TODO: provide the create logic
  require 'create.php';

  global $cardRepository;
  if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['skill']))
    $cardRepository->create($_POST['name'], $_POST['type'], $_POST['skill'], isset($_POST['obtained']) ? 1 : 0);
  else
    echo "fill in the fields to add it to the collection";
}

function edit()
{
  global $cardRepository;
  $edit = $cardRepository->find($_GET["name"]);
  require 'edit.php';

  if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['skill'])) {
    $cardRepository->update($edit['name'], $_POST['name'], $_POST['type'], $_POST['skill'], isset($_POST['obtained']) ? 1 : 0);
    header("Location: ?", true, 301);

  } else
    echo "fields can not be left empty!";
}
function delete()
{
  global $cardRepository;
  if (empty($_POST['delete'])) {
    $edit = $cardRepository->find($_GET["name"]);
    require 'delete.php';
  } else if ($_POST['delete'] == 'confirm') {
    $_POST['delete'] = 'deleted'; //stop multiple deletes
    $cardRepository->delete($_GET['name']);
    header("Location: ?", true, 301);
  }
}
// echo var_dump($_POST) . "<br>";
// echo var_dump($_GET);
