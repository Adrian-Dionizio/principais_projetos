<?php
class ElementoArma{
    
    private ?int $elementosArmas_id = null;  
    private ?string $elementosArmas_tipo = null; 
    

    /**
     * Get the value of elementosArmas_id
     */
    public function getElementosArmasId(): ?int
    {
        return $this->elementosArmas_id;
    }

    /**
     * Set the value of elementosArmas_id
     */
    public function setElementosArmasId(?int $elementosArmas_id): self
    {
        $this->elementosArmas_id = $elementosArmas_id;

        return $this;
    }

    /**
     * Get the value of elementosArmas_tipo
     */
    public function getElementosArmasTipo(): ?string
    {
        return $this->elementosArmas_tipo;
    }

    /**
     * Set the value of elementosArmas_tipo
     */
    public function setElementosArmasTipo(?string $elementosArmas_tipo): self
    {
        $this->elementosArmas_tipo = $elementosArmas_tipo;

        return $this;
    }
}