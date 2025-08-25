// chatbot.js
function toggleChat() {
    var chat = document.getElementById("chatbot");
    if (chat.style.display === "none" || chat.style.display === "") {
        chat.style.display = "block";
    } else {
        chat.style.display = "none";
    }
}

function sendMessage() {
    var input = document.getElementById("chat-input");
    var message = input.value;
    if (message.trim() === "") return;
    
    var chatBody = document.getElementById("chat-body");
    var userMessage = document.createElement("p");
    userMessage.textContent = "You: " + message;
    chatBody.appendChild(userMessage);
    
    var botResponse = document.createElement("p");
    botResponse.style.fontWeight = "bold";
    botResponse.style.color = "blue";
    
    if (message.includes("good morning")) {
        botResponse.textContent = "Bot: Good morning! Hope you have a great day! ☀️";
    } else if (message.includes("hello") || message.includes("hi")) {
        botResponse.textContent = "Bot: Hello! How can I assist you today? 😊";
    } else if (message.includes("how are you")) {
        botResponse.textContent = "Bot: I'm just a bot, but I'm here to help! How can I assist you?";
    } else {
        botResponse.textContent = "Bot: Sorry, I am still learning. Can you ask something else?";
    }
    
    chatBody.appendChild(botResponse);
    input.value = "";
    chatBody.scrollTop = chatBody.scrollHeight;
}
