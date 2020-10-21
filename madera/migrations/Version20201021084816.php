<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021084816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE composants_sections (composants_id INT NOT NULL, sections_id INT NOT NULL, INDEX IDX_9F3F5F56D960F9EE (composants_id), INDEX IDX_9F3F5F56577906E4 (sections_id), PRIMARY KEY(composants_id, sections_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules_sections (modules_id INT NOT NULL, sections_id INT NOT NULL, INDEX IDX_A56FA6E60D6DC42 (modules_id), INDEX IDX_A56FA6E577906E4 (sections_id), PRIMARY KEY(modules_id, sections_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules_montants (modules_id INT NOT NULL, montants_id INT NOT NULL, INDEX IDX_FD22DE460D6DC42 (modules_id), INDEX IDX_FD22DE49F778C56 (montants_id), PRIMARY KEY(modules_id, montants_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules_huisserie (modules_id INT NOT NULL, huisserie_id INT NOT NULL, INDEX IDX_4E7D2D0660D6DC42 (modules_id), INDEX IDX_4E7D2D068243A556 (huisserie_id), PRIMARY KEY(modules_id, huisserie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montants_composants (montants_id INT NOT NULL, composants_id INT NOT NULL, INDEX IDX_CA018EEB9F778C56 (montants_id), INDEX IDX_CA018EEBD960F9EE (composants_id), PRIMARY KEY(montants_id, composants_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE composants_sections ADD CONSTRAINT FK_9F3F5F56D960F9EE FOREIGN KEY (composants_id) REFERENCES composants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composants_sections ADD CONSTRAINT FK_9F3F5F56577906E4 FOREIGN KEY (sections_id) REFERENCES sections (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_sections ADD CONSTRAINT FK_A56FA6E60D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_sections ADD CONSTRAINT FK_A56FA6E577906E4 FOREIGN KEY (sections_id) REFERENCES sections (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_montants ADD CONSTRAINT FK_FD22DE460D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_montants ADD CONSTRAINT FK_FD22DE49F778C56 FOREIGN KEY (montants_id) REFERENCES montants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_huisserie ADD CONSTRAINT FK_4E7D2D0660D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_huisserie ADD CONSTRAINT FK_4E7D2D068243A556 FOREIGN KEY (huisserie_id) REFERENCES huisserie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montants_composants ADD CONSTRAINT FK_CA018EEB9F778C56 FOREIGN KEY (montants_id) REFERENCES montants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE montants_composants ADD CONSTRAINT FK_CA018EEBD960F9EE FOREIGN KEY (composants_id) REFERENCES composants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clients ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C82E744DE7DC5C ON clients (adresse_id)');
        $this->addSql('ALTER TABLE composants ADD fournisseur_id INT NOT NULL, ADD famille_id INT NOT NULL');
        $this->addSql('ALTER TABLE composants ADD CONSTRAINT FK_F95A3199670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE composants ADD CONSTRAINT FK_F95A319997A77B84 FOREIGN KEY (famille_id) REFERENCES famille_composants (id)');
        $this->addSql('CREATE INDEX IDX_F95A3199670C757F ON composants (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_F95A319997A77B84 ON composants (famille_id)');
        $this->addSql('ALTER TABLE fournisseurs ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE fournisseurs ADD CONSTRAINT FK_D3EF00414DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3EF00414DE7DC5C ON fournisseurs (adresse_id)');
        $this->addSql('ALTER TABLE modules ADD gammes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE modules ADD CONSTRAINT FK_2EB743D72D19822A FOREIGN KEY (gammes_id) REFERENCES gammes (id)');
        $this->addSql('CREATE INDEX IDX_2EB743D72D19822A ON modules (gammes_id)');
        $this->addSql('ALTER TABLE projets ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE projets ADD CONSTRAINT FK_B454C1DB19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_B454C1DB19EB6921 ON projets (client_id)');
        $this->addSql('ALTER TABLE utilisateurs ADD fonction_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E57889920 FOREIGN KEY (fonction_id) REFERENCES fonctions (id)');
        $this->addSql('CREATE INDEX IDX_497B315E57889920 ON utilisateurs (fonction_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE composants_sections');
        $this->addSql('DROP TABLE modules_sections');
        $this->addSql('DROP TABLE modules_montants');
        $this->addSql('DROP TABLE modules_huisserie');
        $this->addSql('DROP TABLE montants_composants');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_C82E744DE7DC5C ON clients');
        $this->addSql('ALTER TABLE clients DROP adresse_id');
        $this->addSql('ALTER TABLE composants DROP FOREIGN KEY FK_F95A3199670C757F');
        $this->addSql('ALTER TABLE composants DROP FOREIGN KEY FK_F95A319997A77B84');
        $this->addSql('DROP INDEX IDX_F95A3199670C757F ON composants');
        $this->addSql('DROP INDEX IDX_F95A319997A77B84 ON composants');
        $this->addSql('ALTER TABLE composants DROP fournisseur_id, DROP famille_id');
        $this->addSql('ALTER TABLE fournisseurs DROP FOREIGN KEY FK_D3EF00414DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_D3EF00414DE7DC5C ON fournisseurs');
        $this->addSql('ALTER TABLE fournisseurs DROP adresse_id');
        $this->addSql('ALTER TABLE modules DROP FOREIGN KEY FK_2EB743D72D19822A');
        $this->addSql('DROP INDEX IDX_2EB743D72D19822A ON modules');
        $this->addSql('ALTER TABLE modules DROP gammes_id');
        $this->addSql('ALTER TABLE projets DROP FOREIGN KEY FK_B454C1DB19EB6921');
        $this->addSql('DROP INDEX IDX_B454C1DB19EB6921 ON projets');
        $this->addSql('ALTER TABLE projets DROP client_id');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E57889920');
        $this->addSql('DROP INDEX IDX_497B315E57889920 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP fonction_id');
    }
}
