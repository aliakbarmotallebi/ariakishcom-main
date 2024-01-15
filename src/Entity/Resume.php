<?php

namespace App\Entity;

use App\Entity\Traits\TimableTrait;
use App\Enum\Language;
use App\Enum\MotivationForWorking;
use App\Enum\Status;
use App\Repository\ResumeRepository;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeRepository::class)]
#[ORM\Table(name: '`resumes`')]
#[ORM\HasLifecycleCallbacks]
class Resume
{
    use TimableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\Column(length: 255)]
    private ?string $fatherName = null;

    #[ORM\Column(length: 11)]
    private ?string $phoneNumber = null;

    #[ORM\Column]
    private ?bool $gender = null;

    #[ORM\Column]
    private ?string $birthDate = null;

    #[ORM\Column]
    private ?bool $maritalStatus = null;

    #[ORM\Column(length: 255)]
    private ?string $militaryStatus = null;

    #[ORM\Column(length: 10)]
    private ?string $nationalCode = null;

    #[ORM\Column(length: 100)]
    private ?string $birthCertificateNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $residentialStatus = null;

    #[ORM\Column(length: 11)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $degree = null;

    #[ORM\Column(length: 255)]
    private ?string $degreeDate = null;

    #[ORM\Column(length: 255)]
    private ?string $field = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $degreeSummary = null;

    #[ORM\Column(type: Types::STRING, enumType: Language::class)]
    private ?Language $language = null;

    #[ORM\Column]
    private ?bool $guarantee = null;

    #[ORM\Column(length: 255)]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $salaryExpectation = null;

    #[ORM\Column(length: 255)]
    private ?string $startDateAvailability = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $iqScore = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $memoryScore = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $responsibilityScore = null;

    #[ORM\Column(length: 3)]
    private ?int $followUpScore = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $disciplinInWorkScore = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $workEthicScore = null;

    #[ORM\Column(type: Types::INTEGER, length:3)]
    private ?int $customerRespectScore = null;

    #[ORM\Column(type: Types::STRING, enumType: MotivationForWorking::class)]
    private ?MotivationForWorking $motivationForWorking = null;

    #[ORM\Column(length: 255)]
    private ?string $insuranceNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $employmentHistory = null;

    #[ORM\Column(type: Types::JSON, nullable:true)]
    private array $workExperience = [];

    #[ORM\Column(type: Types::STRING, enumType: Status::class)]
    private ?Status $status;

    public function __construct()
    {
        $this->status = Status::UnPublished;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    public function setFatherName(string $fatherName): static
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function isMaritalStatus(): ?bool
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(bool $maritalStatus): static
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getMilitaryStatus(): ?string
    {
        return $this->militaryStatus;
    }

    public function setMilitaryStatus(string $militaryStatus): static
    {
        $this->militaryStatus = $militaryStatus;

        return $this;
    }

    public function getNationalCode(): ?string
    {
        return $this->nationalCode;
    }

    public function setNationalCode(string $nationalCode): static
    {
        $this->nationalCode = $nationalCode;

        return $this;
    }

    public function getBirthCertificateNumber(): ?string
    {
        return $this->birthCertificateNumber;
    }

    public function setBirthCertificateNumber(string $birthCertificateNumber): static
    {
        $this->birthCertificateNumber = $birthCertificateNumber;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getResidentialStatus(): ?string
    {
        return $this->residentialStatus;
    }

    public function setResidentialStatus(string $residentialStatus): static
    {
        $this->residentialStatus = $residentialStatus;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): static
    {
        $this->degree = $degree;

        return $this;
    }

    public function getDegreeDate(): ?string
    {
        return $this->degreeDate;
    }

    public function setDegreeDate(string $degreeDate): static
    {
        $this->degreeDate = $degreeDate;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(string $field): static
    {
        $this->field = $field;

        return $this;
    }

    public function getDegreeSummary(): ?string
    {
        return $this->degreeSummary;
    }

    public function setDegreeSummary(string $degreeSummary): static
    {
        $this->degreeSummary = $degreeSummary;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function isGuarantee(): ?bool
    {
        return $this->guarantee;
    }

    public function setGuarantee(bool $guarantee): static
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getSalaryExpectation(): ?string
    {
        return $this->salaryExpectation;
    }

    public function setSalaryExpectation(string $salaryExpectation): static
    {
        $this->salaryExpectation = $salaryExpectation;

        return $this;
    }

    public function getStartDateAvailability(): ?string
    {
        return $this->startDateAvailability;
    }

    public function setStartDateAvailability(string $startDateAvailability): static
    {
        $this->startDateAvailability = $startDateAvailability;

        return $this;
    }

    public function getIqScore(): ?int
    {
        return $this->iqScore;
    }

    public function setIqScore(int $iqScore): static
    {
        $this->iqScore = $iqScore;

        return $this;
    }

    public function getMemoryScore(): ?int
    {
        return $this->memoryScore;
    }

    public function setMemoryScore(int $memoryScore): static
    {
        $this->memoryScore = $memoryScore;

        return $this;
    }

    public function getResponsibilityScore(): ?int
    {
        return $this->responsibilityScore;
    }

    public function setResponsibilityScore(int $responsibilityScore): static
    {
        $this->responsibilityScore = $responsibilityScore;

        return $this;
    }

    public function getFollowUpScore(): ?string
    {
        return $this->followUpScore;
    }

    public function setFollowUpScore(string $followUpScore): static
    {
        $this->followUpScore = $followUpScore;

        return $this;
    }

    public function getDisciplinInWorkScore(): ?int
    {
        return $this->disciplinInWorkScore;
    }

    public function setDisciplinInWorkScore(int $disciplinInWorkScore): static
    {
        $this->disciplinInWorkScore = $disciplinInWorkScore;

        return $this;
    }

    public function getWorkEthicScore(): ?int
    {
        return $this->workEthicScore;
    }

    public function setWorkEthicScore(int $workEthicScore): static
    {
        $this->workEthicScore = $workEthicScore;

        return $this;
    }

    public function getCustomerRespectScore(): ?int
    {
        return $this->customerRespectScore;
    }

    public function setCustomerRespectScore(int $customerRespectScore): static
    {
        $this->customerRespectScore = $customerRespectScore;

        return $this;
    }

    public function getMotivationForWorking(): ?string
    {
        return $this->motivationForWorking;
    }

    public function setMotivationForWorking(string $motivationForWorking): static
    {
        $this->motivationForWorking = $motivationForWorking;

        return $this;
    }

    public function getInsuranceNumber(): ?string
    {
        return $this->insuranceNumber;
    }

    public function setInsuranceNumber(string $insuranceNumber): static
    {
        $this->insuranceNumber = $insuranceNumber;

        return $this;
    }

    public function getEmploymentHistory(): ?string
    {
        return $this->employmentHistory;
    }

    public function setEmploymentHistory(string $employmentHistory): static
    {
        $this->employmentHistory = $employmentHistory;

        return $this;
    }

    public function getWorkExperience(): array
    {
        return $this->workExperience;
    }

    public function setWorkExperience(array $workExperience): static
    {
        $this->workExperience = $workExperience;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}