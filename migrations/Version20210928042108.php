<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928042108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE survey_survey_line (survey_id INT NOT NULL, survey_line_id INT NOT NULL, INDEX IDX_AF056B38B3FE509D (survey_id), INDEX IDX_AF056B3895756F9 (survey_line_id), PRIMARY KEY(survey_id, survey_line_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_answer (id INT AUTO_INCREMENT NOT NULL, answer VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_line (id INT AUTO_INCREMENT NOT NULL, question_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_17FDB43D1E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_line_survey_answer (survey_line_id INT NOT NULL, survey_answer_id INT NOT NULL, INDEX IDX_7BEA6A9495756F9 (survey_line_id), INDEX IDX_7BEA6A94F650A2A (survey_answer_id), PRIMARY KEY(survey_line_id, survey_answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE survey_question (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE survey_survey_line ADD CONSTRAINT FK_AF056B38B3FE509D FOREIGN KEY (survey_id) REFERENCES survey (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_survey_line ADD CONSTRAINT FK_AF056B3895756F9 FOREIGN KEY (survey_line_id) REFERENCES survey_line (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_line ADD CONSTRAINT FK_17FDB43D1E27F6BF FOREIGN KEY (question_id) REFERENCES survey_question (id)');
        $this->addSql('ALTER TABLE survey_line_survey_answer ADD CONSTRAINT FK_7BEA6A9495756F9 FOREIGN KEY (survey_line_id) REFERENCES survey_line (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE survey_line_survey_answer ADD CONSTRAINT FK_7BEA6A94F650A2A FOREIGN KEY (survey_answer_id) REFERENCES survey_answer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE survey_line_survey_answer DROP FOREIGN KEY FK_7BEA6A94F650A2A');
        $this->addSql('ALTER TABLE survey_survey_line DROP FOREIGN KEY FK_AF056B3895756F9');
        $this->addSql('ALTER TABLE survey_line_survey_answer DROP FOREIGN KEY FK_7BEA6A9495756F9');
        $this->addSql('ALTER TABLE survey_line DROP FOREIGN KEY FK_17FDB43D1E27F6BF');
        $this->addSql('DROP TABLE survey_survey_line');
        $this->addSql('DROP TABLE survey_answer');
        $this->addSql('DROP TABLE survey_line');
        $this->addSql('DROP TABLE survey_line_survey_answer');
        $this->addSql('DROP TABLE survey_question');
    }
}
