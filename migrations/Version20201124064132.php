<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124064132 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C9667D5FB314');
        $this->addSql('DROP INDEX IDX_5373C9667D5FB314 ON country');
        $this->addSql('ALTER TABLE country DROP candidates_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9667D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_5373C9667D5FB314 ON country (candidates_id)');
    }
}
