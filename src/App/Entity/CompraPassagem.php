<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_compra_passagem")
 */
class CompraPassagem extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_passagem", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $data_viagem;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $de_onde;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $destino_passagem;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $destino_comprado;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $destino_real;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $poltrona;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $motivo_viagem;

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

    public function getDeOnde() {
        return $this->de_onde;
    }

    public function getDataViagem() {
        return $this->data_viagem;
    }

    public function getDestinoPassagem() {
        return $this->destino_passagem;
    }

    public function getDestinoComprado() {
        return $this->destino_comprado;
    }

    public function getDestinoReal() {
        return $this->destino_real;
    }

    public function getPoltrona() {
        return $this->poltrona;
    }

    public function getMotivoViagem() {
        return $this->motivo_viagem;
    }

    public function getCompra() {
        return $this->compra;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDataViagem($data_viagem) {
        $this->data_viagem = $data_viagem;
    }

    public function setDeOnde($de_onde) {
        $this->de_onde = $de_onde;
    }

    public function setDestinoPassagem($destino_passagem) {
        $this->destino_passagem = $destino_passagem;
    }

    public function setDestinoComprado($destino_comprado) {
        $this->destino_comprado = $destino_comprado;
    }

    public function setDestinoReal($destino_real) {
        $this->destino_real = $destino_real;
    }

    public function setPoltrona($poltrona) {
        $this->poltrona = $poltrona;
    }

    public function setMotivoViagem($motivo_viagem) {
        $this->motivo_viagem = $motivo_viagem;
    }

    public function setCompra(Compra $compra) {
        $this->compra = $compra;
    }

}
