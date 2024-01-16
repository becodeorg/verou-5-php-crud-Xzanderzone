<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
  private DatabaseManager $databaseManager;
  private $table = 'pets';

  // This class needs a database connection to function
  public function __construct(DatabaseManager $databaseManager)
  {
    $this->databaseManager = $databaseManager;
  }

  public function create(string $name, string $type, string $skill, int $obtained = 0): void
  {
    try {
      $this->databaseManager->connection->query("INSERT INTO $this->table  VALUES ('$name', '$type', '$skill', $obtained)");
    } catch (PDOException $e) {
      echo "query failed" . $e->getMessage();

    }
  }

  // Get one
  public function find(string $name): array
  {
    try {
      $query = $this->databaseManager->connection->query("SELECT $name FROM $this->table");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      echo "query failed" . $e->getMessage();
      return [];
    }
  }

  // Get all
  public function get(): array
  {
    try {

      $query = $this->databaseManager->connection->query("SELECT * FROM $this->table");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      echo "query failed" . $e->getMessage();
      return [];
    }
    // We get the database connection first, so we can apply our queries with it
    // return $this->databaseManager->connection-> (runYourQueryHere)
  }

  public function update(): void
  {

  }

  public function delete(): void
  {

  }

}