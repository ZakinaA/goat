<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121102625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD contrat_pret_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7B2AF233D FOREIGN KEY (contrat_pret_id) REFERENCES contrat_pret (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7B2AF233D ON eleve (contrat_pret_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7B2AF233D');
        $this->addSql('DROP INDEX IDX_ECA105F7B2AF233D ON eleve');
        $this->addSql('ALTER TABLE eleve DROP contrat_pret_id');
    }
}
