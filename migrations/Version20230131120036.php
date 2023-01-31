<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230131120036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE offre_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE offres_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE offres (id INT NOT NULL, etablissement_id INT NOT NULL, numero INT NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT NOT NULL, metier VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C6AC3544FF631228 ON offres (etablissement_id)');
        $this->addSql('ALTER TABLE offres ADD CONSTRAINT FK_C6AC3544FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offre DROP CONSTRAINT fk_af86866fff631228');
        $this->addSql('DROP TABLE offre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE offres_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE offre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE offre (id INT NOT NULL, etablissement_id INT NOT NULL, numero INT NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT NOT NULL, metier VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_af86866fff631228 ON offre (etablissement_id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT fk_af86866fff631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE offres DROP CONSTRAINT FK_C6AC3544FF631228');
        $this->addSql('DROP TABLE offres');
    }
}
