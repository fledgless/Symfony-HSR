<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240824153402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE base_character (id INT AUTO_INCREMENT NOT NULL, kit_id INT DEFAULT NULL, eidolons_id INT DEFAULT NULL, character_name VARCHAR(255) NOT NULL, character_rarity VARCHAR(255) NOT NULL, character_path VARCHAR(255) NOT NULL, character_type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_205621B93A8E60EF (kit_id), UNIQUE INDEX UNIQ_205621B91C8E87F1 (eidolons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_eidolons (id INT AUTO_INCREMENT NOT NULL, eidolon_names JSON DEFAULT NULL, eidolon_descriptions JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit (id INT AUTO_INCREMENT NOT NULL, character_normal_attack_name VARCHAR(255) DEFAULT NULL, character_normal_attack_desc VARCHAR(1000) DEFAULT NULL, character_skill_name VARCHAR(255) DEFAULT NULL, character_skill_desc VARCHAR(1000) DEFAULT NULL, character_ult_name VARCHAR(255) DEFAULT NULL, character_name_desc VARCHAR(1000) DEFAULT NULL, character_talent_name VARCHAR(255) DEFAULT NULL, character_talent_desc VARCHAR(1000) DEFAULT NULL, character_technique_name VARCHAR(255) DEFAULT NULL, character_technique_desc VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B93A8E60EF FOREIGN KEY (kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B91C8E87F1 FOREIGN KEY (eidolons_id) REFERENCES character_eidolons (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B93A8E60EF');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B91C8E87F1');
        $this->addSql('DROP TABLE base_character');
        $this->addSql('DROP TABLE character_eidolons');
        $this->addSql('DROP TABLE character_kit');
    }
}
