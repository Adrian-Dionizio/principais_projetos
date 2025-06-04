<?php
include_once(__DIR__."/ElementoArma.php");
include_once(__DIR__."/Gato.php");

class Cacador implements JsonSerializable{
    private ?int $id = null;              
    private ?string $nome = null;         
    private ?string $arma = null;         
    private ?string $genero = null;       
    private ?Gato $gato = null;          
    private ?ElementoArma $elementosArmas = null;
    

    public function jsonSerialize(): array {
        return array("id" => $this->id,
                    "nome" => $this->nome,
                    "arma" => $this->arma,
                    "genero" => $this->genero,
                    
                    "gato"=> $this->gato->getGatoNome(),
                "elementosArmas"=> $this->elementosArmas->getElementosArmasTipo(),);
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of arma
     */
    public function getArma(): ?string
    {
        return $this->arma;
    }

    /**
     * Set the value of arma
     */
    public function setArma(?string $arma): self
    {
        $this->arma = $arma;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?string
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of gato
     */
    public function getGato(): ?Gato
    {
        return $this->gato;
    }

    /**
     * Set the value of gato
     */
    public function setGato(?Gato $gato): self
    {
        $this->gato = $gato;

        return $this;
    }

    /**
     * Get the value of elementosArmas
     */
    public function getElementosArmas(): ?ElementoArma
    {
        return $this->elementosArmas;
    }

    /**
     * Set the value of elementosArmas
     */
    public function setElementosArmas(?ElementoArma $elementosArmas): self
    {
        $this->elementosArmas = $elementosArmas;

        return $this;
    }
}