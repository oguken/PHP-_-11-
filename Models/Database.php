<?php
namespace Models;

class Database
{
    private $stmt;

    public function __construct(string $sql)
    {
        // $dsn      = 'mysql:host=127.0.0.1;port=3306;dbname=casteria;charset=utf8';
        $dsn = 'mysql:host=localhost;dbname=casteria;charset=utf8';
        $user     = 'root';
        $password = 'root';
        $opt      = [
            // エラーを取得するため
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            // sqlインジェクションを回避するため
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
    
        $pdo = new \PDO($dsn, $user, $password, $opt);
        $this->stmt = $pdo->prepare($sql);
    }

    public function select(): array
    {
        if($this->execute()) {
            $result = $this->stmt->fetchAll();
        }

        return $result ?: [];
    }

    public function selectBy(array $params): array
    {
        $this->prepare($params);

        if($this->execute()) {
            $result = $this->stmt->fetch(\PDO::FETCH_ASSOC);
        }

        return $result ?: [];
    }

    public function insert(array $params): bool
    {
        $this->prepare($params);

        return $this->execute();
    }

    public function update(array $params): bool
    {
        $this->prepare($params);

        return $this->execute();
    }

    public function deleteBy(array $params): bool
    {
        $this->prepare($params);

        return $this->execute();
    }

    private function prepare(array $params): void
    {
        foreach($params as $key => $value) {
            $this->stmt->bindValue($key, $value['value'], $value['type']);
        }
    }

    // クエリの実行
    private function execute(): bool
    {
        try {
            $result = $this->stmt->execute();
        } catch(\PDOException $e) {
            error_log($e->getMessage());
            var_dump($e->getMessage());
            
            exit; //エラー画面へ遷移させるとかする
        }
        $this->pdo = null;

        return $result;
    }
}