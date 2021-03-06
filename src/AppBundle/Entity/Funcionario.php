<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FuncionarioRepository")
 */
class Funcionario
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
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=255)
     * @Assert\NotBlank
     */
    private $cpf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date")
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     * @Assert\NotBlank
     */
    private $endereco;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dependente", mappedBy="funcionario", cascade={"remove"})
     */
    private $dependentes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dependentes = new ArrayCollection();
    }


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
     * @return Funcionario
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
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Funcionario
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Funcionario
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
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Funcionario
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Add dependente
     *
     * @param \AppBundle\Entity\Dependente $dependente
     *
     * @return Funcionario
     */
    public function addDependente(\AppBundle\Entity\Dependente $dependente)
    {
        $this->dependentes[] = $dependente;

        return $this;
    }

    /**
     * Remove dependente
     *
     * @param \AppBundle\Entity\Dependente $dependente
     */
    public function removeDependente(\AppBundle\Entity\Dependente $dependente)
    {
        $this->dependentes->removeElement($dependente);
    }

    /**
     * Get dependentes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDependentes()
    {
        return $this->dependentes;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNome();
    }
}
