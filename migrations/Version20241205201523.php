<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241205201523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ascension_mats (id INT AUTO_INCREMENT NOT NULL, asc_mat_four_star_name VARCHAR(255) NOT NULL, asc_mat_three_star_name VARCHAR(255) NOT NULL, asc_mat_two_star_name VARCHAR(255) NOT NULL, asc_mat_released TINYINT(1) NOT NULL, asc_mat_announced TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ascension_mats_media (ascension_mats_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_F0AA583EE13DC9B6 (ascension_mats_id), INDEX IDX_F0AA583EEA9FDD75 (media_id), PRIMARY KEY(ascension_mats_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ascension_mats_normal_enemy (ascension_mats_id INT NOT NULL, normal_enemy_id INT NOT NULL, INDEX IDX_570201ABE13DC9B6 (ascension_mats_id), INDEX IDX_570201ABCCC6A560 (normal_enemy_id), PRIMARY KEY(ascension_mats_id, normal_enemy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_character (id INT AUTO_INCREMENT NOT NULL, character_path_id INT DEFAULT NULL, character_type_id INT DEFAULT NULL, eidolons_id INT DEFAULT NULL, character_name VARCHAR(255) NOT NULL, character_slug VARCHAR(255) NOT NULL, character_rarity VARCHAR(255) NOT NULL, character_released TINYINT(1) NOT NULL, character_announced TINYINT(1) NOT NULL, character_release_date DATE DEFAULT NULL, character_release_version VARCHAR(255) NOT NULL, INDEX IDX_205621B9B0C9D656 (character_path_id), INDEX IDX_205621B9ACE90CAE (character_type_id), UNIQUE INDEX UNIQ_205621B91C8E87F1 (eidolons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_character_media (base_character_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_F75B1F07A259E1AD (base_character_id), INDEX IDX_F75B1F07EA9FDD75 (media_id), PRIMARY KEY(base_character_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_eidolons (id INT AUTO_INCREMENT NOT NULL, eidolon_one JSON DEFAULT NULL, eidolon_two JSON DEFAULT NULL, eidolon_three JSON DEFAULT NULL, eidolon_four JSON DEFAULT NULL, eidolon_five JSON DEFAULT NULL, eidolon_six JSON DEFAULT NULL, stop_point LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_eidolons_media (character_eidolons_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_90003B1E18E42D5D (character_eidolons_id), INDEX IDX_90003B1EEA9FDD75 (media_id), PRIMARY KEY(character_eidolons_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE light_cone (id INT AUTO_INCREMENT NOT NULL, lc_path_id INT DEFAULT NULL, lc_name VARCHAR(255) NOT NULL, lc_slug VARCHAR(255) NOT NULL, lc_rarity VARCHAR(255) NOT NULL, lc_base_atk INT DEFAULT NULL, lc_base_def INT DEFAULT NULL, lc_base_hp INT DEFAULT NULL, lc_story LONGTEXT DEFAULT NULL, lc_skill_one LONGTEXT DEFAULT NULL, lc_skill_two LONGTEXT DEFAULT NULL, lc_skill_three LONGTEXT DEFAULT NULL, lc_skill_four LONGTEXT DEFAULT NULL, lc_skill_five LONGTEXT DEFAULT NULL, lc_skill_name VARCHAR(255) DEFAULT NULL, INDEX IDX_3CA8009485B95996 (lc_path_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE light_cone_media (light_cone_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_C34D34DB4456FEFA (light_cone_id), INDEX IDX_C34D34DBEA9FDD75 (media_id), PRIMARY KEY(light_cone_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, media_name VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, image_role VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE normal_enemy (id INT AUTO_INCREMENT NOT NULL, normal_enemy_icon_id INT DEFAULT NULL, normal_enemy_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B638B9F3935657E1 (normal_enemy_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE normal_enemy_world (normal_enemy_id INT NOT NULL, world_id INT NOT NULL, INDEX IDX_CAD2AEE1CCC6A560 (normal_enemy_id), INDEX IDX_CAD2AEE18925311C (world_id), PRIMARY KEY(normal_enemy_id, world_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path (id INT AUTO_INCREMENT NOT NULL, path_icon_id INT DEFAULT NULL, path_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B548B0F930FE11B (path_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_icon_id INT DEFAULT NULL, type_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8CDE57297C98B8C7 (type_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE world (id INT AUTO_INCREMENT NOT NULL, world_icon_id INT DEFAULT NULL, world_name VARCHAR(255) NOT NULL, world_released TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3A771143BBFCF965 (world_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ascension_mats_media ADD CONSTRAINT FK_F0AA583EE13DC9B6 FOREIGN KEY (ascension_mats_id) REFERENCES ascension_mats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ascension_mats_media ADD CONSTRAINT FK_F0AA583EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ascension_mats_normal_enemy ADD CONSTRAINT FK_570201ABE13DC9B6 FOREIGN KEY (ascension_mats_id) REFERENCES ascension_mats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ascension_mats_normal_enemy ADD CONSTRAINT FK_570201ABCCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B9B0C9D656 FOREIGN KEY (character_path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B9ACE90CAE FOREIGN KEY (character_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B91C8E87F1 FOREIGN KEY (eidolons_id) REFERENCES character_eidolons (id)');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07A259E1AD FOREIGN KEY (base_character_id) REFERENCES base_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_eidolons_media ADD CONSTRAINT FK_90003B1E18E42D5D FOREIGN KEY (character_eidolons_id) REFERENCES character_eidolons (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_eidolons_media ADD CONSTRAINT FK_90003B1EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA8009485B95996 FOREIGN KEY (lc_path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DB4456FEFA FOREIGN KEY (light_cone_id) REFERENCES light_cone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DBEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy ADD CONSTRAINT FK_B638B9F3935657E1 FOREIGN KEY (normal_enemy_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE normal_enemy_world ADD CONSTRAINT FK_CAD2AEE1CCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy_world ADD CONSTRAINT FK_CAD2AEE18925311C FOREIGN KEY (world_id) REFERENCES world (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0F930FE11B FOREIGN KEY (path_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE57297C98B8C7 FOREIGN KEY (type_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE world ADD CONSTRAINT FK_3A771143BBFCF965 FOREIGN KEY (world_icon_id) REFERENCES media (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ascension_mats_media DROP FOREIGN KEY FK_F0AA583EE13DC9B6');
        $this->addSql('ALTER TABLE ascension_mats_media DROP FOREIGN KEY FK_F0AA583EEA9FDD75');
        $this->addSql('ALTER TABLE ascension_mats_normal_enemy DROP FOREIGN KEY FK_570201ABE13DC9B6');
        $this->addSql('ALTER TABLE ascension_mats_normal_enemy DROP FOREIGN KEY FK_570201ABCCC6A560');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B9B0C9D656');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B9ACE90CAE');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B91C8E87F1');
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07A259E1AD');
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07EA9FDD75');
        $this->addSql('ALTER TABLE character_eidolons_media DROP FOREIGN KEY FK_90003B1E18E42D5D');
        $this->addSql('ALTER TABLE character_eidolons_media DROP FOREIGN KEY FK_90003B1EEA9FDD75');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA8009485B95996');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DB4456FEFA');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DBEA9FDD75');
        $this->addSql('ALTER TABLE normal_enemy DROP FOREIGN KEY FK_B638B9F3935657E1');
        $this->addSql('ALTER TABLE normal_enemy_world DROP FOREIGN KEY FK_CAD2AEE1CCC6A560');
        $this->addSql('ALTER TABLE normal_enemy_world DROP FOREIGN KEY FK_CAD2AEE18925311C');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0F930FE11B');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE57297C98B8C7');
        $this->addSql('ALTER TABLE world DROP FOREIGN KEY FK_3A771143BBFCF965');
        $this->addSql('DROP TABLE ascension_mats');
        $this->addSql('DROP TABLE ascension_mats_media');
        $this->addSql('DROP TABLE ascension_mats_normal_enemy');
        $this->addSql('DROP TABLE base_character');
        $this->addSql('DROP TABLE base_character_media');
        $this->addSql('DROP TABLE character_eidolons');
        $this->addSql('DROP TABLE character_eidolons_media');
        $this->addSql('DROP TABLE light_cone');
        $this->addSql('DROP TABLE light_cone_media');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE normal_enemy');
        $this->addSql('DROP TABLE normal_enemy_world');
        $this->addSql('DROP TABLE path');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE world');
    }
}
