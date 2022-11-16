<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116085334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrument ADD classe_instrument VARCHAR(50) NOT NULL, ADD date_achat DATE NOT NULL, ADD prix INT NOT NULL, ADD marque VARCHAR(50) NOT NULL, ADD modele VARCHAR(50) NOT NULL, ADD numero_serie VARCHAR(50) NOT NULL, ADD couleur VARCHAR(50) NOT NULL, ADD utilisation VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrument DROP classe_instrument, DROP date_achat, DROP prix, DROP marque, DROP modele, DROP numero_serie, DROP couleur, DROP utilisation');
    }
}
