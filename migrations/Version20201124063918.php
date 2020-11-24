<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124063918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C13B7B3A1A');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C17D5FB314');
        $this->addSql('DROP INDEX IDX_64C19C13B7B3A1A ON category');
        $this->addSql('DROP INDEX IDX_64C19C17D5FB314 ON category');
        $this->addSql('ALTER TABLE category DROP candidates_id, DROP catgory_candidate_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD candidates_id INT DEFAULT NULL, ADD catgory_candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C13B7B3A1A FOREIGN KEY (catgory_candidate_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C17D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('CREATE INDEX IDX_64C19C13B7B3A1A ON category (catgory_candidate_id)');
        $this->addSql('CREATE INDEX IDX_64C19C17D5FB314 ON category (candidates_id)');
    }
}
