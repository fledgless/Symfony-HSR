<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241209150238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_stories (id INT AUTO_INCREMENT NOT NULL, character_stories_character_id INT DEFAULT NULL, character_details LONGTEXT DEFAULT NULL, character_story_part_one LONGTEXT DEFAULT NULL, character_story_part_two LONGTEXT DEFAULT NULL, character_story_part_three LONGTEXT DEFAULT NULL, character_story_part_four LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_F52E1D6295FABCD7 (character_stories_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_voiceline (id INT AUTO_INCREMENT NOT NULL, voiceline_character_id INT DEFAULT NULL, voiceline_name VARCHAR(255) NOT NULL, voiceline_content LONGTEXT DEFAULT NULL, voiceline_category VARCHAR(255) DEFAULT NULL, INDEX IDX_DAE759C8E37CC563 (voiceline_character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_stories ADD CONSTRAINT FK_F52E1D6295FABCD7 FOREIGN KEY (character_stories_character_id) REFERENCES base_character (id)');
        $this->addSql('ALTER TABLE character_voiceline ADD CONSTRAINT FK_DAE759C8E37CC563 FOREIGN KEY (voiceline_character_id) REFERENCES base_character (id)');
        $this->addSql('ALTER TABLE base_character ADD character_banner_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE light_cone ADD lc_version_release VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_stories DROP FOREIGN KEY FK_F52E1D6295FABCD7');
        $this->addSql('ALTER TABLE character_voiceline DROP FOREIGN KEY FK_DAE759C8E37CC563');
        $this->addSql('DROP TABLE character_stories');
        $this->addSql('DROP TABLE character_voiceline');
        $this->addSql('ALTER TABLE base_character DROP character_banner_name');
        $this->addSql('ALTER TABLE light_cone DROP lc_version_release');
    }
}
