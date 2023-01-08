<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230105090845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, matier_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_11BA68C695CF4DA (matier_id), INDEX IDX_11BA68CA6CC7B2 (eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C695CF4DA FOREIGN KEY (matier_id) REFERENCES matiers (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleves (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C695CF4DA');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CA6CC7B2');
        $this->addSql('DROP TABLE notes');
    }
}
