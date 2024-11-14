<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114220414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE light_cone ADD lc_story LONGTEXT DEFAULT NULL, ADD lc_skill_one LONGTEXT DEFAULT NULL, ADD lc_skill_two LONGTEXT DEFAULT NULL, ADD lc_skill_three LONGTEXT NOT NULL, ADD lc_skill_four LONGTEXT DEFAULT NULL, ADD lc_skill_five LONGTEXT DEFAULT NULL, DROP lc_desc, DROP lc_superimposition');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE light_cone ADD lc_desc VARCHAR(2000) DEFAULT NULL, ADD lc_superimposition VARCHAR(2000) DEFAULT NULL, DROP lc_story, DROP lc_skill_one, DROP lc_skill_two, DROP lc_skill_three, DROP lc_skill_four, DROP lc_skill_five');
    }
}
