const conversations = {
    Alice: {
        avatar: "https://i.pravatar.cc/100?img=1",
        status: "Online",
        messages: [
            {
                sender: "them",
                text: "Hi! Are you available tomorrow?",
                time: "10:15 AM",
            },
            {
                sender: "me",
                text: "Yes, I am. What time works for you?",
                time: "10:16 AM",
            },
        ],
    },
    Bob: {
        avatar: "https://i.pravatar.cc/100?img=2",
        status: "Offline",
        messages: [
            {
                sender: "them",
                text: "Let’s check the apartment listing.",
                time: "Yesterday 3:45 PM",
            },
            {
                sender: "me",
                text: "Sure, I will send it shortly.",
                time: "Yesterday 3:47 PM",
            },
        ],
    },
    Carol: {
        avatar: "https://i.pravatar.cc/100?img=3",
        status: "Online",
        messages: [
            {
                sender: "them",
                text: "Can you send the contract?",
                time: "Today 9:00 AM",
            },
        ],
    },
};

const contactsDiv = document.getElementById("contacts");
const messageContainer = document.getElementById("messageContainer");
const chatHeaderName = document.getElementById("contactName");
const chatHeaderStatus = document.getElementById("contactStatus");
const contactAvatar = document.getElementById("contactAvatar");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.querySelector('form button[type="submit"]');
const messageForm = document.getElementById("messageForm");
const backBtn = document.getElementById("backBtn");
const chatSection = document.querySelector("section");
const contactsAside = document.querySelector("aside");

const fileInput = document.getElementById("fileInput");
const imageInput = document.getElementById("imageInput");
const attachFileBtn = document.getElementById("attachFileBtn");
const attachImageBtn = document.getElementById("attachImageBtn");

let currentContact = null;

function renderContacts() {
    contactsDiv.innerHTML = "";
    Object.entries(conversations).forEach(([name, convo]) => {
        const lastMsg = convo.messages[convo.messages.length - 1];
        const contactDiv = document.createElement("div");
        contactDiv.classList.add(
            "flex",
            "items-center",
            "gap-3",
            "p-3",
            "cursor-pointer",
            "border-b",
            "border-[#BBCB2F]",
            "rounded-md"
        );
        if (currentContact === name) contactDiv.classList.add("bg-[#FEFA95]");
        else contactDiv.classList.add("hover:bg-[#BBCB2F]/20");

        contactDiv.dataset.name = name;
        contactDiv.innerHTML = `
          <img src="${convo.avatar}" alt="${name}" class="w-12 h-12 rounded-full object-cover flex-shrink-0 border border-[#BBCB2F]" />
          <div class="flex flex-col flex-grow min-w-0">
            <div class="font-semibold truncate">${name}</div>
            <div class="text-sm text-[#021908aa] truncate">${lastMsg.text}</div>
          </div>
          <div class="text-xs text-[#02190888] flex-shrink-0">${lastMsg.time}</div>
        `;
        contactDiv.addEventListener("click", () => selectContact(name));
        contactsDiv.appendChild(contactDiv);
    });
}

function renderMessages(name) {
    const convo = conversations[name];
    messageContainer.innerHTML = "";
    if (!convo || convo.messages.length === 0) {
        const p = document.createElement("p");
        p.classList.add("text-center", "text-[#02190888]");
        p.textContent = "No messages yet.";
        messageContainer.appendChild(p);
        return;
    }

    convo.messages.forEach((msg) => {
        const wrapper = document.createElement("div");
        wrapper.classList.add("flex");
        if (msg.sender === "me") wrapper.classList.add("justify-end");
        else wrapper.classList.add("justify-start");

        const bubble = document.createElement("div");
        bubble.classList.add(
            "max-w-xs",
            "px-4",
            "py-2",
            "text-[#021908]",
            "rounded-2xl",
            "break-words"
        );
        if (msg.sender === "me")
            bubble.classList.add("bg-yellow-300", "rounded-br-none");
        else bubble.classList.add("bg-green-300", "rounded-bl-none");
        bubble.textContent = msg.text;

        const timeDiv = document.createElement("div");
        timeDiv.classList.add(
            "text-[10px]",
            "text-right",
            "text-[#02190888]",
            "mt-1",
            "select-none"
        );
        timeDiv.textContent = msg.time;

        bubble.appendChild(timeDiv);
        wrapper.appendChild(bubble);
        messageContainer.appendChild(wrapper);
    });
    messageContainer.scrollTop = messageContainer.scrollHeight;
}

function selectContact(name) {
    currentContact = name;
    renderContacts();

    chatHeaderName.textContent = name;
    chatHeaderStatus.textContent = conversations[name].status;
    contactAvatar.src = conversations[name].avatar;
    contactAvatar.classList.remove("hidden");

    renderMessages(name);

    messageInput.disabled = false;
    sendBtn.disabled = true;
    messageInput.value = "";
    messageInput.focus();

    if (window.innerWidth < 768) {
        contactsAside.style.display = "none";
        chatSection.style.display = "flex";
    }
}

messageInput.addEventListener("input", () => {
    sendBtn.disabled = messageInput.value.trim().length === 0;
});

messageForm.addEventListener("submit", (e) => {
    e.preventDefault();
    if (!currentContact) return;

    const text = messageInput.value.trim();
    if (!text) return;

    const now = new Date();
    const time = now.toLocaleTimeString([], {
        hour: "2-digit",
        minute: "2-digit",
    });

    conversations[currentContact].messages.push({ sender: "me", text, time });

    renderMessages(currentContact);
    renderContacts();

    messageInput.value = "";
    sendBtn.disabled = true;
    messageInput.focus();
});

backBtn.addEventListener("click", () => {
    contactsAside.style.display = "flex";
    chatSection.style.display = "none";
});

attachFileBtn.addEventListener("click", () => fileInput.click());
attachImageBtn.addEventListener("click", () => imageInput.click());

fileInput.addEventListener("change", (e) => {
    if (!currentContact) {
        alert("Select a chat first to send files.");
        fileInput.value = "";
        return;
    }
    if (e.target.files.length) {
        alert(
            `Selected file: ${e.target.files[0].name}\n(Note: File sending not implemented)`
        );
        fileInput.value = "";
    }
});

imageInput.addEventListener("change", (e) => {
    if (!currentContact) {
        alert("Select a chat first to send images.");
        imageInput.value = "";
        return;
    }
    if (e.target.files.length) {
        alert(
            `Selected image: ${e.target.files[0].name}\n(Note: Image sending not implemented)`
        );
        imageInput.value = "";
    }
});

renderContacts();

if (window.innerWidth < 768) {
    chatSection.style.display = "none";
}

window.addEventListener("resize", () => {
    if (window.innerWidth >= 768) {
        contactsAside.style.display = "flex";
        chatSection.style.display = "flex";
    } else {
        if (!currentContact) {
            chatSection.style.display = "none";
            contactsAside.style.display = "flex";
        }
    }
});
