<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826221954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE base_character_media (base_character_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_F75B1F07A259E1AD (base_character_id), INDEX IDX_F75B1F07EA9FDD75 (media_id), PRIMARY KEY(base_character_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE light_cone_media (light_cone_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_C34D34DB4456FEFA (light_cone_id), INDEX IDX_C34D34DBEA9FDD75 (media_id), PRIMARY KEY(light_cone_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alt_text VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07A259E1AD FOREIGN KEY (base_character_id) REFERENCES base_character (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_character_media ADD CONSTRAINT FK_F75B1F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DB4456FEFA FOREIGN KEY (light_cone_id) REFERENCES light_cone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE light_cone_media ADD CONSTRAINT FK_C34D34DBEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07A259E1AD');
        $this->addSql('ALTER TABLE base_character_media DROP FOREIGN KEY FK_F75B1F07EA9FDD75');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DB4456FEFA');
        $this->addSql('ALTER TABLE light_cone_media DROP FOREIGN KEY FK_C34D34DBEA9FDD75');
        $this->addSql('DROP TABLE base_character_media');
        $this->addSql('DROP TABLE light_cone_media');
        $this->addSql('DROP TABLE media');
    }
}
