<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128101414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE professionnel_metier (professionnel_id INT NOT NULL, metier_id INT NOT NULL, INDEX IDX_715C73CA8A49CC82 (professionnel_id), INDEX IDX_715C73CAED16FA20 (metier_id), PRIMARY KEY(professionnel_id, metier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE professionnel_metier ADD CONSTRAINT FK_715C73CA8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professionnel_metier ADD CONSTRAINT FK_715C73CAED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervention ADD instrument_id INT DEFAULT NULL, ADD professionnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABCF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814AB8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('CREATE INDEX IDX_D11814ABCF11D9C ON intervention (instrument_id)');
        $this->addSql('CREATE INDEX IDX_D11814AB8A49CC82 ON intervention (professionnel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE professionnel_metier DROP FOREIGN KEY FK_715C73CA8A49CC82');
        $this->addSql('ALTER TABLE professionnel_metier DROP FOREIGN KEY FK_715C73CAED16FA20');
        $this->addSql('DROP TABLE professionnel_metier');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABCF11D9C');
        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814AB8A49CC82');
        $this->addSql('DROP INDEX IDX_D11814ABCF11D9C ON intervention');
        $this->addSql('DROP INDEX IDX_D11814AB8A49CC82 ON intervention');
        $this->addSql('ALTER TABLE intervention DROP instrument_id, DROP professionnel_id');
    }
}
