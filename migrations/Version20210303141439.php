<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303141439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5C0F152BE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comptes_agents CHANGE idProfil idProfil INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits CHANGE idCategorie idCategorie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comporter DROP quantite');
        $this->addSql('ALTER TABLE comporter RENAME INDEX idvente TO IDX_4442FCC99F4E6951');
        $this->addSql('ALTER TABLE ventes CHANGE idClient idClient INT DEFAULT NULL, CHANGE idAgent idAgent INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_user');
        $this->addSql('ALTER TABLE comporter ADD quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comporter RENAME INDEX idx_4442fcc99f4e6951 TO idVente');
        $this->addSql('ALTER TABLE comptes_agents CHANGE idProfil idProfil INT NOT NULL');
        $this->addSql('ALTER TABLE produits CHANGE idCategorie idCategorie INT NOT NULL');
        $this->addSql('ALTER TABLE ventes CHANGE idClient idClient INT NOT NULL, CHANGE idAgent idAgent INT NOT NULL');
    }
}
