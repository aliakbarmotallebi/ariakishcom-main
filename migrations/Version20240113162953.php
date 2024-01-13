<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113162953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admins` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, fullname VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', status ENUM(\'STATUS_PUBLISHED\', \'STATUS_UNPUBLISHED\') NOT NULL DEFAULT \'STATUS_UNPUBLISHED\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_A2E0150FF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `contacts` (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(255) NOT NULL, phone_number VARCHAR(11) NOT NULL, message LONGTEXT NOT NULL, status ENUM(\'STATUS_PUBLISHED\', \'STATUS_UNPUBLISHED\') NOT NULL DEFAULT \'STATUS_UNPUBLISHED\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `customers` (id INT AUTO_INCREMENT NOT NULL, mobile VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, fullname VARCHAR(255) DEFAULT NULL, verify_code INT DEFAULT NULL, code_expired_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', address LONGTEXT DEFAULT NULL, national_code VARCHAR(10) DEFAULT NULL, status ENUM(\'STATUS_PUBLISHED\', \'STATUS_UNPUBLISHED\') NOT NULL DEFAULT \'STATUS_UNPUBLISHED\', UNIQUE INDEX UNIQ_62534E213C7323E0 (mobile), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admins`');
        $this->addSql('DROP TABLE `contacts`');
        $this->addSql('DROP TABLE `customers`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
