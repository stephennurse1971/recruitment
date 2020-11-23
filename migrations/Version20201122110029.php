<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201122110029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidates (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, previous_seasonnaire VARCHAR(255) DEFAULT NULL, date_from DATE DEFAULT NULL, date_to DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C17D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_64C19C17D5FB314 ON category (candidates_id)');
        $this->addSql('ALTER TABLE country ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9667D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_5373C9667D5FB314 ON country (candidates_id)');
        $this->addSql('ALTER TABLE resort ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resort ADD CONSTRAINT FK_D69AD86A7D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_D69AD86A7D5FB314 ON resort (candidates_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C17D5FB314');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C9667D5FB314');
        $this->addSql('ALTER TABLE resort DROP FOREIGN KEY FK_D69AD86A7D5FB314');
        $this->addSql('DROP TABLE candidates');
        $this->addSql('DROP INDEX IDX_64C19C17D5FB314 ON category');
        $this->addSql('ALTER TABLE category DROP candidates_id');
        $this->addSql('DROP INDEX IDX_5373C9667D5FB314 ON country');
        $this->addSql('ALTER TABLE country DROP candidates_id');
        $this->addSql('DROP INDEX IDX_D69AD86A7D5FB314 ON resort');
        $this->addSql('ALTER TABLE resort DROP candidates_id');
    }
}
