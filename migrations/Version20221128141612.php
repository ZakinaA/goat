<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128141612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours ADD heure_debut TIME NOT NULL, ADD heure_fin TIME NOT NULL');
        $this->addSql('ALTER TABLE responsable CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE adresse adresse VARCHAR(50) NOT NULL, CHANGE ville ville VARCHAR(50) NOT NULL, CHANGE code_postal code_postal VARCHAR(9) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL, CHANGE tel1 tel1 INT NOT NULL, CHANGE tel2 tel2 INT NOT NULL, CHANGE tel3 tel3 INT NOT NULL, CHANGE quotient_familial quotient_familial INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP heure_debut, DROP heure_fin');
        $this->addSql('ALTER TABLE responsable CHANGE nom nom VARCHAR(50) DEFAULT NULL, CHANGE prenom prenom VARCHAR(50) DEFAULT NULL, CHANGE adresse adresse VARCHAR(50) DEFAULT NULL, CHANGE ville ville VARCHAR(50) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(9) DEFAULT NULL, CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE tel1 tel1 INT DEFAULT NULL, CHANGE tel2 tel2 INT DEFAULT NULL, CHANGE tel3 tel3 INT DEFAULT NULL, CHANGE quotient_familial quotient_familial INT DEFAULT NULL');
    }
}
