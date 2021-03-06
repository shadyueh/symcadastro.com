<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dependente
 *
 * @ORM\Table(name="dependente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DependenteRepository")
 */
class Dependente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     * @Assert\NotBlank
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date")
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="parentesco", type="string", length=255)
     * @Assert\NotBlank
     */
    private $parentesco;

     /**
     * @var Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Funcionario", inversedBy="dependentes")
     * @ORM\JoinColumn(name="funcionario_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank
     */
    private $funcionario;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Dependente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Dependente
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set parentesco
     *
     * @param string $parentesco
     *
     * @return Dependente
     */
    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;

        return $this;
    }

    /**
     * Get parentesco
     *
     * @return string
     */
    public function getParentesco()
    {
        return $this->parentesco;
    }

    /**
     * Set funcionario
     *
     * @param \AppBundle\Entity\Funcionario $funcionario
     *
     * @return Dependente
     */
    public function setFuncionario(\AppBundle\Entity\Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    /**
     * Get funcionario
     *
     * @return \AppBundle\Entity\Funcionario
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }
}
