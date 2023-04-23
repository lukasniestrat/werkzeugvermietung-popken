<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423135653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add categories to database';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO category (title, description) VALUES ("WC-Wagen", "Unsere WC-Wagen")');
        $this->addSql('INSERT INTO category (title, description) VALUES ("Anhänger", "Unsere Anhänger")');
        $this->addSql('INSERT INTO category (title, description) VALUES ("Bierwagen", "Unsere Bierwagen")');
        $this->addSql('INSERT INTO category (title, description) VALUES ("Partyzeltzubehör", "Unser Partyzeltzubehör")');
        $this->addSql('INSERT INTO category (title, description) VALUES ("Gartengeräte", "Unsere Gartengeräte")');
        $this->addSql('INSERT INTO category (title, description) VALUES ("Werkzeuge", "Unsere Werkzeuge")');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM category WHERE title = "WC-Wagen"');
        $this->addSql('DELETE FROM category WHERE title = "Anhänger"');
        $this->addSql('DELETE FROM category WHERE title = "Bierwagen"');
        $this->addSql('DELETE FROM category WHERE title = "Partyzeltzubehör"');
        $this->addSql('DELETE FROM category WHERE title = "Gartengeräte"');
        $this->addSql('DELETE FROM category WHERE title = "Werkzeuge"');
    }
}
