<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124065053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidates_category (candidates_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_629662D37D5FB314 (candidates_id), INDEX IDX_629662D312469DE2 (category_id), PRIMARY KEY(candidates_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidates_category ADD CONSTRAINT FK_629662D37D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidates_category ADD CONSTRAINT FK_629662D312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidates_category');
    }
}
