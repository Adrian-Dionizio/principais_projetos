const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");

const app = express();
app.use(cors());
app.use(bodyParser.json());

app.post("/api/cacadores", (req, res) => {
    const { nome, armas, genero, gato, elementoArma } = req.body;
    let erros = [];

    if (!nome || nome.trim() === "") {
        erros.push("O nome é obrigatório.");
    }
    if (!armas || armas.trim() === "") {
        erros.push("O campo 'armas' é obrigatório.");
    }
    if (!genero || genero.trim() === "") {
        erros.push("O gênero é obrigatório.");
    }
    if (!gato || gato.trim() === "") {
        erros.push("O campo 'gato' não pode estar vazio.");
    }
    if (!elementoArma || elementoArma.trim() === "") {
        erros.push("O elemento da arma é obrigatório.");
    }

    if (erros.length > 0) {
        return res.status(400).json({ status: "erro", mensagens: erros });
    }

  ;
});

/*
  res.json({ status: "sucesso", mensagem: "Caçador validado com sucesso!" }) 
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});*/