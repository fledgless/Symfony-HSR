<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250127135620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boss_enemy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, filename VARCHAR(255) DEFAULT NULL, enemy_info LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boss_enemy_type (boss_enemy_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_B27F3C3819661966 (boss_enemy_id), INDEX IDX_B27F3C38C54C8C93 (type_id), PRIMARY KEY(boss_enemy_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cavern_of_corrosion (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, boss_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, special_mechanism LONGTEXT DEFAULT NULL, INDEX IDX_CBB4E57E64D218E (location_id), UNIQUE INDEX UNIQ_CBB4E57E261FB672 (boss_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cavern_of_corrosion_normal_enemy (cavern_of_corrosion_id INT NOT NULL, normal_enemy_id INT NOT NULL, INDEX IDX_134A27C1D72BF09D (cavern_of_corrosion_id), INDEX IDX_134A27C1CCC6A560 (normal_enemy_id), PRIMARY KEY(cavern_of_corrosion_id, normal_enemy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cavern_of_corrosion_type (cavern_of_corrosion_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_9CE190DFD72BF09D (cavern_of_corrosion_id), INDEX IDX_9CE190DFC54C8C93 (type_id), PRIMARY KEY(cavern_of_corrosion_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ornament_extraction (id INT AUTO_INCREMENT NOT NULL, boss_enemy_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CC48C75419661966 (boss_enemy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ornament_set (id INT AUTO_INCREMENT NOT NULL, ornament_extraction_id INT DEFAULT NULL, set_name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, set_filename VARCHAR(255) DEFAULT NULL, set_bonus LONGTEXT DEFAULT NULL, planar_sphere_name VARCHAR(255) DEFAULT NULL, planar_sphere_filename VARCHAR(255) DEFAULT NULL, planar_sphere_desc LONGTEXT DEFAULT NULL, planar_sphere_lore LONGTEXT DEFAULT NULL, link_rope_name VARCHAR(255) DEFAULT NULL, link_rope_filename VARCHAR(255) DEFAULT NULL, link_rope_desc LONGTEXT DEFAULT NULL, link_rope_lore LONGTEXT DEFAULT NULL, announced TINYINT(1) NOT NULL, released TINYINT(1) NOT NULL, INDEX IDX_259C6237F148CBBB (ornament_extraction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relic_set (id INT AUTO_INCREMENT NOT NULL, cavern_of_corrosion_id INT DEFAULT NULL, set_name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, set_filename VARCHAR(255) DEFAULT NULL, two_piece_desc LONGTEXT DEFAULT NULL, four_piece_desc LONGTEXT DEFAULT NULL, head_name VARCHAR(255) DEFAULT NULL, head_filename VARCHAR(255) DEFAULT NULL, head_desc LONGTEXT DEFAULT NULL, head_lore LONGTEXT DEFAULT NULL, hand_name VARCHAR(255) DEFAULT NULL, hand_filename VARCHAR(255) DEFAULT NULL, hand_desc LONGTEXT DEFAULT NULL, hand_lore LONGTEXT DEFAULT NULL, body_name VARCHAR(255) DEFAULT NULL, body_filename VARCHAR(255) DEFAULT NULL, body_desc LONGTEXT DEFAULT NULL, body_lore LONGTEXT DEFAULT NULL, feet_name VARCHAR(255) DEFAULT NULL, feet_filename VARCHAR(255) DEFAULT NULL, feet_desc LONGTEXT DEFAULT NULL, feet_lore LONGTEXT DEFAULT NULL, announced TINYINT(1) NOT NULL, released TINYINT(1) NOT NULL, INDEX IDX_9713C786D72BF09D (cavern_of_corrosion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boss_enemy_type ADD CONSTRAINT FK_B27F3C3819661966 FOREIGN KEY (boss_enemy_id) REFERENCES boss_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE boss_enemy_type ADD CONSTRAINT FK_B27F3C38C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cavern_of_corrosion ADD CONSTRAINT FK_CBB4E57E64D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE cavern_of_corrosion ADD CONSTRAINT FK_CBB4E57E261FB672 FOREIGN KEY (boss_id) REFERENCES elite_enemy (id)');
        $this->addSql('ALTER TABLE cavern_of_corrosion_normal_enemy ADD CONSTRAINT FK_134A27C1D72BF09D FOREIGN KEY (cavern_of_corrosion_id) REFERENCES cavern_of_corrosion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cavern_of_corrosion_normal_enemy ADD CONSTRAINT FK_134A27C1CCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cavern_of_corrosion_type ADD CONSTRAINT FK_9CE190DFD72BF09D FOREIGN KEY (cavern_of_corrosion_id) REFERENCES cavern_of_corrosion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cavern_of_corrosion_type ADD CONSTRAINT FK_9CE190DFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ornament_extraction ADD CONSTRAINT FK_CC48C75419661966 FOREIGN KEY (boss_enemy_id) REFERENCES boss_enemy (id)');
        $this->addSql('ALTER TABLE ornament_set ADD CONSTRAINT FK_259C6237F148CBBB FOREIGN KEY (ornament_extraction_id) REFERENCES ornament_extraction (id)');
        $this->addSql('ALTER TABLE relic_set ADD CONSTRAINT FK_9713C786D72BF09D FOREIGN KEY (cavern_of_corrosion_id) REFERENCES cavern_of_corrosion (id)');
        $this->addSql('ALTER TABLE ascension_mats CHANGE four_star_filename four_star_filename VARCHAR(255) DEFAULT NULL, CHANGE three_star_filename three_star_filename VARCHAR(255) DEFAULT NULL, CHANGE two_star_filename two_star_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE base_character CHANGE icon_filename icon_filename VARCHAR(255) DEFAULT NULL, CHANGE splash_filename splash_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE boss_mat CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE character_eidolon CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE character_kit CHANGE main_trace_one_filename main_trace_one_filename VARCHAR(255) DEFAULT NULL, CHANGE main_trace_two_filename main_trace_two_filename VARCHAR(255) DEFAULT NULL, CHANGE main_trace_three_filename main_trace_three_filename VARCHAR(255) DEFAULT NULL, CHANGE technique_filename technique_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE character_skill CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE echo_of_war CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE echos_boss CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE elite_enemy CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE light_cone CHANGE icon_filename icon_filename VARCHAR(255) DEFAULT NULL, CHANGE splash_filename splash_filename VARCHAR(255) DEFAULT NULL, CHANGE full_art_filename full_art_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE memosprite CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE memosprite_skill CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE normal_enemy CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stagnant_shadow CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stat CHANGE filename filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trace_mats CHANGE four_star_filename four_star_filename VARCHAR(255) DEFAULT NULL, CHANGE three_star_filename three_star_filename VARCHAR(255) DEFAULT NULL, CHANGE two_star_filename two_star_filename VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE weekly_mat CHANGE filename filename VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boss_enemy_type DROP FOREIGN KEY FK_B27F3C3819661966');
        $this->addSql('ALTER TABLE boss_enemy_type DROP FOREIGN KEY FK_B27F3C38C54C8C93');
        $this->addSql('ALTER TABLE cavern_of_corrosion DROP FOREIGN KEY FK_CBB4E57E64D218E');
        $this->addSql('ALTER TABLE cavern_of_corrosion DROP FOREIGN KEY FK_CBB4E57E261FB672');
        $this->addSql('ALTER TABLE cavern_of_corrosion_normal_enemy DROP FOREIGN KEY FK_134A27C1D72BF09D');
        $this->addSql('ALTER TABLE cavern_of_corrosion_normal_enemy DROP FOREIGN KEY FK_134A27C1CCC6A560');
        $this->addSql('ALTER TABLE cavern_of_corrosion_type DROP FOREIGN KEY FK_9CE190DFD72BF09D');
        $this->addSql('ALTER TABLE cavern_of_corrosion_type DROP FOREIGN KEY FK_9CE190DFC54C8C93');
        $this->addSql('ALTER TABLE ornament_extraction DROP FOREIGN KEY FK_CC48C75419661966');
        $this->addSql('ALTER TABLE ornament_set DROP FOREIGN KEY FK_259C6237F148CBBB');
        $this->addSql('ALTER TABLE relic_set DROP FOREIGN KEY FK_9713C786D72BF09D');
        $this->addSql('DROP TABLE boss_enemy');
        $this->addSql('DROP TABLE boss_enemy_type');
        $this->addSql('DROP TABLE cavern_of_corrosion');
        $this->addSql('DROP TABLE cavern_of_corrosion_normal_enemy');
        $this->addSql('DROP TABLE cavern_of_corrosion_type');
        $this->addSql('DROP TABLE ornament_extraction');
        $this->addSql('DROP TABLE ornament_set');
        $this->addSql('DROP TABLE relic_set');
        $this->addSql('ALTER TABLE ascension_mats CHANGE four_star_filename four_star_filename VARCHAR(255) NOT NULL, CHANGE three_star_filename three_star_filename VARCHAR(255) NOT NULL, CHANGE two_star_filename two_star_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE base_character CHANGE icon_filename icon_filename VARCHAR(255) NOT NULL, CHANGE splash_filename splash_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE boss_mat CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE character_eidolon CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE character_kit CHANGE main_trace_one_filename main_trace_one_filename VARCHAR(255) NOT NULL, CHANGE main_trace_two_filename main_trace_two_filename VARCHAR(255) NOT NULL, CHANGE main_trace_three_filename main_trace_three_filename VARCHAR(255) NOT NULL, CHANGE technique_filename technique_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE character_skill CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE echo_of_war CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE echos_boss CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE elite_enemy CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE light_cone CHANGE icon_filename icon_filename VARCHAR(255) NOT NULL, CHANGE splash_filename splash_filename VARCHAR(255) NOT NULL, CHANGE full_art_filename full_art_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE memosprite CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE memosprite_skill CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE normal_enemy CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stagnant_shadow CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stat CHANGE filename filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE trace_mats CHANGE four_star_filename four_star_filename VARCHAR(255) NOT NULL, CHANGE three_star_filename three_star_filename VARCHAR(255) NOT NULL, CHANGE two_star_filename two_star_filename VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE weekly_mat CHANGE filename filename VARCHAR(255) NOT NULL');
    }
}
