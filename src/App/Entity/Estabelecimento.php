<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_estabelecimento")
 */
class Estabelecimento extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_estabelecimento", type="integer")
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
     *
     * @Column(name="id_categoria", type="integer")
     */
    protected $id_categoria;

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setDescricao($nome) {
        $this->nome = $nome;
    }

}
