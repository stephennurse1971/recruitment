<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124064248 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resort DROP FOREIGN KEY FK_D69AD86A7D5FB314');
        $this->addSql('DROP INDEX IDX_D69AD86A7D5FB314 ON resort');
        $this->addSql('ALTER TABLE resort DROP candidates_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resort ADD candidates_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resort ADD CONSTRAINT FK_D69AD86A7D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_D69AD86A7D5FB314 ON resort (candidates_id)');
    }
}
