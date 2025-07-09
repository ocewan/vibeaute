<?php

namespace App\Repository;

use App\Entity\Message;

class MessageRepository extends Repository
{
    public function save(string $name, string $email, string $phone, string $message): void
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO messages (name, email, phone, message, sent_at, is_read)
        VALUES (:name, :email, :phone, :message, NOW(), 0)
    ");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message
        ]);
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM messages ORDER BY sent_at DESC");
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $messages = [];
        foreach ($rows as $row) {
            $m = new Message();
            $m->setId((int)$row['id']);
            $m->setName($row['name']);
            $m->setEmail($row['email']);
            $m->setPhone($row['phone']);
            $m->setMessage($row['message']);
            if (!empty($row['sent_at'])) {
                try {
                    $m->setSentAt(new \DateTime($row['sent_at']));
                } catch (\Exception $e) {
                    $m->setSentAt(null);
                }
            }
            $m->setIsRead((bool)$row['is_read']);
            $messages[] = $m;
        }
        return $messages;
    }

    public function markAsRead(int $id): void
    {
        $stmt = $this->pdo->prepare("UPDATE messages SET is_read = 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function deleteById(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM messages WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
