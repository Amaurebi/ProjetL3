<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205103840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, corp LONGTEXT NOT NULL, objet VARCHAR(255) NOT NULL, time DATETIME NOT NULL, INDEX IDX_B6BD307FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, date_upload DATE NOT NULL, places INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre_user (offre_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CFC1683D4CC8505A (offre_id), INDEX IDX_CFC1683DA76ED395 (user_id), PRIMARY KEY(offre_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE offre_user ADD CONSTRAINT FK_CFC1683D4CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offre_user ADD CONSTRAINT FK_CFC1683DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fichier ADD message_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fichier ADD CONSTRAINT FK_9B76551F537A1329 FOREIGN KEY (message_id) REFERENCES message (id)');
        $this->addSql('CREATE INDEX IDX_9B76551F537A1329 ON fichier (message_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier DROP FOREIGN KEY FK_9B76551F537A1329');
        $this->addSql('ALTER TABLE offre_user DROP FOREIGN KEY FK_CFC1683D4CC8505A');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE offre_user');
        $this->addSql('DROP INDEX IDX_9B76551F537A1329 ON fichier');
        $this->addSql('ALTER TABLE fichier DROP message_id');
    }
}
