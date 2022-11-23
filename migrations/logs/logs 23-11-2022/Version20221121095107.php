<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221121095107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD responsable_id INT DEFAULT NULL, ADD num_rue INT NOT NULL, ADD rue VARCHAR(50) NOT NULL, ADD ville VARCHAR(50) NOT NULL, ADD tel VARCHAR(50) NOT NULL, ADD mail VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F753C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F753C59D72 ON eleve (responsable_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F753C59D72');
        $this->addSql('DROP INDEX IDX_ECA105F753C59D72 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP responsable_id, DROP num_rue, DROP rue, DROP ville, DROP tel, DROP mail');
    }
}
