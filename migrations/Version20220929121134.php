<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220929121134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE monitor (id INT AUTO_INCREMENT NOT NULL, location_id INT NOT NULL, hersteller_id INT NOT NULL, user_id INT NOT NULL, inventarnummer VARCHAR(255) NOT NULL, modell VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, size VARCHAR(255) DEFAULT NULL, ports VARCHAR(255) DEFAULT NULL, INDEX IDX_E115998564D218E (location_id), INDEX IDX_E11599855FC5D8BE (hersteller_id), INDEX IDX_E1159985A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E115998564D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E11599855FC5D8BE FOREIGN KEY (hersteller_id) REFERENCES hersteller (id)');
        $this->addSql('ALTER TABLE monitor ADD CONSTRAINT FK_E1159985A76ED395 FOREIGN KEY (user_id) REFERENCES benutzer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E115998564D218E');
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E11599855FC5D8BE');
        $this->addSql('ALTER TABLE monitor DROP FOREIGN KEY FK_E1159985A76ED395');
        $this->addSql('DROP TABLE monitor');
    }
}
