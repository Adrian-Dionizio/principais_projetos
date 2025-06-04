<?php
class Gato{
    private ?int $gato_id;
    private ?string $gato_nome;
    private ?string $gato_tipo; 
    private ?string $gato_genero;
    

    /**
     * Get the value of gato_id
     */
    public function getGatoId(): ?int
    {
        return $this->gato_id;
    }

    /**
     * Set the value of gato_id
     */
    public function setGatoId(?int $gato_id): self
    {
        $this->gato_id = $gato_id;

        return $this;
    }

    /**
     * Get the value of gato_nome
     */
    public function getGatoNome(): ?string
    {
        return $this->gato_nome;
    }

    /**
     * Set the value of gato_nome
     */
    public function setGatoNome(?string $gato_nome): self
    {
        $this->gato_nome = $gato_nome;

        return $this;
    }

    /**
     * Get the value of gato_tipo
     */
    public function getGatoTipo(): ?string
    {
        return $this->gato_tipo;
    }

    /**
     * Set the value of gato_tipo
     */
    public function setGatoTipo(?string $gato_tipo): self
    {
        $this->gato_tipo = $gato_tipo;

        return $this;
    }

    /**
     * Get the value of gato_genero
     */
    public function getGatoGenero(): ?string
    {
        return $this->gato_genero;
    }

    /**
     * Set the value of gato_genero
     */
    public function setGatoGenero(?string $gato_genero): self
    {
        $this->gato_genero = $gato_genero;

        return $this;
    }
}