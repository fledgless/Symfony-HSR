<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123135009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE base_character_light_cone (base_character_id INT NOT NULL, light_cone_id INT NOT NULL, INDEX IDX_238482AEA259E1AD (base_character_id), INDEX IDX_238482AE4456FEFA (light_cone_id), PRIMARY KEY(base_character_id, light_cone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base_character_light_cone ADD CONSTRAINT FK_238482AEA259E1AD FOREIGN KEY (base_character_id) REFERENCES base_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character_light_cone ADD CONSTRAINT FK_238482AE4456FEFA FOREIGN KEY (light_cone_id) REFERENCES light_cone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character ADD release_date DATE DEFAULT NULL, ADD release_version VARCHAR(255) NOT NULL, ADD released TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character_light_cone DROP FOREIGN KEY FK_238482AEA259E1AD');
        $this->addSql('ALTER TABLE base_character_light_cone DROP FOREIGN KEY FK_238482AE4456FEFA');
        $this->addSql('DROP TABLE base_character_light_cone');
        $this->addSql('ALTER TABLE base_character DROP release_date, DROP release_version, DROP released');
    }
}
