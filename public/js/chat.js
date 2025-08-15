// chat.js

// Example conversations (replace with dynamic data from backend later)
const conversations = {
  Alice: {
    avatar: 'https://i.pravatar.cc/100?img=1',
    status: 'Online',
    messages: [
      { sender: 'them', text: 'Hi! Are you available tomorrow?', time: '10:15 AM' },
      { sender: 'me', text: 'Yes, I am. What time works for you?', time: '10:16 AM' },
    ],
  },
  Bob: {
    avatar: 'https://i.pravatar.cc/100?img=2',
    status: 'Offline',
    messages: [
      { sender: 'them', text: 'Let’s check the apartment listing.', time: 'Yesterday 3:45 PM' },
      { sender: 'me', text: 'Sure, I will send it shortly.', time: 'Yesterday 3:47 PM' },
    ],
  },
  Carol: {
    avatar: 'https://i.pravatar.cc/100?img=3',
    status: 'Online',
    messages: [
      { sender: 'them', text: 'Can you send the contract?', time: 'Today 9:00 AM' },
    ],
  }
};

// DOM Elements
const contactsDiv = document.getElementById('contacts');
const messageContainer = document.getElementById('messageContainer');
const chatHeaderName = document.getElementById('contactName');
const chatHeaderStatus = document.getElementById('contactStatus');
const contactAvatar = document.getElementById('contactAvatar');
const messageInput = document.getElementById('messageInput');
const sendBtn = document.querySelector('form button[type="submit"]');
const messageForm = document.getElementById('messageForm');

const backBtn = document.getElementById('backBtn');          // optional
const chatSection = document.querySelector('section');       // chat panel
const contactsAside = document.querySelector('aside');       // contacts panel

const fileInput = document.getElementById('fileInput');
const imageInput = document.getElementById('imageInput');
const attachFileBtn = document.getElementById('attachFileBtn');
const attachImageBtn = document.getElementById('attachImageBtn');

let currentContact = null;

// Render contacts
function renderContacts() {
  if (!contactsDiv) return;
  contactsDiv.innerHTML = '';
  Object.entries(conversations).forEach(([name, convo]) => {
    const lastMsg = convo.messages[convo.messages.length -1];
    const contactDiv = document.createElement('div');
    contactDiv.className = `flex items-center gap-3 p-3 cursor-pointer border-b border-[#BBCB2F] rounded-md
      ${currentContact === name ? 'bg-[#FEFA95]' : 'hover:bg-[#BBCB2F]/20'}`;
    contactDiv.dataset.name = name;

    contactDiv.innerHTML = `
      <img src="${convo.avatar}" alt="${name}" class="w-12 h-12 rounded-full object-cover flex-shrink-0 border border-[#BBCB2F]" />
      <div class="flex flex-col flex-grow min-w-0">
        <div class="font-semibold truncate">${name}</div>
        <div class="text-sm text-[#021908aa] truncate">${lastMsg.text}</div>
      </div>
      <div class="text-xs text-[#02190888] flex-shrink-0">${lastMsg.time}</div>
    `;

    contactDiv.addEventListener('click', () => selectContact(name));
    contactsDiv.appendChild(contactDiv);
  });
}

// Render messages
function renderMessages(name) {
  if (!messageContainer) return;
  const convo = conversations[name];
  messageContainer.innerHTML = '';
  if (!convo || convo.messages.length === 0) {
    messageContainer.innerHTML = `<p class="text-center text-[#02190888]">No messages yet.</p>`;
    return;
  }

  convo.messages.forEach(msg => {
    const wrapper = document.createElement('div');
    wrapper.className = `flex ${msg.sender === 'me' ? 'justify-end' : 'justify-start'}`;

    const bubble = document.createElement('div');
    bubble.className = `max-w-xs px-4 py-2 text-[#021908] rounded-2xl break-words
      ${msg.sender === 'me' ? 'bg-yellow-300 rounded-br-none' : 'bg-green-300 rounded-bl-none'}`;
    bubble.textContent = msg.text;

    const timeDiv = document.createElement('div');
    timeDiv.className = "text-[10px] text-right text-[#02190888] mt-1 select-none";
    timeDiv.textContent = msg.time;

    bubble.appendChild(timeDiv);
    wrapper.appendChild(bubble);
    messageContainer.appendChild(wrapper);
  });
  messageContainer.scrollTop = messageContainer.scrollHeight;
}

// Select contact
function selectContact(name) {
  currentContact = name;
  renderContacts();

  if (chatHeaderName) chatHeaderName.textContent = name;
  if (chatHeaderStatus) chatHeaderStatus.textContent = conversations[name].status;
  if (contactAvatar) {
    contactAvatar.src = conversations[name].avatar;
    contactAvatar.classList.remove('hidden');
  }

  renderMessages(name);

  if (messageInput) {
    messageInput.disabled = false;
    sendBtn.disabled = true;
    messageInput.value = '';
    messageInput.focus();
  }

  // Mobile: toggle chat view
  if (window.innerWidth < 768 && contactsAside && chatSection) {
    contactsAside.style.display = 'none';
    chatSection.style.display = 'flex';
  }
}

// Event listeners
if (messageInput) {
  messageInput.addEventListener('input', () => {
    sendBtn.disabled = messageInput.value.trim().length === 0;
  });
}

if (messageForm) {
  messageForm.addEventListener('submit', e => {
    e.preventDefault();
    if (!currentContact) return;

    const text = messageInput.value.trim();
    if (!text) return;

    const now = new Date();
    const time = now.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});

    conversations[currentContact].messages.push({ sender: 'me', text, time });

    renderMessages(currentContact);
    renderContacts();

    messageInput.value = '';
    sendBtn.disabled = true;
    messageInput.focus();
  });
}

// Back button for mobile
if (backBtn) {
  backBtn.addEventListener('click', () => {
    if (contactsAside) contactsAside.style.display = 'flex';
    if (chatSection) chatSection.style.display = 'none';
  });
}

// Attach buttons
if (attachFileBtn) attachFileBtn.addEventListener('click', () => fileInput.click());
if (attachImageBtn) attachImageBtn.addEventListener('click', () => imageInput.click());

[fileInput, imageInput].forEach(input => {
  input.addEventListener('change', e => {
    if (!currentContact) {
      alert("Select a chat first to send files/images.");
      input.value = '';
      return;
    }
    if(e.target.files.length){
      alert(`Selected ${input === fileInput ? 'file' : 'image'}: ${e.target.files[0].name}\n(Note: Sending not implemented)`);
      input.value = '';
    }
  });
});

// Initial render
renderContacts();

// Responsive: show contacts only on small screens
if (window.innerWidth < 768 && chatSection) chatSection.style.display = 'none';

// Adjust display on resize
window.addEventListener('resize', () => {
  if(window.innerWidth >= 768){
    if (contactsAside) contactsAside.style.display = 'flex';
    if (chatSection) chatSection.style.display = 'flex';
  } else {
    if (!currentContact) {
      if (chatSection) chatSection.style.display = 'none';
      if (contactsAside) contactsAside.style.display = 'flex';
    }
  }
});
