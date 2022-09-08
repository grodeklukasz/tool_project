<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908121948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE benutzer (id INT AUTO_INCREMENT NOT NULL, kst_id INT NOT NULL, vorname VARCHAR(255) NOT NULL, nachname VARCHAR(255) NOT NULL, mobiltelefon VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, festnetznummer VARCHAR(255) DEFAULT NULL, INDEX IDX_36144FC710DEEFCC (kst_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hersteller (id INT AUTO_INCREMENT NOT NULL, companyname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, benutzer_id INT NOT NULL, hersteller_id INT NOT NULL, type VARCHAR(255) NOT NULL, inventarnummer VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, seriennummer VARCHAR(255) NOT NULL, bemerkung LONGTEXT NOT NULL, INDEX IDX_1F1B251E9F9AC274 (benutzer_id), INDEX IDX_1F1B251E5FC5D8BE (hersteller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kst (id INT AUTO_INCREMENT NOT NULL, kstnummer VARCHAR(255) NOT NULL, abteilung VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE standort (id INT AUTO_INCREMENT NOT NULL, item_id INT NOT NULL, standortname VARCHAR(255) NOT NULL, ort VARCHAR(255) NOT NULL, raum VARCHAR(255) NOT NULL, INDEX IDX_7DEEAE9126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE benutzer ADD CONSTRAINT FK_36144FC710DEEFCC FOREIGN KEY (kst_id) REFERENCES kst (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E9F9AC274 FOREIGN KEY (benutzer_id) REFERENCES benutzer (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E5FC5D8BE FOREIGN KEY (hersteller_id) REFERENCES hersteller (id)');
        $this->addSql('ALTER TABLE standort ADD CONSTRAINT FK_7DEEAE9126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE benutzer DROP FOREIGN KEY FK_36144FC710DEEFCC');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E9F9AC274');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E5FC5D8BE');
        $this->addSql('ALTER TABLE standort DROP FOREIGN KEY FK_7DEEAE9126F525E');
        $this->addSql('DROP TABLE benutzer');
        $this->addSql('DROP TABLE hersteller');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE kst');
        $this->addSql('DROP TABLE standort');
    }
}
