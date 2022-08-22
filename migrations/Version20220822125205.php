<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822125205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_reference (id INT AUTO_INCREMENT NOT NULL, rayon_id INT DEFAULT NULL, nom_produit VARCHAR(255) NOT NULL, mini INT DEFAULT NULL, maxi INT DEFAULT NULL, INDEX IDX_2A3417FFD3202E52 (rayon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rayon (id INT AUTO_INCREMENT NOT NULL, nom_rayon VARCHAR(255) NOT NULL, carrefour INT DEFAULT NULL, lidl INT DEFAULT NULL, auchan INT DEFAULT NULL, leclerc INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_reference ADD CONSTRAINT FK_2A3417FFD3202E52 FOREIGN KEY (rayon_id) REFERENCES rayon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_reference DROP FOREIGN KEY FK_2A3417FFD3202E52');
        $this->addSql('DROP TABLE produit_reference');
        $this->addSql('DROP TABLE rayon');
    }
}
