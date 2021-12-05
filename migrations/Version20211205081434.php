<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205081434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fichier DROP type, DROP updated_at');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610E3DA5256D');
        $this->addSql('DROP INDEX UNIQ_EAA5610E3DA5256D ON realisation');
        $this->addSql('ALTER TABLE realisation ADD afficher TINYINT(1) NOT NULL, DROP image_id, DROP etat, DROP updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie');
        $this->addSql('ALTER TABLE fichier ADD type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE realisation ADD image_id INT DEFAULT NULL, ADD etat SMALLINT NOT NULL, ADD updated_at DATETIME DEFAULT NULL, DROP afficher');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E3DA5256D FOREIGN KEY (image_id) REFERENCES fichier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EAA5610E3DA5256D ON realisation (image_id)');
    }
}
