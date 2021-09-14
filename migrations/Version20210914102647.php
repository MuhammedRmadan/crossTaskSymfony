<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914102647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_translations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, locale VARCHAR(10) NOT NULL, car_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD brand VARCHAR(80) NOT NULL, ADD model VARCHAR(80) NOT NULL, ADD color VARCHAR(80) NOT NULL, ADD gas_economy VARCHAR(80) DEFAULT NULL, DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car_translations');
        $this->addSql('ALTER TABLE car ADD name VARCHAR(11) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP brand, DROP model, DROP color, DROP gas_economy');
    }
}
