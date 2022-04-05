<?php
namespace Models\Repositories;

require_once(ROOT_PATH.'Models/Database.php');

use Models\Database;

class ContactRepository
{
    public function findAll(): array
    {
        $sql  = 'SELECT id, name, kana, tel, email, body FROM contacts';
        $db = (new Database($sql));
            
        return $db->select();
    }

    public function findBy(array $params): array
    {
        $sql  = 'SELECT id, name, kana, tel, email, body FROM contacts WHERE id = :id';
        $db = (new Database($sql));

        return $db->selectBy($params);
    }

    public function insert(
        string $name,
        string $kana,
        string $tel,
        string $email,
        string $body
    ): bool {
        $sql = 'INSERT INTO contacts (name, kana, tel, email, body) VALUE (:name, :kana, :tel, :email, :body)';
        $db = (new Database($sql));

        $params = [
            'name' => [
                'value' => $name,
                'type'  => \PDO::PARAM_STR,
            ],
            'kana' => [
                'value' => $kana,
                'type'  => \PDO::PARAM_STR,
            ],
            'tel'  => [
                'value' => $tel,
                'type'  => \PDO::PARAM_STR,
            ],
            'email' => [
                'value' => $email,
                'type'  => \PDO::PARAM_STR,
            ],
            'body' => [
                'value' => $body,
                'type'  => \PDO::PARAM_STR,
            ],
        ];

        return $db->insert($params);
    }

    public function update(
        int $id,
        string $name,
        string $kana,
        string $tel,
        string $email,
        string $body
    ): bool {
        $sql = 'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
        $db = (new Database($sql));

        $params = [
            'id'   => [
                'value' => $id,
                'type'  => \PDO::PARAM_INT,
            ],
            'name' => [
                'value' => $name,
                'type'  => \PDO::PARAM_STR,
            ],
            'kana' => [
                'value' => $kana,
                'type'  => \PDO::PARAM_STR,
            ],
            'tel'  => [
                'value' => $tel,
                'type'  => \PDO::PARAM_STR,
            ],
            'email' => [
                'value' => $email,
                'type'  => \PDO::PARAM_STR,
            ],
            'body' => [
                'value' => $body,
                'type'  => \PDO::PARAM_STR,
            ],
        ];

        return $db->update($params);
    }

    public function deleteBy($params): bool
    {
        $sql  = 'DELETE FROM contacts WHERE id = :id';
        $db = (new Database($sql));

        return $db->deleteBy($params);
    }
}