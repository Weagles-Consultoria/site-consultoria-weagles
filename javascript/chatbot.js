function carregarHistorico() {
  const historico = JSON.parse(sessionStorage.getItem('chatHistory') || '[]');
  const chat = document.getElementById("chatbot-mensagens");
  chat.innerHTML = '';
  historico.forEach(item => {
    const nome = item.de === 'user' ? 'Você' : 'Weglinho';
    chat.innerHTML += `<div><b>${nome}:</b> ${item.texto}</div>`;
  });
  chat.scrollTop = chat.scrollHeight;
}

// Salvar mensagem no sessionStorage
function salvarMensagem(de, texto) {
  const historico = JSON.parse(sessionStorage.getItem('chatHistory') || '[]');
  historico.push({ de, texto });
  sessionStorage.setItem('chatHistory', JSON.stringify(historico));
}

function openChatbot() {
  document.getElementById("chatbotForm").style.display = "block";
  carregarHistorico();
}

function closeChatbot() {
    document.getElementById("chatbotForm").style.display = "none";
}

async function enviarMensagemChatbot(event) {
  event.preventDefault();
  const input = document.getElementById("chatbot-mensagem");
  const msg = input.value.trim();
  if (!msg) return;
  input.value = "";

  const chat = document.getElementById("chatbot-mensagens");
  chat.innerHTML += `<div><b>Você:</b> ${msg}</div>`;
  salvarMensagem('user', msg);

  try {
    const resposta = await fetch("http://localhost:5000/chat", {
      method: "POST",
      headers: {"Content-Type": "application/json"},
      body: JSON.stringify({msg})
    }).then(r => r.json());

    chat.innerHTML += `<div><b>Weglinho:</b> ${resposta.resposta.replace(/\n/g, "<br>")}</div>`;
    salvarMensagem('bot', resposta.resposta);
  } catch (e) {
    chat.innerHTML += `<div><b>Weglinho:</b> Erro ao conectar ao assistente.</div>`;
  }
  chat.scrollTop = chat.scrollHeight;
}
