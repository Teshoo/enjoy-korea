<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220911165758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE hobby_additional_info_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE hobby_hobby_category (hobby_id INT NOT NULL, hobby_category_id INT NOT NULL, PRIMARY KEY(hobby_id, hobby_category_id))');
        $this->addSql('CREATE INDEX IDX_96DCEAE5322B2123 ON hobby_hobby_category (hobby_id)');
        $this->addSql('CREATE INDEX IDX_96DCEAE566F52379 ON hobby_hobby_category (hobby_category_id)');
        $this->addSql('CREATE TABLE hobby_additional_info (id INT NOT NULL, hobby_id INT DEFAULT NULL, info VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D81C4A78322B2123 ON hobby_additional_info (hobby_id)');
        $this->addSql('ALTER TABLE hobby_hobby_category ADD CONSTRAINT FK_96DCEAE5322B2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_hobby_category ADD CONSTRAINT FK_96DCEAE566F52379 FOREIGN KEY (hobby_category_id) REFERENCES hobby_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_additional_info ADD CONSTRAINT FK_D81C4A78322B2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_category_hobby DROP CONSTRAINT fk_83f8a1b66f52379');
        $this->addSql('ALTER TABLE hobby_category_hobby DROP CONSTRAINT fk_83f8a1b322b2123');
        $this->addSql('DROP TABLE hobby_category_hobby');
        $this->addSql('ALTER TABLE hobby ADD schedule VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD frequence VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hobby ADD price_for VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE hobby_additional_info_id_seq CASCADE');
        $this->addSql('CREATE TABLE hobby_category_hobby (hobby_category_id INT NOT NULL, hobby_id INT NOT NULL, PRIMARY KEY(hobby_category_id, hobby_id))');
        $this->addSql('CREATE INDEX idx_83f8a1b66f52379 ON hobby_category_hobby (hobby_category_id)');
        $this->addSql('CREATE INDEX idx_83f8a1b322b2123 ON hobby_category_hobby (hobby_id)');
        $this->addSql('ALTER TABLE hobby_category_hobby ADD CONSTRAINT fk_83f8a1b66f52379 FOREIGN KEY (hobby_category_id) REFERENCES hobby_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_category_hobby ADD CONSTRAINT fk_83f8a1b322b2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_hobby_category DROP CONSTRAINT FK_96DCEAE5322B2123');
        $this->addSql('ALTER TABLE hobby_hobby_category DROP CONSTRAINT FK_96DCEAE566F52379');
        $this->addSql('ALTER TABLE hobby_additional_info DROP CONSTRAINT FK_D81C4A78322B2123');
        $this->addSql('DROP TABLE hobby_hobby_category');
        $this->addSql('DROP TABLE hobby_additional_info');
        $this->addSql('ALTER TABLE hobby DROP schedule');
        $this->addSql('ALTER TABLE hobby DROP frequence');
        $this->addSql('ALTER TABLE hobby DROP price');
        $this->addSql('ALTER TABLE hobby DROP price_for');
    }
}
