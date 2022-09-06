<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220906122303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_hobby (users_id INT NOT NULL, hobby_id INT NOT NULL, PRIMARY KEY(users_id, hobby_id))');
        $this->addSql('CREATE INDEX IDX_DE13577E67B3B43D ON users_hobby (users_id)');
        $this->addSql('CREATE INDEX IDX_DE13577E322B2123 ON users_hobby (hobby_id)');
        $this->addSql('ALTER TABLE users_hobby ADD CONSTRAINT FK_DE13577E67B3B43D FOREIGN KEY (users_id) REFERENCES "users" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_hobby ADD CONSTRAINT FK_DE13577E322B2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users_hobby DROP CONSTRAINT FK_DE13577E67B3B43D');
        $this->addSql('ALTER TABLE users_hobby DROP CONSTRAINT FK_DE13577E322B2123');
        $this->addSql('DROP TABLE users_hobby');
    }
}
