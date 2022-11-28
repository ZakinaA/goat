<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128100915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervention (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, descriptif VARCHAR(500) NOT NULL, prix VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, num_rue VARCHAR(3) NOT NULL, rue VARCHAR(50) NOT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(100) NOT NULL, tel VARCHAR(10) NOT NULL, mail VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE responsable CHANGE tel1 tel1 INT NOT NULL, CHANGE tel2 tel2 INT NOT NULL, CHANGE tel3 tel3 INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE professionnel');
        $this->addSql('ALTER TABLE responsable CHANGE tel1 tel1 INT DEFAULT NULL, CHANGE tel2 tel2 INT DEFAULT NULL, CHANGE tel3 tel3 INT DEFAULT NULL');
    }
}
