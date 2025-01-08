<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241231131858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ascension_mats ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE boss_mat ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE trace_mats ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE weekly_mat ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ascension_mats DROP slug');
        $this->addSql('ALTER TABLE boss_mat DROP slug');
        $this->addSql('ALTER TABLE trace_mats DROP slug');
        $this->addSql('ALTER TABLE weekly_mat DROP slug');
    }
}
