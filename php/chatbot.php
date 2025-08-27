<button class="chatbot-open-button" onclick="openChatbot()">💬</button>
<div class="chatbot-popup" id="chatbotForm">
    <div class="chatbot-header">
        <strong>Assistente Virtual - Weglinho</strong>
    </div>
    <form class="chatbot-form-container" onsubmit="enviarMensagemChatbot(event)">
        <div id="chatbot-mensagens"></div>
        <input type="text" id="chatbot-mensagem" placeholder="Digite sua pergunta..." autocomplete="off" required>
        <button type="submit" class="chatbot-btn">Enviar</button>
        <button type="button" class="chatbot-btn chatbot-cancel" onclick="closeChatbot()">Fechar</button>
    </form>
</div>
