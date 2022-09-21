<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920135552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE laptop (id INT AUTO_INCREMENT NOT NULL, location_id INT NOT NULL, producer_id INT NOT NULL, benutzer_id INT NOT NULL, inventarnummer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, processor VARCHAR(255) NOT NULL, ram VARCHAR(255) NOT NULL, hdd1 VARCHAR(255) NOT NULL, hdd2 VARCHAR(255) DEFAULT NULL, hdd1_capacity VARCHAR(255) NOT NULL, hdd2_capacity VARCHAR(255) DEFAULT NULL, hdd1_type VARCHAR(255) NOT NULL, hdd2_type VARCHAR(255) DEFAULT NULL, graphiccard VARCHAR(255) NOT NULL, musiccard VARCHAR(255) DEFAULT NULL, os VARCHAR(255) NOT NULL, ports VARCHAR(255) NOT NULL, note VARCHAR(255) DEFAULT NULL, computername VARCHAR(255) NOT NULL, opticaldrive VARCHAR(255) DEFAULT NULL, mac1 VARCHAR(255) DEFAULT NULL, mac2 VARCHAR(255) DEFAULT NULL, INDEX IDX_E001563B64D218E (location_id), INDEX IDX_E001563B89B658FE (producer_id), INDEX IDX_E001563B9F9AC274 (benutzer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE laptop ADD CONSTRAINT FK_E001563B64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE laptop ADD CONSTRAINT FK_E001563B89B658FE FOREIGN KEY (producer_id) REFERENCES hersteller (id)');
        $this->addSql('ALTER TABLE laptop ADD CONSTRAINT FK_E001563B9F9AC274 FOREIGN KEY (benutzer_id) REFERENCES benutzer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE laptop DROP FOREIGN KEY FK_E001563B64D218E');
        $this->addSql('ALTER TABLE laptop DROP FOREIGN KEY FK_E001563B89B658FE');
        $this->addSql('ALTER TABLE laptop DROP FOREIGN KEY FK_E001563B9F9AC274');
        $this->addSql('DROP TABLE laptop');
    }
}
