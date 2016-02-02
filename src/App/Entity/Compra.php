<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_compra")
 */
class Compra extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_compra", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $data_compra;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $data_pagamento;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $data_cadastro;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $vendedor_caixa;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $subtotal;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $desconto;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $total;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $dinheiro;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $troco;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $obs;

    /**
     * @Column(name="id_forma_pgto", type="integer")
     */
    protected $forma_pagamento;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $descricao;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $tags;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $imposto;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    //protected $titulo;

    /**
     * @Column(type="string", length=32)
     * @var string
     */
//    protected $ndepagina;

    /**
     * @var Estabelecimento
     *
     * @ManyToOne(targetEntity="Estabelecimento")
     * @JoinColumn(name="id_estabelecimento", referencedColumnName="id_estabelecimento")
     */
    protected $estabelecimento;
    
    public function getEstabelecimento() {
        return $this->estabelecimento;
    }

    public function setEstabelecimento($estabelecimento) {
        $this->estabelecimento = $estabelecimento;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getData_compra() {
        return $this->data_compra;
    }

    public function getData_pagamento() {
        return $this->data_pagamento;
    }

    public function getData_cadastro() {
        return $this->data_cadastro;
    }

    public function getVendedor_caixa() {
        return $this->vendedor_caixa;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getDinheiro() {
        return $this->dinheiro;
    }

    public function getTroco() {
        return $this->troco;
    }

    public function getObs() {
        return $this->obs;
    }

    public function getForma_pagamento() {
        return $this->forma_pagamento;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getImposto() {
        return $this->imposto;
    }

    public function setData_compra($data_compra) {
        $this->data_compra = $data_compra;
    }

    public function setData_pagamento($data_pagamento) {
        $this->data_pagamento = $data_pagamento;
    }

    public function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    public function setVendedor_caixa($vendedor_caixa) {
        $this->vendedor_caixa = $vendedor_caixa;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setDinheiro($dinheiro) {
        $this->dinheiro = $dinheiro;
    }

    public function setTroco($troco) {
        $this->troco = $troco;
    }

    public function setObs($obs) {
        $this->obs = $obs;
    }

    public function setForma_pagamento($forma_pagamento) {
        $this->forma_pagamento = $forma_pagamento;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function setImposto($imposto) {
        $this->imposto = $imposto;
    }

}
