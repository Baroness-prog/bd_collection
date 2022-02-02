<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202190546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bd_colec ADD genres_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bd_colec ADD CONSTRAINT FK_45E6DDF76A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id)');
        $this->addSql('CREATE INDEX IDX_45E6DDF76A3B2603 ON bd_colec (genres_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bd_colec DROP FOREIGN KEY FK_45E6DDF76A3B2603');
        $this->addSql('DROP TABLE genres');
        $this->addSql('DROP INDEX IDX_45E6DDF76A3B2603 ON bd_colec');
        $this->addSql('ALTER TABLE bd_colec DROP genres_id, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE edition edition VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
