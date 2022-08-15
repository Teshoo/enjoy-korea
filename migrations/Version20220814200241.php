<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220814200241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE hobby_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hobby_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE hobby (id INT NOT NULL, name VARCHAR(255) NOT NULL, hangeul_name VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, phone_nb VARCHAR(255) DEFAULT NULL, gps_coordinates VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hobby_category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hobby_category_hobby (hobby_category_id INT NOT NULL, hobby_id INT NOT NULL, PRIMARY KEY(hobby_category_id, hobby_id))');
        $this->addSql('CREATE INDEX IDX_83F8A1B66F52379 ON hobby_category_hobby (hobby_category_id)');
        $this->addSql('CREATE INDEX IDX_83F8A1B322B2123 ON hobby_category_hobby (hobby_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE hobby_category_hobby ADD CONSTRAINT FK_83F8A1B66F52379 FOREIGN KEY (hobby_category_id) REFERENCES hobby_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hobby_category_hobby ADD CONSTRAINT FK_83F8A1B322B2123 FOREIGN KEY (hobby_id) REFERENCES hobby (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE hobby_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hobby_category_id_seq CASCADE');
        $this->addSql('ALTER TABLE hobby_category_hobby DROP CONSTRAINT FK_83F8A1B66F52379');
        $this->addSql('ALTER TABLE hobby_category_hobby DROP CONSTRAINT FK_83F8A1B322B2123');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE hobby_category');
        $this->addSql('DROP TABLE hobby_category_hobby');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
