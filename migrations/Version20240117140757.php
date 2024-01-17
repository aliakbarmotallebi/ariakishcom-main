<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117140757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admins` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, fullname VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', status VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_A2E0150FF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `contacts` (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(255) NOT NULL, phone_number VARCHAR(11) NOT NULL, message LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `customers` (id INT AUTO_INCREMENT NOT NULL, mobile VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, fullname VARCHAR(255) DEFAULT NULL, verify_code INT DEFAULT NULL, code_expired_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', address LONGTEXT DEFAULT NULL, national_code VARCHAR(10) DEFAULT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_62534E213C7323E0 (mobile), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `resumes` (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(255) NOT NULL, father_name VARCHAR(255) NOT NULL, phone_number VARCHAR(11) NOT NULL, gender TINYINT(1) NOT NULL, birth_date VARCHAR(255) NOT NULL, marital_status TINYINT(1) NOT NULL, military_status VARCHAR(255) NOT NULL, national_code VARCHAR(10) NOT NULL, birth_certificate_number VARCHAR(100) DEFAULT NULL, address LONGTEXT NOT NULL, residential_status VARCHAR(255) NOT NULL, tel VARCHAR(11) DEFAULT NULL, degree VARCHAR(255) NOT NULL, degree_date VARCHAR(255) NOT NULL, field VARCHAR(255) NOT NULL, degree_summary LONGTEXT DEFAULT NULL, language VARCHAR(255) NOT NULL, guarantee TINYINT(1) NOT NULL, job_title VARCHAR(255) NOT NULL, salary_expectation VARCHAR(255) NOT NULL, start_date_availability VARCHAR(255) NOT NULL, iq_score INT NOT NULL, memory_score INT NOT NULL, responsibility_score INT NOT NULL, follow_up_score INT NOT NULL, disciplin_in_work_score INT NOT NULL, work_ethic_score INT NOT NULL, customer_respect_score INT NOT NULL, motivation_for_working VARCHAR(255) NOT NULL, insurance_number VARCHAR(255) NOT NULL, employment_history LONGTEXT DEFAULT NULL, work_experience JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', status VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `admins`');
        $this->addSql('DROP TABLE `contacts`');
        $this->addSql('DROP TABLE `customers`');
        $this->addSql('DROP TABLE `resumes`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
