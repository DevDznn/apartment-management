<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minimalist Messenger</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-[#021908] text-[#021908] h-screen flex flex-col md:flex-row">

  <!-- Contacts List -->
  <aside class="w-full md:w-80 bg-[#F9FAF8] flex flex-col h-1/2 md:h-full border-r border-[#BBCB2F]">
    <div class="p-4 font-semibold text-xl border-b border-[#BBCB2F] select-none flex items-center gap-3">
      <!-- Back button -->
      <button
        id="apartmentBackBtn"
        class="flex items-center gap-1 text-[#BBCB2F] font-semibold px-2 py-1 rounded hover:bg-[#BBCB2F]/20 transition"
        aria-label="Back to Apartments"
        title="Back to Apartments"
        onclick="history.back()"
        type="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 18l-6-6 6-6" />
        </svg>
        Back
      </button>
      Chats
    </div>
    <div id="contacts" class="flex-1 overflow-y-auto">
      <!-- Contacts rendered here -->
    </div>
  </aside>


  <!-- Chat Panel -->
  <section class="flex flex-col flex-1 bg-[#FFFFFF] h-1/2 md:h-full relative">

    <!-- Back button (mobile only) -->
    <button id="backBtn" class="md:hidden absolute top-3 left-3 z-20 flex items-center gap-1 text-[#BBCB2F] font-semibold px-3 py-1 rounded hover:bg-[#BBCB2F]/20 transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 18l-6-6 6-6" />
      </svg>
      Back
    </button>

    <!-- Chat Header -->
    <header id="chatHeader" class="p-5 border-b border-[#BBCB2F] flex items-center gap-4 select-none
  pt-12 md:pt-5">
      <img id="contactAvatar" src="" alt="Profile" class="w-12 h-12 rounded-full object-cover hidden md:block border border-[#BBCB2F]" />
      <div class="flex flex-col flex-grow">
        <div id="contactName" class="font-semibold text-lg leading-tight">Select a chat</div>
        <div id="contactStatus" class="text-sm text-[#02190888]">Offline</div>
      </div>
    </header>


    <!-- Messages -->
    <div id="messageContainer" class="flex-1 p-6 overflow-y-auto space-y-3 bg-[#F9FAF8]">
      <p class="text-center text-[#02190888]">No conversation selected.</p>
    </div>

    <!-- Message Input -->
    <form id="messageForm" class="p-4 border-t border-[#BBCB2F] flex items-center gap-3 bg-[#F9FAF8]">
      <input
        id="fileInput"
        type="file"
        accept="*"
        class="hidden" />
      <input
        id="imageInput"
        type="file"
        accept="image/*"
        class="hidden" />

      <button type="button" id="attachFileBtn" class="text-[#BBCB2F] hover:text-[#FEFA95] transition" aria-label="Attach file" title="Attach File">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 10-5.656-5.656l-6.586 6.586a6 6 0 108.485 8.485L20.5 13" />
        </svg>
      </button>

      <button type="button" id="attachImageBtn" class="text-[#BBCB2F] hover:text-[#FEFA95] transition" aria-label="Insert image" title="Attach Image">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
          <circle cx="8.5" cy="8.5" r="1.5" />
          <path d="M21 15l-5-5L5 21" />
        </svg>
      </button>

      <input
        id="messageInput"
        type="text"
        placeholder="Type your message..."
        autocomplete="off"
        class="flex-grow p-2 rounded-lg border border-[#BBCB2F] focus:outline-none focus:ring-2 focus:ring-[#BBCB2F]"
        disabled />
      <button
        type="submit"
        class="bg-[#BBCB2F] hover:bg-[#BBCB2F]/90 p-2 rounded-lg text-[#021908] font-semibold disabled:opacity-50 disabled:cursor-not-allowed transition"
        disabled>
        Send
      </button>
    </form>
  </section>

  <script>
    const conversations = {
      Alice: {
        avatar: 'https://i.pravatar.cc/100?img=1',
        status: 'Online',
        messages: [{
            sender: 'them',
            text: 'Hi! Are you available tomorrow?',
            time: '10:15 AM'
          },
          {
            sender: 'me',
            text: 'Yes, I am. What time works for you?',
            time: '10:16 AM'
          },
        ],
      },
      Bob: {
        avatar: 'https://i.pravatar.cc/100?img=2',
        status: 'Offline',
        messages: [{
            sender: 'them',
            text: 'Let’s check the apartment listing.',
            time: 'Yesterday 3:45 PM'
          },
          {
            sender: 'me',
            text: 'Sure, I will send it shortly.',
            time: 'Yesterday 3:47 PM'
          },
        ],
      },
      Carol: {
        avatar: 'https://i.pravatar.cc/100?img=3',
        status: 'Online',
        messages: [{
          sender: 'them',
          text: 'Can you send the contract?',
          time: 'Today 9:00 AM'
        }, ],
      }
    };

    const contactsDiv = document.getElementById('contacts');
    const messageContainer = document.getElementById('messageContainer');
    const chatHeaderName = document.getElementById('contactName');
    const chatHeaderStatus = document.getElementById('contactStatus');
    const contactAvatar = document.getElementById('contactAvatar');
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.querySelector('form button[type="submit"]');
    const messageForm = document.getElementById('messageForm');
    const backBtn = document.getElementById('backBtn');
    const chatSection = document.querySelector('section');
    const contactsAside = document.querySelector('aside');

    // Attachment inputs and buttons
    const fileInput = document.getElementById('fileInput');
    const imageInput = document.getElementById('imageInput');
    const attachFileBtn = document.getElementById('attachFileBtn');
    const attachImageBtn = document.getElementById('attachImageBtn');

    let currentContact = null;

    // Render contacts
    function renderContacts() {
      contactsDiv.innerHTML = '';
      Object.entries(conversations).forEach(([name, convo]) => {
        const lastMsg = convo.messages[convo.messages.length - 1];
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

        // If message is an object with file/image, render accordingly (optional feature)
        // For now, text only
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

      chatHeaderName.textContent = name;
      chatHeaderStatus.textContent = conversations[name].status;
      contactAvatar.src = conversations[name].avatar;
      contactAvatar.classList.remove('hidden');

      renderMessages(name);

      messageInput.disabled = false;
      sendBtn.disabled = true;
      messageInput.value = '';
      messageInput.focus();

      // On mobile: switch to chat view
      if (window.innerWidth < 768) {
        contactsAside.style.display = 'none';
        chatSection.style.display = 'flex';
      }
    }

    // Send message handler
    messageInput.addEventListener('input', () => {
      sendBtn.disabled = messageInput.value.trim().length === 0;
    });

    messageForm.addEventListener('submit', e => {
      e.preventDefault();
      if (!currentContact) return;

      const text = messageInput.value.trim();
      if (!text) return;

      const now = new Date();
      const time = now.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
      });

      conversations[currentContact].messages.push({
        sender: 'me',
        text,
        time
      });

      renderMessages(currentContact);
      renderContacts();

      messageInput.value = '';
      sendBtn.disabled = true;
      messageInput.focus();
    });

    // Back button for mobile to show contacts again
    backBtn.addEventListener('click', () => {
      contactsAside.style.display = 'flex';
      chatSection.style.display = 'none';
    });

    // Attach file button opens file input
    attachFileBtn.addEventListener('click', () => {
      fileInput.click();
    });

    // Attach image button opens image input
    attachImageBtn.addEventListener('click', () => {
      imageInput.click();
    });

    // Example: handle file selected (just alert for now)
    fileInput.addEventListener('change', e => {
      if (!currentContact) {
        alert("Select a chat first to send files.");
        fileInput.value = '';
        return;
      }
      if (e.target.files.length) {
        alert(`Selected file: ${e.target.files[0].name}\n(Note: File sending not implemented)`);
        fileInput.value = '';
      }
    });

    imageInput.addEventListener('change', e => {
      if (!currentContact) {
        alert("Select a chat first to send images.");
        imageInput.value = '';
        return;
      }
      if (e.target.files.length) {
        alert(`Selected image: ${e.target.files[0].name}\n(Note: Image sending not implemented)`);
        imageInput.value = '';
      }
    });

    // Initial render
    renderContacts();

    // On page load on small screens show contacts only
    if (window.innerWidth < 768) {
      chatSection.style.display = 'none';
    }

    // Adjust display on resize
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 768) {
        contactsAside.style.display = 'flex';
        chatSection.style.display = 'flex';
      } else {
        if (!currentContact) {
          chatSection.style.display = 'none';
          contactsAside.style.display = 'flex';
        }
      }
    });
  </script>

</body>

</html>