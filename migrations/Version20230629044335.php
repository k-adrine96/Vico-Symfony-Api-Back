<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629044335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD creator_id INT NOT NULL, ADD vico_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE61220EA6 FOREIGN KEY (creator_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE19F89217 FOREIGN KEY (vico_id) REFERENCES vico (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE61220EA6 ON project (creator_id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE19F89217 ON project (vico_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE61220EA6');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE19F89217');
        $this->addSql('DROP INDEX IDX_2FB3D0EE61220EA6 ON project');
        $this->addSql('DROP INDEX IDX_2FB3D0EE19F89217 ON project');
        $this->addSql('ALTER TABLE project DROP creator_id, DROP vico_id');
    }
}
