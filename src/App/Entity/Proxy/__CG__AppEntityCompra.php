<?php

namespace Proxy\__CG__\App\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Compra extends \App\Entity\Compra implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getEstabelecimento()
    {
        $this->__load();
        return parent::getEstabelecimento();
    }

    public function setEstabelecimento($estabelecimento)
    {
        $this->__load();
        return parent::setEstabelecimento($estabelecimento);
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getData_compra()
    {
        $this->__load();
        return parent::getData_compra();
    }

    public function getData_pagamento()
    {
        $this->__load();
        return parent::getData_pagamento();
    }

    public function getData_cadastro()
    {
        $this->__load();
        return parent::getData_cadastro();
    }

    public function getVendedor_caixa()
    {
        $this->__load();
        return parent::getVendedor_caixa();
    }

    public function getSubtotal()
    {
        $this->__load();
        return parent::getSubtotal();
    }

    public function getDesconto()
    {
        $this->__load();
        return parent::getDesconto();
    }

    public function getTotal()
    {
        $this->__load();
        return parent::getTotal();
    }

    public function getDinheiro()
    {
        $this->__load();
        return parent::getDinheiro();
    }

    public function getTroco()
    {
        $this->__load();
        return parent::getTroco();
    }

    public function getObs()
    {
        $this->__load();
        return parent::getObs();
    }

    public function getForma_pagamento()
    {
        $this->__load();
        return parent::getForma_pagamento();
    }

    public function getDescricao()
    {
        $this->__load();
        return parent::getDescricao();
    }

    public function getTags()
    {
        $this->__load();
        return parent::getTags();
    }

    public function getImposto()
    {
        $this->__load();
        return parent::getImposto();
    }

    public function setData_compra($data_compra)
    {
        $this->__load();
        return parent::setData_compra($data_compra);
    }

    public function setData_pagamento($data_pagamento)
    {
        $this->__load();
        return parent::setData_pagamento($data_pagamento);
    }

    public function setData_cadastro($data_cadastro)
    {
        $this->__load();
        return parent::setData_cadastro($data_cadastro);
    }

    public function setVendedor_caixa($vendedor_caixa)
    {
        $this->__load();
        return parent::setVendedor_caixa($vendedor_caixa);
    }

    public function setSubtotal($subtotal)
    {
        $this->__load();
        return parent::setSubtotal($subtotal);
    }

    public function setDesconto($desconto)
    {
        $this->__load();
        return parent::setDesconto($desconto);
    }

    public function setTotal($total)
    {
        $this->__load();
        return parent::setTotal($total);
    }

    public function setDinheiro($dinheiro)
    {
        $this->__load();
        return parent::setDinheiro($dinheiro);
    }

    public function setTroco($troco)
    {
        $this->__load();
        return parent::setTroco($troco);
    }

    public function setObs($obs)
    {
        $this->__load();
        return parent::setObs($obs);
    }

    public function setForma_pagamento($forma_pagamento)
    {
        $this->__load();
        return parent::setForma_pagamento($forma_pagamento);
    }

    public function setDescricao($descricao)
    {
        $this->__load();
        return parent::setDescricao($descricao);
    }

    public function setTags($tags)
    {
        $this->__load();
        return parent::setTags($tags);
    }

    public function setImposto($imposto)
    {
        $this->__load();
        return parent::setImposto($imposto);
    }

    public function setUpdatedValue()
    {
        $this->__load();
        return parent::setUpdatedValue();
    }

    public function setCreated($created)
    {
        $this->__load();
        return parent::setCreated($created);
    }

    public function getCreated()
    {
        $this->__load();
        return parent::getCreated();
    }

    public function setUpdated($updated)
    {
        $this->__load();
        return parent::setUpdated($updated);
    }

    public function getUpdated()
    {
        $this->__load();
        return parent::getUpdated();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'data_compra', 'data_pagamento', 'data_cadastro', 'vendedor_caixa', 'subtotal', 'desconto', 'total', 'dinheiro', 'troco', 'obs', 'forma_pagamento', 'descricao', 'tags', 'imposto', 'estabelecimento');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}