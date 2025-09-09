<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250908120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create table intervention';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE intervention (
            id INT AUTO_INCREMENT NOT NULL,
            reference VARCHAR(50) NOT NULL,
            nom_client VARCHAR(100) NOT NULL,
            prenom_client VARCHAR(100) NOT NULL,
            adresse_client VARCHAR(255) NOT NULL,
            telephone_client VARCHAR(20) NOT NULL,
            email_client VARCHAR(180) NOT NULL,
            description LONGTEXT NOT NULL,
            date_intervention DATETIME NOT NULL,
            etat VARCHAR(20) NOT NULL,
            technicien VARCHAR(100) NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE intervention');
    }
}