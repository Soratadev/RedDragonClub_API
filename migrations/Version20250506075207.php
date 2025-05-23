<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250506075207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP INDEX uniq_98a1db1d2b36786b
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame RENAME COLUMN title TO name
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_98A1DB1D5E237E06 ON boardgame (name)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_98A1DB1D5E237E06
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame RENAME COLUMN name TO title
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX uniq_98a1db1d2b36786b ON boardgame (title)
        SQL);
    }
}
