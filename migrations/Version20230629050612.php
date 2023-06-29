<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629050612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rating ADD project_id INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_D8892622166D1F9C ON rating (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622166D1F9C');
        $this->addSql('DROP INDEX IDX_D8892622166D1F9C ON rating');
        $this->addSql('ALTER TABLE rating DROP project_id, DROP created_at');
    }
}
