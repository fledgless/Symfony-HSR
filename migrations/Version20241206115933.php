<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241206115933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, location_icon_id INT DEFAULT NULL, location_name VARCHAR(255) NOT NULL, location_released TINYINT(1) NOT NULL, location_world VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5E9E89CBBAFCC496 (location_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE normal_enemy_location (normal_enemy_id INT NOT NULL, location_id INT NOT NULL, INDEX IDX_4183E525CCC6A560 (normal_enemy_id), INDEX IDX_4183E52564D218E (location_id), PRIMARY KEY(normal_enemy_id, location_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBBAFCC496 FOREIGN KEY (location_icon_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE normal_enemy_location ADD CONSTRAINT FK_4183E525CCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy_location ADD CONSTRAINT FK_4183E52564D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE world DROP FOREIGN KEY FK_3A771143BBFCF965');
        $this->addSql('ALTER TABLE normal_enemy_world DROP FOREIGN KEY FK_CAD2AEE1CCC6A560');
        $this->addSql('ALTER TABLE normal_enemy_world DROP FOREIGN KEY FK_CAD2AEE18925311C');
        $this->addSql('DROP TABLE world');
        $this->addSql('DROP TABLE normal_enemy_world');
        $this->addSql('ALTER TABLE character_eidolons CHANGE stop_point eidolon_stop_point LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE world (id INT AUTO_INCREMENT NOT NULL, world_icon_id INT DEFAULT NULL, world_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, world_released TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3A771143BBFCF965 (world_icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE normal_enemy_world (normal_enemy_id INT NOT NULL, world_id INT NOT NULL, INDEX IDX_CAD2AEE1CCC6A560 (normal_enemy_id), INDEX IDX_CAD2AEE18925311C (world_id), PRIMARY KEY(normal_enemy_id, world_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE world ADD CONSTRAINT FK_3A771143BBFCF965 FOREIGN KEY (world_icon_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE normal_enemy_world ADD CONSTRAINT FK_CAD2AEE1CCC6A560 FOREIGN KEY (normal_enemy_id) REFERENCES normal_enemy (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE normal_enemy_world ADD CONSTRAINT FK_CAD2AEE18925311C FOREIGN KEY (world_id) REFERENCES world (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBBAFCC496');
        $this->addSql('ALTER TABLE normal_enemy_location DROP FOREIGN KEY FK_4183E525CCC6A560');
        $this->addSql('ALTER TABLE normal_enemy_location DROP FOREIGN KEY FK_4183E52564D218E');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE normal_enemy_location');
        $this->addSql('ALTER TABLE character_eidolons CHANGE eidolon_stop_point stop_point LONGTEXT DEFAULT NULL');
    }
}
