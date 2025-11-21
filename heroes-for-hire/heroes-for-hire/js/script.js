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
function validarFormulario() {
    let descricao = document.getElementById('descricao').value;
    if (descricao.length < 5) {
        alert("Por favor, descreva o perigo com mais detalhes!");
        return false;
    }
    return true;
}
function mudarCorUrgencia() {
    let select = document.getElementById('selectUrgencia');
    let aviso = document.getElementById('avisoUrgencia');
    let valor = select.value;
    select.style.borderColor = ""; 
    select.style.boxShadow = "";
    if (valor === 'Baixa') {
        select.style.borderColor = "#00f2ff"; 
        aviso.innerText = "Situação sob controle.";
        aviso.style.color = "#00f2ff";
    } 
    else if (valor === 'Media') {
        select.style.borderColor = "#ffcc00"; 
        aviso.innerText = "Atenção: Equipes em alerta.";
        aviso.style.color = "#ffcc00";
    } 
    else if (valor === 'Alta') {
        select.style.borderColor = "#ff3333"; 
        select.style.boxShadow = "0 0 10px #ff3333"; 
        aviso.innerText = "PERIGO: Evacue a área imediatamente!";
        aviso.style.color = "#ff3333";
    } 
    else if (valor === 'Vingadores') {
        select.style.borderColor = "#9b59b6"; 
        select.style.boxShadow = "0 0 15px #9b59b6"; 
        aviso.innerText = "PROTOCOLO VINGADORES ATIVADO. NÃO SE MOVA.";
        aviso.style.color = "#9b59b6";
        alert("⚠️ ALERTA MÁXIMO: Esta opção notificará uma Super Equipe!");
    }
}