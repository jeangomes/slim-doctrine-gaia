<?php

namespace App\Entity;

use App\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Entity
 * @Table(name="tbl_livro")
 */
class Livro extends Entity {

    /**
     * @var integer
     *
     * @Column(name="id_livro", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $titulo;

    /**
     * @Column(type="string", length=32)
     * @var string
     */
    protected $ndepagina;

    /**
     * @var Autor
     *
     * @ManyToOne(targetEntity="Autor")
     * @JoinColumn(name="id_autor", referencedColumnName="id_autor")
     */
    protected $autor;

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getNdepagina() {
        return $this->ndepagina;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setNdepagina($ndepagina) {
        $this->ndepagina = $ndepagina;
    }

}
