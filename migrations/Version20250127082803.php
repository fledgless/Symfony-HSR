<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250127082803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_kit DROP FOREIGN KEY FK_133E438618777CEF');
        $this->addSql('ALTER TABLE boss_mat DROP FOREIGN KEY FK_4139099754B9D732');
        $this->addSql('ALTER TABLE character_skill DROP FOREIGN KEY FK_A0FE031554B9D732');
        $this->addSql('ALTER TABLE echo_of_war DROP FOREIGN KEY FK_A4D428A554B9D732');
        $this->addSql('ALTER TABLE echos_boss DROP FOREIGN KEY FK_E715037254B9D732');
        $this->addSql('ALTER TABLE elite_enemy DROP FOREIGN KEY FK_40EEB32954B9D732');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB54B9D732');
        $this->addSql('ALTER TABLE memosprite_skill DROP FOREIGN KEY FK_8474B93754B9D732');
        $this->addSql('ALTER TABLE normal_enemy DROP FOREIGN KEY FK_B638B9F354B9D732');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0F54B9D732');
        $this->addSql('ALTER TABLE stagnant_shadow DROP FOREIGN KEY FK_2D8BA4CC54B9D732');
        $this->addSql('ALTER TABLE stat DROP FOREIGN KEY FK_20B8FF2154B9D732');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE572954B9D732');
        $this->addSql('ALTER TABLE weekly_mat DROP FOREIGN KEY FK_834A616754B9D732');
        $this->addSql('CREATE TABLE character_eidolon (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, number INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, pull_worth VARCHAR(255) DEFAULT NULL, recommendation LONGTEXT DEFAULT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_4E95D3899CCA37C (character_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_eidolon ADD CONSTRAINT FK_4E95D3899CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE ascension_mats_media DROP FOREIGN KEY FK_F0AA583EEA9FDD75');
        $this->addSql('ALTER TABLE ascension_mats_media DROP FOREIGN KEY FK_F0AA583EE13DC9B6');
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07EA9FDD75');
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07A259E1AD');
        $this->addSql('ALTER TABLE character_eidolons DROP FOREIGN KEY FK_33089EC899CCA37C');
        $this->addSql('ALTER TABLE character_eidolons DROP FOREIGN KEY FK_33089EC854B9D732');
        $this->addSql('ALTER TABLE character_kit_media DROP FOREIGN KEY FK_393A0A7799CCA37C');
        $this->addSql('ALTER TABLE character_kit_media DROP FOREIGN KEY FK_393A0A77EA9FDD75');
        $this->addSql('ALTER TABLE character_talent DROP FOREIGN KEY FK_B59BC16699CCA37C');
        $this->addSql('ALTER TABLE character_talent DROP FOREIGN KEY FK_B59BC16654B9D732');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DBEA9FDD75');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DB4456FEFA');
        $this->addSql('ALTER TABLE memosprite_media DROP FOREIGN KEY FK_B065FC4CEA9FDD75');
        $this->addSql('ALTER TABLE memosprite_media DROP FOREIGN KEY FK_B065FC4CE52ECF74');
        $this->addSql('ALTER TABLE memosprite_talent DROP FOREIGN KEY FK_60DF0A38E52ECF74');
        $this->addSql('ALTER TABLE memosprite_talent DROP FOREIGN KEY FK_60DF0A3854B9D732');
        $this->addSql('ALTER TABLE trace_mats_media DROP FOREIGN KEY FK_7B27960BEA9FDD75');
        $this->addSql('ALTER TABLE trace_mats_media DROP FOREIGN KEY FK_7B27960B49213874');
        $this->addSql('DROP TABLE ascension_mats_media');
        $this->addSql('DROP TABLE base_character_media');
        $this->addSql('DROP TABLE character_eidolons');
        $this->addSql('DROP TABLE character_kit_media');
        $this->addSql('DROP TABLE character_talent');
        $this->addSql('DROP TABLE light_cone_media');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE memosprite_media');
        $this->addSql('DROP TABLE memosprite_talent');
        $this->addSql('DROP TABLE trace_mats_media');
        $this->addSql('ALTER TABLE ascension_mats ADD four_star_filename VARCHAR(255) NOT NULL, ADD three_star_filename VARCHAR(255) NOT NULL, ADD two_star_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE base_character ADD icon_filename VARCHAR(255) NOT NULL, ADD splash_filename VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_4139099754B9D732 ON boss_mat');
        $this->addSql('ALTER TABLE boss_mat ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_133E438618777CEF ON character_kit');
        $this->addSql('ALTER TABLE character_kit ADD main_trace_one_name VARCHAR(255) NOT NULL, ADD main_trace_one_desc LONGTEXT DEFAULT NULL, ADD main_trace_one_filename VARCHAR(255) NOT NULL, ADD main_trace_two_name VARCHAR(255) NOT NULL, ADD main_trace_two_desc LONGTEXT DEFAULT NULL, ADD main_trace_two_filename VARCHAR(255) NOT NULL, ADD main_trace_three_name VARCHAR(255) NOT NULL, ADD main_trace_three_desc LONGTEXT DEFAULT NULL, ADD main_trace_three_filename VARCHAR(255) NOT NULL, ADD technique_name VARCHAR(255) NOT NULL, ADD technique_desc LONGTEXT DEFAULT NULL, ADD technique_filename VARCHAR(255) NOT NULL, DROP talent_id, DROP main_trace_one, DROP main_trace_two, DROP main_trace_three, DROP technique');
        $this->addSql('DROP INDEX UNIQ_A0FE031554B9D732 ON character_skill');
        $this->addSql('ALTER TABLE character_skill ADD tag VARCHAR(255) NOT NULL, ADD filename VARCHAR(255) NOT NULL, CHANGE icon_id energy_cost INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_A4D428A554B9D732 ON echo_of_war');
        $this->addSql('ALTER TABLE echo_of_war ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_E715037254B9D732 ON echos_boss');
        $this->addSql('ALTER TABLE echos_boss ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_40EEB32954B9D732 ON elite_enemy');
        $this->addSql('ALTER TABLE elite_enemy ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('ALTER TABLE light_cone ADD icon_filename VARCHAR(255) NOT NULL, ADD splash_filename VARCHAR(255) NOT NULL, ADD full_art_filename VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_5E9E89CB54B9D732 ON location');
        $this->addSql('ALTER TABLE location ADD filename VARCHAR(255) DEFAULT NULL, DROP icon_id');
        $this->addSql('ALTER TABLE memosprite ADD filename VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8474B93754B9D732 ON memosprite_skill');
        $this->addSql('ALTER TABLE memosprite_skill ADD tag VARCHAR(255) DEFAULT NULL, ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_B638B9F354B9D732 ON normal_enemy');
        $this->addSql('ALTER TABLE normal_enemy ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_B548B0F54B9D732 ON path');
        $this->addSql('ALTER TABLE path ADD slug VARCHAR(255) NOT NULL, ADD aeon VARCHAR(255) DEFAULT NULL, ADD path_desc LONGTEXT DEFAULT NULL, ADD gameplay_desc LONGTEXT DEFAULT NULL, ADD data_bank_entry LONGTEXT DEFAULT NULL, ADD path_filename VARCHAR(255) DEFAULT NULL, ADD aeon_filename VARCHAR(255) DEFAULT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_2D8BA4CC54B9D732 ON stagnant_shadow');
        $this->addSql('ALTER TABLE stagnant_shadow ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('DROP INDEX UNIQ_20B8FF2154B9D732 ON stat');
        $this->addSql('ALTER TABLE stat ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
        $this->addSql('ALTER TABLE trace_mats ADD four_star_filename VARCHAR(255) NOT NULL, ADD three_star_filename VARCHAR(255) NOT NULL, ADD two_star_filename VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8CDE572954B9D732 ON type');
        $this->addSql('ALTER TABLE type ADD slug VARCHAR(255) NOT NULL, ADD elemental_debuff VARCHAR(255) DEFAULT NULL, ADD type_filename VARCHAR(255) DEFAULT NULL, ADD debuff_filename VARCHAR(255) DEFAULT NULL, CHANGE icon_id break_multiplier INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD server VARCHAR(255) DEFAULT NULL, ADD pfp_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_834A616754B9D732 ON weekly_mat');
        $this->addSql('ALTER TABLE weekly_mat ADD filename VARCHAR(255) NOT NULL, DROP icon_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ascension_mats_media (ascension_mats_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_F0AA583EE13DC9B6 (ascension_mats_id), INDEX IDX_F0AA583EEA9FDD75 (media_id), PRIMARY KEY(ascension_mats_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE base_character_media (base_character_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_F75B1F07A259E1AD (base_character_id), INDEX IDX_F75B1F07EA9FDD75 (media_id), PRIMARY KEY(base_character_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE character_eidolons (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, icon_id INT DEFAULT NULL, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, pull_worth VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, recommendation LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_33089EC899CCA37C (character_kit_id), UNIQUE INDEX UNIQ_33089EC854B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE character_kit_media (character_kit_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_393A0A7799CCA37C (character_kit_id), INDEX IDX_393A0A77EA9FDD75 (media_id), PRIMARY KEY(character_kit_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE character_talent (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_two LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_three LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_four LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_five LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_six LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_seven LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_eight LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_nine LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_ten LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_eleven LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_twelve LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_B59BC16654B9D732 (icon_id), UNIQUE INDEX UNIQ_B59BC16699CCA37C (character_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE light_cone_media (light_cone_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_C34D34DB4456FEFA (light_cone_id), INDEX IDX_C34D34DBEA9FDD75 (media_id), PRIMARY KEY(light_cone_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, filename VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE memosprite_media (memosprite_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B065FC4CE52ECF74 (memosprite_id), INDEX IDX_B065FC4CEA9FDD75 (media_id), PRIMARY KEY(memosprite_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE memosprite_talent (id INT AUTO_INCREMENT NOT NULL, icon_id INT DEFAULT NULL, memosprite_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, level_up TINYINT(1) NOT NULL, desc_unique LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_one LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_two LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_three LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_four LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_five LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_six LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, desc_level_seven LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_60DF0A38E52ECF74 (memosprite_id), UNIQUE INDEX UNIQ_60DF0A3854B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE trace_mats_media (trace_mats_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_7B27960B49213874 (trace_mats_id), INDEX IDX_7B27960BEA9FDD75 (media_id), PRIMARY KEY(trace_mats_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ascension_mats_media ADD CONSTRAINT FK_F0AA583EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ascension_mats_media ADD CONSTRAINT FK_F0AA583EE13DC9B6 FOREIGN KEY (ascension_mats_id) REFERENCES ascension_mats (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07A259E1AD FOREIGN KEY (base_character_id) REFERENCES base_character (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_eidolons ADD CONSTRAINT FK_33089EC899CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_eidolons ADD CONSTRAINT FK_33089EC854B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_kit_media ADD CONSTRAINT FK_393A0A7799CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit_media ADD CONSTRAINT FK_393A0A77EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC16699CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC16654B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DBEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DB4456FEFA FOREIGN KEY (light_cone_id) REFERENCES light_cone (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE memosprite_media ADD CONSTRAINT FK_B065FC4CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE memosprite_media ADD CONSTRAINT FK_B065FC4CE52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE memosprite_talent ADD CONSTRAINT FK_60DF0A38E52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE memosprite_talent ADD CONSTRAINT FK_60DF0A3854B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE trace_mats_media ADD CONSTRAINT FK_7B27960BEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trace_mats_media ADD CONSTRAINT FK_7B27960B49213874 FOREIGN KEY (trace_mats_id) REFERENCES trace_mats (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_eidolon DROP FOREIGN KEY FK_4E95D3899CCA37C');
        $this->addSql('DROP TABLE character_eidolon');
        $this->addSql('ALTER TABLE ascension_mats DROP four_star_filename, DROP three_star_filename, DROP two_star_filename');
        $this->addSql('ALTER TABLE base_character DROP icon_filename, DROP splash_filename');
        $this->addSql('ALTER TABLE boss_mat ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE boss_mat ADD CONSTRAINT FK_4139099754B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4139099754B9D732 ON boss_mat (icon_id)');
        $this->addSql('ALTER TABLE character_kit ADD talent_id INT DEFAULT NULL, ADD main_trace_one JSON DEFAULT NULL, ADD main_trace_two JSON DEFAULT NULL, ADD main_trace_three JSON DEFAULT NULL, ADD technique JSON DEFAULT NULL, DROP main_trace_one_name, DROP main_trace_one_desc, DROP main_trace_one_filename, DROP main_trace_two_name, DROP main_trace_two_desc, DROP main_trace_two_filename, DROP main_trace_three_name, DROP main_trace_three_desc, DROP main_trace_three_filename, DROP technique_name, DROP technique_desc, DROP technique_filename');
        $this->addSql('ALTER TABLE character_kit ADD CONSTRAINT FK_133E438618777CEF FOREIGN KEY (talent_id) REFERENCES character_talent (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_133E438618777CEF ON character_kit (talent_id)');
        $this->addSql('ALTER TABLE character_skill DROP tag, DROP filename, CHANGE energy_cost icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE031554B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A0FE031554B9D732 ON character_skill (icon_id)');
        $this->addSql('ALTER TABLE echo_of_war ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE echo_of_war ADD CONSTRAINT FK_A4D428A554B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4D428A554B9D732 ON echo_of_war (icon_id)');
        $this->addSql('ALTER TABLE echos_boss ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE echos_boss ADD CONSTRAINT FK_E715037254B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E715037254B9D732 ON echos_boss (icon_id)');
        $this->addSql('ALTER TABLE elite_enemy ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE elite_enemy ADD CONSTRAINT FK_40EEB32954B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40EEB32954B9D732 ON elite_enemy (icon_id)');
        $this->addSql('ALTER TABLE light_cone DROP icon_filename, DROP splash_filename, DROP full_art_filename');
        $this->addSql('ALTER TABLE location ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB54B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E9E89CB54B9D732 ON location (icon_id)');
        $this->addSql('ALTER TABLE memosprite DROP filename');
        $this->addSql('ALTER TABLE memosprite_skill ADD icon_id INT DEFAULT NULL, DROP tag, DROP filename');
        $this->addSql('ALTER TABLE memosprite_skill ADD CONSTRAINT FK_8474B93754B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8474B93754B9D732 ON memosprite_skill (icon_id)');
        $this->addSql('ALTER TABLE normal_enemy ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE normal_enemy ADD CONSTRAINT FK_B638B9F354B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B638B9F354B9D732 ON normal_enemy (icon_id)');
        $this->addSql('ALTER TABLE path ADD icon_id INT DEFAULT NULL, DROP slug, DROP aeon, DROP path_desc, DROP gameplay_desc, DROP data_bank_entry, DROP path_filename, DROP aeon_filename');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0F54B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B548B0F54B9D732 ON path (icon_id)');
        $this->addSql('ALTER TABLE stagnant_shadow ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE stagnant_shadow ADD CONSTRAINT FK_2D8BA4CC54B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2D8BA4CC54B9D732 ON stagnant_shadow (icon_id)');
        $this->addSql('ALTER TABLE stat ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE stat ADD CONSTRAINT FK_20B8FF2154B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20B8FF2154B9D732 ON stat (icon_id)');
        $this->addSql('ALTER TABLE trace_mats DROP four_star_filename, DROP three_star_filename, DROP two_star_filename');
        $this->addSql('ALTER TABLE type DROP slug, DROP elemental_debuff, DROP type_filename, DROP debuff_filename, CHANGE break_multiplier icon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE572954B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8CDE572954B9D732 ON type (icon_id)');
        $this->addSql('ALTER TABLE `user` DROP server, DROP pfp_filename');
        $this->addSql('ALTER TABLE weekly_mat ADD icon_id INT DEFAULT NULL, DROP filename');
        $this->addSql('ALTER TABLE weekly_mat ADD CONSTRAINT FK_834A616754B9D732 FOREIGN KEY (icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_834A616754B9D732 ON weekly_mat (icon_id)');
    }
}
