<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112123251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_eidolons ADD eidolon_one JSON DEFAULT NULL, ADD eidolon_two JSON DEFAULT NULL, ADD eidolon_three JSON DEFAULT NULL, ADD eidolon_four JSON DEFAULT NULL, ADD eidolon_five JSON DEFAULT NULL, ADD eidolon_six JSON DEFAULT NULL, ADD stop_point LONGTEXT DEFAULT NULL, DROP eidolon_names, DROP eidolon_descriptions');
        $this->addSql('ALTER TABLE media ADD character_eidolons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C18E42D5D FOREIGN KEY (character_eidolons_id) REFERENCES character_eidolons (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C18E42D5D ON media (character_eidolons_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C18E42D5D');
        $this->addSql('DROP INDEX IDX_6A2CA10C18E42D5D ON media');
        $this->addSql('ALTER TABLE media DROP character_eidolons_id');
        $this->addSql('ALTER TABLE character_eidolons ADD eidolon_names JSON DEFAULT NULL, ADD eidolon_descriptions JSON DEFAULT NULL, DROP eidolon_one, DROP eidolon_two, DROP eidolon_three, DROP eidolon_four, DROP eidolon_five, DROP eidolon_six, DROP stop_point');
    }
}
