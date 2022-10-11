<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011080646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE netzwerk DROP FOREIGN KEY FK_25818B51588CAAD');
        $this->addSql('DROP INDEX IDX_25818B51588CAAD ON netzwerk');
        $this->addSql('ALTER TABLE netzwerk ADD mac_addr VARCHAR(255) DEFAULT NULL, ADD ip_addr VARCHAR(255) DEFAULT NULL, CHANGE standort_id location_id INT NOT NULL');
        $this->addSql('ALTER TABLE netzwerk ADD CONSTRAINT FK_25818B5164D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_25818B5164D218E ON netzwerk (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE netzwerk DROP FOREIGN KEY FK_25818B5164D218E');
        $this->addSql('DROP INDEX IDX_25818B5164D218E ON netzwerk');
        $this->addSql('ALTER TABLE netzwerk DROP mac_addr, DROP ip_addr, CHANGE location_id standort_id INT NOT NULL');
        $this->addSql('ALTER TABLE netzwerk ADD CONSTRAINT FK_25818B51588CAAD FOREIGN KEY (standort_id) REFERENCES standort (id)');
        $this->addSql('CREATE INDEX IDX_25818B51588CAAD ON netzwerk (standort_id)');
    }
}
