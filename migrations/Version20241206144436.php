<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241206144436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boss_mat (id INT AUTO_INCREMENT NOT NULL, boss_mat_icon_id INT DEFAULT NULL, boss_mat_stagnant_shadow_id INT DEFAULT NULL, boss_mat_type_id INT DEFAULT NULL, boss_mat_name VARCHAR(255) NOT NULL, boss_mat_released TINYINT(1) NOT NULL, boss_mat_announced TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_41390997D6CAE9E8 (boss_mat_icon_id), UNIQUE INDEX UNIQ_41390997D0FF67F (boss_mat_stagnant_shadow_id), INDEX IDX_41390997473FB249 (boss_mat_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crimson_calyx (id INT AUTO_INCREMENT NOT NULL, crimson_calyx_location_id INT DEFAULT NULL, crimson_calyx_name VARCHAR(255) NOT NULL, INDEX IDX_21EE9C972F1B3052 (crimson_calyx_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crimson_calyx_normal_enemy (crimson_calyx_id INT NOT NULL, normal_enemy_id INT NOT NULL, INDEX IDX_3974711D45B610D (crimson_calyx_id), INDEX IDX_3974711DCCC6A560 (normal_enemy_id), PRIMARY KEY(crimson_calyx_id, normal_enemy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echo_of_war (id INT AUTO_INCREMENT NOT NULL, echo_of_war_icon_id INT DEFAULT NULL, echo_of_war_boss_id INT DEFAULT NULL, echo_of_war_location_id INT DEFAULT NULL, echo_of_war_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A4D428A53206CF33 (echo_of_war_icon_id), UNIQUE INDEX UNIQ_A4D428A540A0AE73 (echo_of_war_boss_id), INDEX IDX_A4D428A56B48C239 (echo_of_war_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echos_boss (id INT AUTO_INCREMENT NOT NULL, echo_boss_icon_id INT DEFAULT NULL, echo_boss_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E7150372B1EF9B71 (echo_boss_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE echos_boss_type (echos_boss_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_4B8E3FC377C4CEC1 (echos_boss_id), INDEX IDX_4B8E3FC3C54C8C93 (type_id), PRIMARY KEY(echos_boss_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elite_enemy (id INT AUTO_INCREMENT NOT NULL, elite_enemy_icon_id INT DEFAULT NULL, elite_enemy_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_40EEB329A3E838B4 (elite_enemy_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE elite_enemy_type (elite_enemy_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_41E8399CD9878A1B (elite_enemy_id), INDEX IDX_41E8399CC54C8C93 (type_id), PRIMARY KEY(elite_enemy_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE golden_calyx (id INT AUTO_INCREMENT NOT NULL, golden_calyx_location_id INT DEFAULT NULL, golden_calyx_name VARCHAR(255) NOT NULL, INDEX IDX_2CDBA20B434731FE (golden_calyx_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE golden_calyx_normal_enemy (golden_calyx_id INT NOT NULL, normal_enemy_id INT NOT NULL, INDEX IDX_E678C2DFE724FFCA (golden_calyx_id), INDEX IDX_E678C2DFCCC6A560 (normal_enemy_id), PRIMARY KEY(golden_calyx_id, normal_enemy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE golden_calyx_ascension_mats (golden_calyx_id INT NOT NULL, ascension_mats_id INT NOT NULL, INDEX IDX_791F78C8E724FFCA (golden_calyx_id), INDEX IDX_791F78C8E13DC9B6 (ascension_mats_id), PRIMARY KEY(golden_calyx_id, ascension_mats_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE normal_enemy_type (normal_enemy_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_26F2B1B9CCC6A560 (normal_enemy_id), INDEX IDX_26F2B1B9C54C8C93 (type_id), PRIMARY KEY(normal_enemy_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagnant_shadow (id INT AUTO_INCREMENT NOT NULL, stagnant_shadow_icon_id INT DEFAULT NULL, stagnant_shadow_boss_id INT DEFAULT NULL, stagnant_shadow_location_id INT DEFAULT NULL, stagnant_shadow_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2D8BA4CCF33A9CE4 (stagnant_shadow_icon_id), UNIQUE INDEX UNIQ_2D8BA4CC819CFDA4 (stagnant_shadow_boss_id), INDEX IDX_2D8BA4CC21A15829 (stagnant_shadow_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trace_mats (id INT AUTO_INCREMENT NOT NULL, trace_mats_path_id INT DEFAULT NULL, trace_mats_crimson_calyx_id INT DEFAULT NULL, trace_mats_four_star_name VARCHAR(255) NOT NULL, trace_mats_three_star_name VARCHAR(255) NOT NULL, trace_mats_two_star_name VARCHAR(255) NOT NULL, trace_mats_released TINYINT(1) NOT NULL, trace_mats_announced TINYINT(1) NOT NULL, INDEX IDX_841E84D42E9074A8 (trace_mats_path_id), UNIQUE INDEX UNIQ_841E84D4950B42A7 (trace_mats_crimson_calyx_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trace_mats_media (trace_mats_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_7B27960B49213874 (trace_mats_id), INDEX IDX_7B27960BEA9FDD75 (media_id), PRIMARY KEY(trace_mats_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weekly_mat (id INT AUTO_INCREMENT NOT NULL, weekly_mat_icon_id INT DEFAULT NULL, weekly_mat_echo_of_war_id INT DEFAULT NULL, weekly_mat_name VARCHAR(255) NOT NULL, weekly_mat_released TINYINT(1) NOT NULL, weekly_mat_announced TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_834A61678F9B3BF4 (weekly_mat_icon_id), UNIQUE INDEX UNIQ_834A6167E10ED1CC (weekly_mat_echo_of_war_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boss_mat ADD CONSTRAINT FK_41390997D6CAE9E8 FOREIGN KEY (boss_mat_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE boss_mat ADD CONSTRAINT FK_41390997D0FF67F FOREIGN KEY (boss_mat_stagnant_shadow_id) REFERENCES stagnant_shadow (id)');
        $this->addSql('ALTER TABLE boss_mat ADD CONSTRAINT FK_41390997473FB249 FOREIGN KEY (boss_mat_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE crimson_calyx ADD CONSTRAINT FK_21EE9C972F1B3052 FOREIGN KEY (crimson_calyx_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE crimson_calyx_normal_enemy ADD CONSTRAINT FK_3974711D45B610D FOREIGN KEY (crimson_calyx_id) REFERENCES crimson_calyx (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE crimson_calyx_normal_enemy ADD CONSTRAINT FK_3974711DCCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echo_of_war ADD CONSTRAINT FK_A4D428A53206CF33 FOREIGN KEY (echo_of_war_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE echo_of_war ADD CONSTRAINT FK_A4D428A540A0AE73 FOREIGN KEY (echo_of_war_boss_id) REFERENCES echos_boss (id)');
        $this->addSql('ALTER TABLE echo_of_war ADD CONSTRAINT FK_A4D428A56B48C239 FOREIGN KEY (echo_of_war_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE echos_boss ADD CONSTRAINT FK_E7150372B1EF9B71 FOREIGN KEY (echo_boss_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE echos_boss_type ADD CONSTRAINT FK_4B8E3FC377C4CEC1 FOREIGN KEY (echos_boss_id) REFERENCES echos_boss (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE echos_boss_type ADD CONSTRAINT FK_4B8E3FC3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elite_enemy ADD CONSTRAINT FK_40EEB329A3E838B4 FOREIGN KEY (elite_enemy_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE elite_enemy_type ADD CONSTRAINT FK_41E8399CD9878A1B FOREIGN KEY (elite_enemy_id) REFERENCES elite_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE elite_enemy_type ADD CONSTRAINT FK_41E8399CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE golden_calyx ADD CONSTRAINT FK_2CDBA20B434731FE FOREIGN KEY (golden_calyx_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE golden_calyx_normal_enemy ADD CONSTRAINT FK_E678C2DFE724FFCA FOREIGN KEY (golden_calyx_id) REFERENCES golden_calyx (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE golden_calyx_normal_enemy ADD CONSTRAINT FK_E678C2DFCCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE golden_calyx_ascension_mats ADD CONSTRAINT FK_791F78C8E724FFCA FOREIGN KEY (golden_calyx_id) REFERENCES golden_calyx (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE golden_calyx_ascension_mats ADD CONSTRAINT FK_791F78C8E13DC9B6 FOREIGN KEY (ascension_mats_id) REFERENCES ascension_mats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy_type ADD CONSTRAINT FK_26F2B1B9CCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy_type ADD CONSTRAINT FK_26F2B1B9C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagnant_shadow ADD CONSTRAINT FK_2D8BA4CCF33A9CE4 FOREIGN KEY (stagnant_shadow_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE stagnant_shadow ADD CONSTRAINT FK_2D8BA4CC819CFDA4 FOREIGN KEY (stagnant_shadow_boss_id) REFERENCES elite_enemy (id)');
        $this->addSql('ALTER TABLE stagnant_shadow ADD CONSTRAINT FK_2D8BA4CC21A15829 FOREIGN KEY (stagnant_shadow_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE trace_mats ADD CONSTRAINT FK_841E84D42E9074A8 FOREIGN KEY (trace_mats_path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE trace_mats ADD CONSTRAINT FK_841E84D4950B42A7 FOREIGN KEY (trace_mats_crimson_calyx_id) REFERENCES crimson_calyx (id)');
        $this->addSql('ALTER TABLE trace_mats_media ADD CONSTRAINT FK_7B27960B49213874 FOREIGN KEY (trace_mats_id) REFERENCES trace_mats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trace_mats_media ADD CONSTRAINT FK_7B27960BEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE weekly_mat ADD CONSTRAINT FK_834A61678F9B3BF4 FOREIGN KEY (weekly_mat_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE weekly_mat ADD CONSTRAINT FK_834A6167E10ED1CC FOREIGN KEY (weekly_mat_echo_of_war_id) REFERENCES echo_of_war (id)');
        $this->addSql('ALTER TABLE base_character ADD character_asc_mats_id INT DEFAULT NULL, ADD character_boss_mat_id INT DEFAULT NULL, ADD character_weekly_mat_id INT DEFAULT NULL, ADD character_trace_mats_id INT DEFAULT NULL, CHANGE character_release_version character_release_version VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B9CF3094AD FOREIGN KEY (character_asc_mats_id) REFERENCES ascension_mats (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B914B0F2E9 FOREIGN KEY (character_boss_mat_id) REFERENCES boss_mat (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B9F5875707 FOREIGN KEY (character_weekly_mat_id) REFERENCES weekly_mat (id)');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B97D90850D FOREIGN KEY (character_trace_mats_id) REFERENCES trace_mats (id)');
        $this->addSql('CREATE INDEX IDX_205621B9CF3094AD ON base_character (character_asc_mats_id)');
        $this->addSql('CREATE INDEX IDX_205621B914B0F2E9 ON base_character (character_boss_mat_id)');
        $this->addSql('CREATE INDEX IDX_205621B9F5875707 ON base_character (character_weekly_mat_id)');
        $this->addSql('CREATE INDEX IDX_205621B97D90850D ON base_character (character_trace_mats_id)');
        $this->addSql('ALTER TABLE light_cone ADD lc_asc_mats_id INT DEFAULT NULL, ADD lc_trace_mats_id INT DEFAULT NULL, ADD lc_announced TINYINT(1) NOT NULL, ADD lc_released TINYINT(1) NOT NULL, ADD lc_obtainable VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA800942A989BC3 FOREIGN KEY (lc_asc_mats_id) REFERENCES ascension_mats (id)');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA8009416513B1D FOREIGN KEY (lc_trace_mats_id) REFERENCES trace_mats (id)');
        $this->addSql('CREATE INDEX IDX_3CA800942A989BC3 ON light_cone (lc_asc_mats_id)');
        $this->addSql('CREATE INDEX IDX_3CA8009416513B1D ON light_cone (lc_trace_mats_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B914B0F2E9');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B97D90850D');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA8009416513B1D');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B9F5875707');
        $this->addSql('ALTER TABLE boss_mat DROP FOREIGN KEY FK_41390997D6CAE9E8');
        $this->addSql('ALTER TABLE boss_mat DROP FOREIGN KEY FK_41390997D0FF67F');
        $this->addSql('ALTER TABLE boss_mat DROP FOREIGN KEY FK_41390997473FB249');
        $this->addSql('ALTER TABLE crimson_calyx DROP FOREIGN KEY FK_21EE9C972F1B3052');
        $this->addSql('ALTER TABLE crimson_calyx_normal_enemy DROP FOREIGN KEY FK_3974711D45B610D');
        $this->addSql('ALTER TABLE crimson_calyx_normal_enemy DROP FOREIGN KEY FK_3974711DCCC6A560');
        $this->addSql('ALTER TABLE echo_of_war DROP FOREIGN KEY FK_A4D428A53206CF33');
        $this->addSql('ALTER TABLE echo_of_war DROP FOREIGN KEY FK_A4D428A540A0AE73');
        $this->addSql('ALTER TABLE echo_of_war DROP FOREIGN KEY FK_A4D428A56B48C239');
        $this->addSql('ALTER TABLE echos_boss DROP FOREIGN KEY FK_E7150372B1EF9B71');
        $this->addSql('ALTER TABLE echos_boss_type DROP FOREIGN KEY FK_4B8E3FC377C4CEC1');
        $this->addSql('ALTER TABLE echos_boss_type DROP FOREIGN KEY FK_4B8E3FC3C54C8C93');
        $this->addSql('ALTER TABLE elite_enemy DROP FOREIGN KEY FK_40EEB329A3E838B4');
        $this->addSql('ALTER TABLE elite_enemy_type DROP FOREIGN KEY FK_41E8399CD9878A1B');
        $this->addSql('ALTER TABLE elite_enemy_type DROP FOREIGN KEY FK_41E8399CC54C8C93');
        $this->addSql('ALTER TABLE golden_calyx DROP FOREIGN KEY FK_2CDBA20B434731FE');
        $this->addSql('ALTER TABLE golden_calyx_normal_enemy DROP FOREIGN KEY FK_E678C2DFE724FFCA');
        $this->addSql('ALTER TABLE golden_calyx_normal_enemy DROP FOREIGN KEY FK_E678C2DFCCC6A560');
        $this->addSql('ALTER TABLE golden_calyx_ascension_mats DROP FOREIGN KEY FK_791F78C8E724FFCA');
        $this->addSql('ALTER TABLE golden_calyx_ascension_mats DROP FOREIGN KEY FK_791F78C8E13DC9B6');
        $this->addSql('ALTER TABLE normal_enemy_type DROP FOREIGN KEY FK_26F2B1B9CCC6A560');
        $this->addSql('ALTER TABLE normal_enemy_type DROP FOREIGN KEY FK_26F2B1B9C54C8C93');
        $this->addSql('ALTER TABLE stagnant_shadow DROP FOREIGN KEY FK_2D8BA4CCF33A9CE4');
        $this->addSql('ALTER TABLE stagnant_shadow DROP FOREIGN KEY FK_2D8BA4CC819CFDA4');
        $this->addSql('ALTER TABLE stagnant_shadow DROP FOREIGN KEY FK_2D8BA4CC21A15829');
        $this->addSql('ALTER TABLE trace_mats DROP FOREIGN KEY FK_841E84D42E9074A8');
        $this->addSql('ALTER TABLE trace_mats DROP FOREIGN KEY FK_841E84D4950B42A7');
        $this->addSql('ALTER TABLE trace_mats_media DROP FOREIGN KEY FK_7B27960B49213874');
        $this->addSql('ALTER TABLE trace_mats_media DROP FOREIGN KEY FK_7B27960BEA9FDD75');
        $this->addSql('ALTER TABLE weekly_mat DROP FOREIGN KEY FK_834A61678F9B3BF4');
        $this->addSql('ALTER TABLE weekly_mat DROP FOREIGN KEY FK_834A6167E10ED1CC');
        $this->addSql('DROP TABLE boss_mat');
        $this->addSql('DROP TABLE crimson_calyx');
        $this->addSql('DROP TABLE crimson_calyx_normal_enemy');
        $this->addSql('DROP TABLE echo_of_war');
        $this->addSql('DROP TABLE echos_boss');
        $this->addSql('DROP TABLE echos_boss_type');
        $this->addSql('DROP TABLE elite_enemy');
        $this->addSql('DROP TABLE elite_enemy_type');
        $this->addSql('DROP TABLE golden_calyx');
        $this->addSql('DROP TABLE golden_calyx_normal_enemy');
        $this->addSql('DROP TABLE golden_calyx_ascension_mats');
        $this->addSql('DROP TABLE normal_enemy_type');
        $this->addSql('DROP TABLE stagnant_shadow');
        $this->addSql('DROP TABLE trace_mats');
        $this->addSql('DROP TABLE trace_mats_media');
        $this->addSql('DROP TABLE weekly_mat');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA800942A989BC3');
        $this->addSql('DROP INDEX IDX_3CA800942A989BC3 ON light_cone');
        $this->addSql('DROP INDEX IDX_3CA8009416513B1D ON light_cone');
        $this->addSql('ALTER TABLE light_cone DROP lc_asc_mats_id, DROP lc_trace_mats_id, DROP lc_announced, DROP lc_released, DROP lc_obtainable');
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B9CF3094AD');
        $this->addSql('DROP INDEX IDX_205621B9CF3094AD ON base_character');
        $this->addSql('DROP INDEX IDX_205621B914B0F2E9 ON base_character');
        $this->addSql('DROP INDEX IDX_205621B9F5875707 ON base_character');
        $this->addSql('DROP INDEX IDX_205621B97D90850D ON base_character');
        $this->addSql('ALTER TABLE base_character DROP character_asc_mats_id, DROP character_boss_mat_id, DROP character_weekly_mat_id, DROP character_trace_mats_id, CHANGE character_release_version character_release_version VARCHAR(255) NOT NULL');
    }
}
