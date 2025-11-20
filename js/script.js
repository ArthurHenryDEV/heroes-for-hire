function validarFormulario() {
    let descricao = document.getElementById('descricao').value;
    let nome = document.getElementById('nome').value;
    if (descricao.length < 10) {
        alert("Por favor, descreva o problema com mais detalhes para que o herói saiba o que levar!");
        return false; 
    }
    alert("Enviando sinal para a Torre de Vigilância...");
    return true;
}