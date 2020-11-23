<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113072658 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, employer_id INT NOT NULL, category_id INT NOT NULL, resort_id INT NOT NULL, description LONGTEXT DEFAULT NULL, wages VARCHAR(255) DEFAULT NULL, accommodation_provided TINYINT(1) DEFAULT NULL, ski_pass_provided TINYINT(1) DEFAULT NULL, equipment_provided TINYINT(1) DEFAULT NULL, full_board VARCHAR(255) DEFAULT NULL, date_start DATE DEFAULT NULL, date_end DATE DEFAULT NULL, requirements LONGTEXT DEFAULT NULL, INDEX IDX_FBD8E0F841CD9E7A (employer_id), INDEX IDX_FBD8E0F812469DE2 (category_id), INDEX IDX_FBD8E0F87A3ABE5D (resort_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F841CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F812469DE2 FOREIGN KEY (category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F87A3ABE5D FOREIGN KEY (resort_id) REFERENCES resort (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE job');
    }
}
