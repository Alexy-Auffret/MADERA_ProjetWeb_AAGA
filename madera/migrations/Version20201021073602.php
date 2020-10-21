<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021073602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, numero_rue INT NOT NULL, rue VARCHAR(250) NOT NULL, code_postale INT NOT NULL, ville VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(50) NOT NULL, prenom_client VARCHAR(50) NOT NULL, num_tel_client VARCHAR(13) NOT NULL, mail_client VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composants (id INT AUTO_INCREMENT NOT NULL, libelle_composant VARCHAR(50) NOT NULL, caracteristique VARCHAR(100) NOT NULL, unite_usage VARCHAR(50) NOT NULL, prix_base INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille_composants (id INT AUTO_INCREMENT NOT NULL, libelle_famille_composants VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonctions (id INT AUTO_INCREMENT NOT NULL, libelle_fonction VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gammes (id INT AUTO_INCREMENT NOT NULL, libelle_gamme VARCHAR(150) NOT NULL, finition_exterieur VARCHAR(150) NOT NULL, type_isolant VARCHAR(150) NOT NULL, type_couverture VARCHAR(150) NOT NULL, qualite_huisserie VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE huisserie (id INT AUTO_INCREMENT NOT NULL, libelle_huisserie VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules (id INT AUTO_INCREMENT NOT NULL, libelle_module VARCHAR(150) NOT NULL, hauteur_module INT NOT NULL, longueur_module INT NOT NULL, plan_coupe VARCHAR(50) NOT NULL, parametre_prix INT NOT NULL, cctp VARCHAR(50) NOT NULL, is_modele TINYINT(1) NOT NULL, remplissage VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montants (id INT AUTO_INCREMENT NOT NULL, libelle_montant VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projets (id INT AUTO_INCREMENT NOT NULL, nom_projet VARCHAR(150) NOT NULL, date_creation_projet DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sections (id INT AUTO_INCREMENT NOT NULL, libelle_section VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(50) NOT NULL, prenom_utilisateur VARCHAR(50) NOT NULL, num_tel_utilisateur VARCHAR(13) NOT NULL, mail_utilisateur VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresses');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE composants');
        $this->addSql('DROP TABLE famille_composants');
        $this->addSql('DROP TABLE fonctions');
        $this->addSql('DROP TABLE gammes');
        $this->addSql('DROP TABLE huisserie');
        $this->addSql('DROP TABLE modules');
        $this->addSql('DROP TABLE montants');
        $this->addSql('DROP TABLE projets');
        $this->addSql('DROP TABLE sections');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
