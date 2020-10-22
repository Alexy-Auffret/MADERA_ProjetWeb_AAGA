<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021142753 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_C82E744DE7DC5C ON clients');
        $this->addSql('ALTER TABLE clients ADD rue VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD pays VARCHAR(255) NOT NULL, CHANGE adresse_id cp INT NOT NULL');
        $this->addSql('ALTER TABLE fournisseurs ADD rue VARCHAR(255) NOT NULL, ADD cp INT NOT NULL, ADD ville VARCHAR(150) NOT NULL, ADD pays VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP rue, DROP ville, DROP pays, CHANGE cp adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C82E744DE7DC5C ON clients (adresse_id)');
        $this->addSql('ALTER TABLE fournisseurs DROP rue, DROP cp, DROP ville, DROP pays');
    }
}
