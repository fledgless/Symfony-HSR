<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250107225457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_basic_atk (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, INDEX IDX_682C9CEA99CCA37C (character_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_basic_atk_media (character_basic_atk_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_EF1D357B2D1839DB (character_basic_atk_id), INDEX IDX_EF1D357BEA9FDD75 (media_id), PRIMARY KEY(character_basic_atk_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, character_talent_id INT DEFAULT NULL, base_hp INT DEFAULT NULL, base_atk INT DEFAULT NULL, base_def INT DEFAULT NULL, base_spd INT DEFAULT NULL, main_trace_one JSON DEFAULT NULL, main_trace_two JSON DEFAULT NULL, main_trace_three JSON DEFAULT NULL, technique JSON DEFAULT NULL, stat_one_value INT DEFAULT NULL, stat_two_value INT DEFAULT NULL, stat_three_value INT DEFAULT NULL, leaks TINYINT(1) NOT NULL, beta_version VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_133E438618B21CEB (character_name_id), UNIQUE INDEX UNIQ_133E43869F27DED4 (character_talent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit_media (character_kit_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_393A0A7799CCA37C (character_kit_id), INDEX IDX_393A0A77EA9FDD75 (media_id), PRIMARY KEY(character_kit_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit_stat (character_kit_id INT NOT NULL, stat_id INT NOT NULL, INDEX IDX_8580B4D399CCA37C (character_kit_id), INDEX IDX_8580B4D39502F0B (stat_id), PRIMARY KEY(character_kit_id, stat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_minor_traces (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, level_one_trace VARCHAR(255) DEFAULT NULL, ascension_two_trace VARCHAR(255) DEFAULT NULL, ascension_three_trace_one VARCHAR(255) DEFAULT NULL, ascension_three_trace_two VARCHAR(255) DEFAULT NULL, ascension_four_trace VARCHAR(255) DEFAULT NULL, ascension_five_trace_one VARCHAR(255) DEFAULT NULL, ascension_five_trace_two VARCHAR(255) DEFAULT NULL, ascension_six_trace VARCHAR(255) DEFAULT NULL, level_seventy_five_trace VARCHAR(255) DEFAULT NULL, level_eighty_trace VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_45E5555B18B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_skill (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, desc_level_eight LONGTEXT DEFAULT NULL, desc_level_nine LONGTEXT DEFAULT NULL, desc_level_ten LONGTEXT DEFAULT NULL, desc_level_eleven LONGTEXT DEFAULT NULL, desc_level_twelve LONGTEXT DEFAULT NULL, INDEX IDX_A0FE031599CCA37C (character_kit_id), UNIQUE INDEX UNIQ_A0FE031554B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_talent (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, desc_level_eight LONGTEXT DEFAULT NULL, desc_level_nine LONGTEXT DEFAULT NULL, desc_level_ten LONGTEXT DEFAULT NULL, desc_level_eleven LONGTEXT DEFAULT NULL, desc_level_twelve LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B59BC16699CCA37C (character_kit_id), UNIQUE INDEX UNIQ_B59BC16654B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_ultimate (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, desc_level_eight LONGTEXT DEFAULT NULL, desc_level_nine LONGTEXT DEFAULT NULL, desc_level_ten LONGTEXT DEFAULT NULL, desc_level_eleven LONGTEXT DEFAULT NULL, desc_level_twelve LONGTEXT DEFAULT NULL, ult_cost INT DEFAULT NULL, INDEX IDX_67C6729A99CCA37C (character_kit_id), UNIQUE INDEX UNIQ_67C6729A54B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite (id INT AUTO_INCREMENT NOT NULL, memomaster_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_63A88406B84CACC7 (memomaster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite_media (memosprite_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B065FC4CE52ECF74 (memosprite_id), INDEX IDX_B065FC4CEA9FDD75 (media_id), PRIMARY KEY(memosprite_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite_skill (id INT AUTO_INCREMENT NOT NULL, icon_id INT DEFAULT NULL, memosprite_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, level_up TINYINT(1) NOT NULL, desc_unique LONGTEXT DEFAULT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8474B93754B9D732 (icon_id), INDEX IDX_8474B937E52ECF74 (memosprite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite_talent (id INT AUTO_INCREMENT NOT NULL, icon_id INT DEFAULT NULL, memosprite_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, level_up TINYINT(1) NOT NULL, desc_unique LONGTEXT DEFAULT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_60DF0A3854B9D732 (icon_id), INDEX IDX_60DF0A38E52ECF74 (memosprite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat (id INT AUTO_INCREMENT NOT NULL, icon_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_20B8FF2154B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_basic_atk ADD CONSTRAINT FK_682C9CEA99CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_basic_atk_media ADD CONSTRAINT FK_EF1D357B2D1839DB FOREIGN KEY (character_basic_atk_id) REFERENCES character_basic_atk (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_basic_atk_media ADD CONSTRAINT FK_EF1D357BEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit ADD CONSTRAINT FK_133E438618B21CEB FOREIGN KEY (character_name_id) REFERENCES base_character (id)');
        $this->addSql('ALTER TABLE character_kit ADD CONSTRAINT FK_133E43869F27DED4 FOREIGN KEY (character_talent_id) REFERENCES character_talent (id)');
        $this->addSql('ALTER TABLE character_kit_media ADD CONSTRAINT FK_393A0A7799CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit_media ADD CONSTRAINT FK_393A0A77EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit_stat ADD CONSTRAINT FK_8580B4D399CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit_stat ADD CONSTRAINT FK_8580B4D39502F0B FOREIGN KEY (stat_id) REFERENCES stat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_minor_traces ADD CONSTRAINT FK_45E5555B18B21CEB FOREIGN KEY (character_name_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE031599CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE031554B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC16699CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_talent ADD CONSTRAINT FK_B59BC16654B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE character_ultimate ADD CONSTRAINT FK_67C6729A99CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_ultimate ADD CONSTRAINT FK_67C6729A54B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE memosprite ADD CONSTRAINT FK_63A88406B84CACC7 FOREIGN KEY (memomaster_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE memosprite_media ADD CONSTRAINT FK_B065FC4CE52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE memosprite_media ADD CONSTRAINT FK_B065FC4CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE memosprite_skill ADD CONSTRAINT FK_8474B93754B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE memosprite_skill ADD CONSTRAINT FK_8474B937E52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id)');
        $this->addSql('ALTER TABLE memosprite_talent ADD CONSTRAINT FK_60DF0A3854B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE memosprite_talent ADD CONSTRAINT FK_60DF0A38E52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id)');
        $this->addSql('ALTER TABLE stat ADD CONSTRAINT FK_20B8FF2154B9D732 FOREIGN KEY (icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE light_cone CHANGE lc_version_release lc_release_version VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_basic_atk DROP FOREIGN KEY FK_682C9CEA99CCA37C');
        $this->addSql('ALTER TABLE character_basic_atk_media DROP FOREIGN KEY FK_EF1D357B2D1839DB');
        $this->addSql('ALTER TABLE character_basic_atk_media DROP FOREIGN KEY FK_EF1D357BEA9FDD75');
        $this->addSql('ALTER TABLE character_kit DROP FOREIGN KEY FK_133E438618B21CEB');
        $this->addSql('ALTER TABLE character_kit DROP FOREIGN KEY FK_133E43869F27DED4');
        $this->addSql('ALTER TABLE character_kit_media DROP FOREIGN KEY FK_393A0A7799CCA37C');
        $this->addSql('ALTER TABLE character_kit_media DROP FOREIGN KEY FK_393A0A77EA9FDD75');
        $this->addSql('ALTER TABLE character_kit_stat DROP FOREIGN KEY FK_8580B4D399CCA37C');
        $this->addSql('ALTER TABLE character_kit_stat DROP FOREIGN KEY FK_8580B4D39502F0B');
        $this->addSql('ALTER TABLE character_minor_traces DROP FOREIGN KEY FK_45E5555B18B21CEB');
        $this->addSql('ALTER TABLE character_skill DROP FOREIGN KEY FK_A0FE031599CCA37C');
        $this->addSql('ALTER TABLE character_skill DROP FOREIGN KEY FK_A0FE031554B9D732');
        $this->addSql('ALTER TABLE character_talent DROP FOREIGN KEY FK_B59BC16699CCA37C');
        $this->addSql('ALTER TABLE character_talent DROP FOREIGN KEY FK_B59BC16654B9D732');
        $this->addSql('ALTER TABLE character_ultimate DROP FOREIGN KEY FK_67C6729A99CCA37C');
        $this->addSql('ALTER TABLE character_ultimate DROP FOREIGN KEY FK_67C6729A54B9D732');
        $this->addSql('ALTER TABLE memosprite DROP FOREIGN KEY FK_63A88406B84CACC7');
        $this->addSql('ALTER TABLE memosprite_media DROP FOREIGN KEY FK_B065FC4CE52ECF74');
        $this->addSql('ALTER TABLE memosprite_media DROP FOREIGN KEY FK_B065FC4CEA9FDD75');
        $this->addSql('ALTER TABLE memosprite_skill DROP FOREIGN KEY FK_8474B93754B9D732');
        $this->addSql('ALTER TABLE memosprite_skill DROP FOREIGN KEY FK_8474B937E52ECF74');
        $this->addSql('ALTER TABLE memosprite_talent DROP FOREIGN KEY FK_60DF0A3854B9D732');
        $this->addSql('ALTER TABLE memosprite_talent DROP FOREIGN KEY FK_60DF0A38E52ECF74');
        $this->addSql('ALTER TABLE stat DROP FOREIGN KEY FK_20B8FF2154B9D732');
        $this->addSql('DROP TABLE character_basic_atk');
        $this->addSql('DROP TABLE character_basic_atk_media');
        $this->addSql('DROP TABLE character_kit');
        $this->addSql('DROP TABLE character_kit_media');
        $this->addSql('DROP TABLE character_kit_stat');
        $this->addSql('DROP TABLE character_minor_traces');
        $this->addSql('DROP TABLE character_skill');
        $this->addSql('DROP TABLE character_talent');
        $this->addSql('DROP TABLE character_ultimate');
        $this->addSql('DROP TABLE memosprite');
        $this->addSql('DROP TABLE memosprite_media');
        $this->addSql('DROP TABLE memosprite_skill');
        $this->addSql('DROP TABLE memosprite_talent');
        $this->addSql('DROP TABLE stat');
        $this->addSql('ALTER TABLE light_cone CHANGE lc_release_version lc_version_release VARCHAR(255) DEFAULT NULL');
    }
}
