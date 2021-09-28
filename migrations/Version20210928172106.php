<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928172106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE survey ADD slug VARCHAR(100) NOT NULL, ADD created DATETIME DEFAULT NULL, ADD updated DATETIME DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AD5F9BFC989D9B62 ON survey (slug)');
        $this->addSql('ALTER TABLE survey_question ADD slug VARCHAR(100) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EA000F69989D9B62 ON survey_question (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_AD5F9BFC989D9B62 ON survey');
        $this->addSql('ALTER TABLE survey DROP slug, DROP created, DROP updated');
        $this->addSql('DROP INDEX UNIQ_EA000F69989D9B62 ON survey_question');
        $this->addSql('ALTER TABLE survey_question DROP slug');
    }
}
