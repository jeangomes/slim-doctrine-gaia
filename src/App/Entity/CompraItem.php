<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_compra_item")
 */
class CompraItem extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_item", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $valor_unitario;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $qtd;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $desconto;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $valor_total;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $valor_nota;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $descricao;

    /**
     * @var Compra
     *
     * @ManyToOne(targetEntity="Compra")
     * @JoinColumn(name="id_compra", referencedColumnName="id_compra")
     */
    protected $compra;

    public function getId() {
        return $this->id;
    }

    public function getValor_unitario() {
        return $this->valor_unitario;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function getValor_total() {
        return $this->valor_total;
    }

    public function getValor_nota() {
        return $this->valor_nota;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCompra() {
        return $this->compra;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setValor_unitario($valor_unitario) {
        $this->valor_unitario = $valor_unitario;
    }

    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    public function setValor_total($valor_total) {
        $this->valor_total = $valor_total;
    }

    public function setValor_nota($valor_nota) {
        $this->valor_nota = $valor_nota;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setCompra(Compra $compra) {
        $this->compra = $compra;
    }

}
