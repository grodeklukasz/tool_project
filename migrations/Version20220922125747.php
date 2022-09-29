<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922125747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE printer ADD benutzer_id INT NOT NULL, ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE printer ADD CONSTRAINT FK_8D4C79ED9F9AC274 FOREIGN KEY (benutzer_id) REFERENCES benutzer (id)');
        $this->addSql('ALTER TABLE printer ADD CONSTRAINT FK_8D4C79ED64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_8D4C79ED9F9AC274 ON printer (benutzer_id)');
        $this->addSql('CREATE INDEX IDX_8D4C79ED64D218E ON printer (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE printer DROP FOREIGN KEY FK_8D4C79ED9F9AC274');
        $this->addSql('ALTER TABLE printer DROP FOREIGN KEY FK_8D4C79ED64D218E');
        $this->addSql('DROP INDEX IDX_8D4C79ED9F9AC274 ON printer');
        $this->addSql('DROP INDEX IDX_8D4C79ED64D218E ON printer');
        $this->addSql('ALTER TABLE printer DROP benutzer_id, DROP location_id');
    }
}
