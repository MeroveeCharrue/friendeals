<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211224712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create new table Expense';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense (
    id INT AUTO_INCREMENT NOT NULL,
    author_id INT NOT NULL,
    payment_date DATETIME NOT NULL,
    amount INT NOT NULL,
    label VARCHAR(255) NOT NULL,
    payment_type VARCHAR(255) NOT NULL,
    INDEX IDX_2D3A8DA6F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6F675F31B FOREIGN KEY (author_id) REFERENCES player (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE expense');
    }
}
