<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112131309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_eidolons_media (character_eidolons_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_90003B1E18E42D5D (character_eidolons_id), INDEX IDX_90003B1EEA9FDD75 (media_id), PRIMARY KEY(character_eidolons_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_eidolons_media ADD CONSTRAINT FK_90003B1E18E42D5D FOREIGN KEY (character_eidolons_id) REFERENCES character_eidolons (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_eidolons_media ADD CONSTRAINT FK_90003B1EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C18E42D5D');
        $this->addSql('DROP INDEX IDX_6A2CA10C18E42D5D ON media');
        $this->addSql('ALTER TABLE media DROP character_eidolons_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_eidolons_media DROP FOREIGN KEY FK_90003B1E18E42D5D');
        $this->addSql('ALTER TABLE character_eidolons_media DROP FOREIGN KEY FK_90003B1EEA9FDD75');
        $this->addSql('DROP TABLE character_eidolons_media');
        $this->addSql('ALTER TABLE media ADD character_eidolons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C18E42D5D FOREIGN KEY (character_eidolons_id) REFERENCES character_eidolons (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6A2CA10C18E42D5D ON media (character_eidolons_id)');
    }
}
