<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920061620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workstation ADD hdd1_capacity VARCHAR(255) DEFAULT NULL, ADD hdd2_capacity VARCHAR(255) DEFAULT NULL, ADD hdd3_capacity VARCHAR(255) DEFAULT NULL, ADD hdd1_type VARCHAR(255) DEFAULT NULL, ADD hdd2_type VARCHAR(255) DEFAULT NULL, ADD hdd3_type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workstation DROP hdd1_capacity, DROP hdd2_capacity, DROP hdd3_capacity, DROP hdd1_type, DROP hdd2_type, DROP hdd3_type');
    }
}
