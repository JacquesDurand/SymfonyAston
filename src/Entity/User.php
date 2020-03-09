<?php

namespace App\Entity;

class User
{
    protected $nom;
    private $ability;

    function __construct($name, $ability)
    {
        $this->nom = $name;
        $this->ability = $ability;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of ability
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * Set the value of ability
     *
     * @return  self
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;

        return $this;
    }
}
