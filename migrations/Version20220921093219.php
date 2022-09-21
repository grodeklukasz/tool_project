<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220921093219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE handy (id INT AUTO_INCREMENT NOT NULL, benutzer_id INT NOT NULL, location_id INT NOT NULL, producer_id INT NOT NULL, inventarnummer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, imei1 VARCHAR(255) NOT NULL, imei2 VARCHAR(255) DEFAULT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_86FBDAE69F9AC274 (benutzer_id), INDEX IDX_86FBDAE664D218E (location_id), INDEX IDX_86FBDAE689B658FE (producer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE handy ADD CONSTRAINT FK_86FBDAE69F9AC274 FOREIGN KEY (benutzer_id) REFERENCES benutzer (id)');
        $this->addSql('ALTER TABLE handy ADD CONSTRAINT FK_86FBDAE664D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE handy ADD CONSTRAINT FK_86FBDAE689B658FE FOREIGN KEY (producer_id) REFERENCES hersteller (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE handy DROP FOREIGN KEY FK_86FBDAE69F9AC274');
        $this->addSql('ALTER TABLE handy DROP FOREIGN KEY FK_86FBDAE664D218E');
        $this->addSql('ALTER TABLE handy DROP FOREIGN KEY FK_86FBDAE689B658FE');
        $this->addSql('DROP TABLE handy');
    }
}
