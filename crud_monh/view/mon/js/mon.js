function validarCacador(event) {
    event.preventDefault();

    let nome = document.getElementById("nome").value.trim();
    let armas = document.getElementById("armas").value;
    let genero = document.getElementById("genero").value;
    let gato = document.getElementById("gato").value;
    let elementoArma = document.getElementById("elementoArma").value;

    let erroDiv = document.getElementById("error-mensagens");
    erroDiv.innerHTML = "";

    let dados = { nome, armas, genero, gato, elementoArma };

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let resposta = JSON.parse(this.responseText);
            } else {
                erroDiv.innerHTML = '';
                let erros = JSON.parse(this.responseText).erros;
                if (erros && erros.length > 0) {
                    erros.forEach(function(erro) {
                        erroDiv.innerHTML += `<div class='alert alert-danger'>${erro}</div>`;
                    });
                } else {
                    erroDiv.innerHTML += `<div class='alert alert-danger'>Erro ao validar caçador.</div>`;
                }

                return false;
            }
        }
    };

    xhttp.open("POST", "/../api/cacadores", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify(dados));
}

function detalharCacador(idCacador) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //alert(this.responseText);
            //return;

            let cacador = JSON.parse(this.responseText);
            
            document.getElementById("detalhe-id").innerText = cacador.id;
            document.getElementById("detalhe-nome").innerText = cacador.nome;
            document.getElementById("detalhe-arma").innerText = cacador.arma;
            document.getElementById("detalhe-elemento").innerText = cacador.elementosArmas;
            document.getElementById("detalhe-gato").innerText = cacador.gato ;
        }
    };
    xhttp.open("GET", `/crud_monh/api/cacadores.php?id=${idCacador}`, false);
    xhttp.send();




    /**
     *  erroDiv.style.display = "block";    
                if (resposta.status === "erro") {
                    console.error("Erros da API:", resposta.mensagens);
                    erroDiv.innerHTML = `<ul class='alert alert-danger'><li>${resposta.mensagens.join("</li><li>")}</li></ul>`;
              
                } else {
                    console.log("Sucesso:", resposta.mensagem);
                    erroDiv.innerHTML = `<div class='alert alert-success'>${resposta.mensagem}</div>`;
                
                    document.getElementById("frmCadastroCacador").reset();
                }
     */
}