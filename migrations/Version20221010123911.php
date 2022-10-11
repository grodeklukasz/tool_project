<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221010123911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE netzwerk (id INT AUTO_INCREMENT NOT NULL, hersteller_id INT NOT NULL, standort_id INT NOT NULL, user_id INT NOT NULL, inventarnummer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_25818B515FC5D8BE (hersteller_id), INDEX IDX_25818B51588CAAD (standort_id), INDEX IDX_25818B51A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE netzwerk ADD CONSTRAINT FK_25818B515FC5D8BE FOREIGN KEY (hersteller_id) REFERENCES hersteller (id)');
        $this->addSql('ALTER TABLE netzwerk ADD CONSTRAINT FK_25818B51588CAAD FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE netzwerk ADD CONSTRAINT FK_25818B51A76ED395 FOREIGN KEY (user_id) REFERENCES benutzer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE netzwerk DROP FOREIGN KEY FK_25818B515FC5D8BE');
        $this->addSql('ALTER TABLE netzwerk DROP FOREIGN KEY FK_25818B51588CAAD');
        $this->addSql('ALTER TABLE netzwerk DROP FOREIGN KEY FK_25818B51A76ED395');
        $this->addSql('DROP TABLE netzwerk');
    }
}
