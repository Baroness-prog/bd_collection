<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203215646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bd_colec (id INT AUTO_INCREMENT NOT NULL, genres_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, edition VARCHAR(255) DEFAULT NULL, tome INT NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_45E6DDF76A3B2603 (genres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wishlist (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, tome INT NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_9CE12A314296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bd_colec ADD CONSTRAINT FK_45E6DDF76A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A314296D31F FOREIGN KEY (genre_id) REFERENCES genres (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bd_colec DROP FOREIGN KEY FK_45E6DDF76A3B2603');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A314296D31F');
        $this->addSql('DROP TABLE bd_colec');
        $this->addSql('DROP TABLE genres');
        $this->addSql('DROP TABLE wishlist');
    }
}
