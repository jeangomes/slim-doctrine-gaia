<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_autor")
 */
class Autor extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_autor", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $nome;

    /**
     * @Column(type="string", length=32)
     * @var string
     */
    protected $sexo;

    /**
     * @Column(type="string", length=32)
     * @var string
     */
    protected $nacionalidade;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

}
