<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241219090134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE base_character ADD CONSTRAINT FK_205621B964D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_205621B964D218E ON base_character (location_id)');
        $this->addSql('ALTER TABLE location ADD location_description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE base_character DROP FOREIGN KEY FK_205621B964D218E');
        $this->addSql('DROP INDEX IDX_205621B964D218E ON base_character');
        $this->addSql('ALTER TABLE base_character DROP location_id');
        $this->addSql('ALTER TABLE location DROP location_description');
    }
}
