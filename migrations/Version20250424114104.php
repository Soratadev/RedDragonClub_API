<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424114104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE boardgame (id SERIAL NOT NULL, title VARCHAR(50) NOT NULL, designer VARCHAR(255) NOT NULL, players VARCHAR(5) DEFAULT NULL, playing_time VARCHAR(10) DEFAULT NULL, complexity DOUBLE PRECISION NOT NULL, age SMALLINT NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id SERIAL NOT NULL, name VARCHAR(25) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category_boardgame (category_id INT NOT NULL, boardgame_id INT NOT NULL, PRIMARY KEY(category_id, boardgame_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5FC1092D12469DE2 ON category_boardgame (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5FC1092DB1A27A21 ON category_boardgame (boardgame_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_of_joining DATE NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_boardgame ADD CONSTRAINT FK_5FC1092D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_boardgame ADD CONSTRAINT FK_5FC1092DB1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_boardgame DROP CONSTRAINT FK_5FC1092D12469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category_boardgame DROP CONSTRAINT FK_5FC1092DB1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boardgame
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category_boardgame
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
    }
}
