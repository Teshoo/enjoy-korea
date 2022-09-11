<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220911211835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hobby ADD frequency VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby DROP frequence');
        $this->addSql('ALTER TABLE hobby DROP adress');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE hobby ADD frequence VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD adress VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby DROP frequency');
        $this->addSql('ALTER TABLE hobby DROP address');
    }
}
