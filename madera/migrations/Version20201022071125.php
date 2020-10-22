<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201022071125 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseurs DROP FOREIGN KEY FK_D3EF00414DE7DC5C');
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP INDEX UNIQ_D3EF00414DE7DC5C ON fournisseurs');
        $this->addSql('ALTER TABLE fournisseurs DROP adresse_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, numero_rue INT NOT NULL, rue VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, code_postale INT NOT NULL, ville VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE fournisseurs ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE fournisseurs ADD CONSTRAINT FK_D3EF00414DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3EF00414DE7DC5C ON fournisseurs (adresse_id)');
    }
}
