from flask import Flask, request, jsonify
from flask_cors import CORS
import re
import unicodedata

app = Flask(__name__)
CORS(app)

respostas = {
    "saudacoes": {
        "palavras_chave": ["oi", "olá", "ola", "eae", "saudações", "bom dia", "boa tarde", "boa noite"],
        "resposta": "Olá! Eu sou o Weglinho, seu assistente virtual. Como posso ajudar você hoje?"
    },
    "identidade": {
        "palavras_chave": ["quem é você", "qual seu nome", "seu nome", "te chamam"],
        "resposta": "Meu nome é Weglinho, sou um assistente virtual especializado em ajudar com informações sobre a Weagles Consultoria e Tecnologia."
    },
    "empresa": {
        "palavras_chave": ["empresa", "weagles", "fundadores", "fundação", "sede"],
        "resposta": "A Weagles foi fundada em 2024 por João Gabriel Cozentino e Vitor Garbim, com sede em Monte Alto/SP, especializada em consultoria estratégica e soluções em IA."
    },
    "servicos": {
        "palavras_chave": ["serviços", "oferecem", "fazem", "produtos", "soluções"],
        "resposta": "Oferecemos:\n- Consultoria estratégica\n- Desenvolvimento de IA customizada\n- Otimização de processos empresariais\n- Soluções tecnológicas personalizadas"
    },
    "contato": {
        "palavras_chave": ["contato", "telefone", "email", "endereço", "local"],
        "resposta": "Você pode nos contatar por:\n📞 (16) 1234-5678\n📧 contato@weagles.com.br\n📍 Rua da Inovação, 123 - Monte Alto/SP"
    },
    "tecnologia": {
        "palavras_chave": ["tecnologia", "ia", "inteligência artificial", "machine learning", "chatbot"],
        "resposta": "Nossas soluções usam IA de ponta com:\n- Processamento de linguagem natural\n- Redes neurais profundas\n- Sistemas de recomendação inteligentes"
    },
    "horario": {
        "palavras_chave": ["horário", "funcionamento", "atendimento", "horas"],
        "resposta": "Atendemos:\n⏰ Segunda a sexta: 8h às 18h\n⏰ Sábado: 8h às 12h"
    },
    "despedidas": {
        "palavras_chave": ["tchau", "adeus", "até logo", "obrigado", "valeu"],
        "resposta": "Foi um prazer ajudar! Volte sempre que precisar. 😊"
    },
    "default": {
        "resposta": "Desculpe, não entendi completamente. Poderia reformular sua pergunta? Estou aqui para ajudar com:\n- Informações sobre a empresa\n- Nossos serviços\n- Dúvidas técnicas\n- Horários de atendimento"
    }
}

def normalizar_texto(texto):
    texto = unicodedata.normalize("NFD", texto.casefold())
    texto = "".join(caractere for caractere in texto if unicodedata.category(caractere) != "Mn")
    return re.sub(r"\s+", " ", texto).strip()


def contem_termo(mensagem, termo):
    padrao = rf"(?<!\w){re.escape(normalizar_texto(termo))}(?!\w)"
    return re.search(padrao, mensagem) is not None


def processar_mensagem(mensagem):
    if not isinstance(mensagem, str):
        return respostas["default"]["resposta"]

    mensagem = normalizar_texto(mensagem)
    for categoria in respostas.values():
        if "palavras_chave" in categoria:
            for palavra in categoria["palavras_chave"]:
                if contem_termo(mensagem, palavra):
                    return categoria["resposta"]
    return respostas["default"]["resposta"]

@app.route("/chat", methods=["POST"])
def chat():
    dados = request.get_json(silent=True) or {}
    if not isinstance(dados, dict):
        dados = {}
    msg = dados.get("msg", "")
    resposta = processar_mensagem(msg)
    return jsonify({"resposta": resposta})

if __name__ == "__main__":
    app.run(debug=True)
