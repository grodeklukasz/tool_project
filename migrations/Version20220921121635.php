<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220921121635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE printer (id INT AUTO_INCREMENT NOT NULL, producer_id INT NOT NULL, inventarnummer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, duplex VARCHAR(255) NOT NULL, drucktechnik VARCHAR(255) NOT NULL, netzwerk VARCHAR(255) NOT NULL, farbtone VARCHAR(255) NOT NULL, kopieren VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, mac1 VARCHAR(255) DEFAULT NULL, mac2 VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_8D4C79ED89B658FE (producer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE printer ADD CONSTRAINT FK_8D4C79ED89B658FE FOREIGN KEY (producer_id) REFERENCES hersteller (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE printer DROP FOREIGN KEY FK_8D4C79ED89B658FE');
        $this->addSql('DROP TABLE printer');
    }
}
