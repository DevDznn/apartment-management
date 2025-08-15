@extends('layouts.landlord') {{-- or layouts.landlord/layouts.tenant depending on your setup --}}

@section('title', 'Messages')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-[#021908] text-[#021908]">

    <!-- Contacts List -->
    <aside class="w-full md:w-80 bg-[#F9FAF8] flex flex-col h-1/2 md:h-full border-r border-[#BBCB2F]">
        <div class="p-4 font-semibold text-xl border-b border-[#BBCB2F] select-none flex items-center gap-3">
            Chats
        </div>
        <div id="contacts" class="flex-1 overflow-y-auto">
            <!-- Placeholder contact while JS loads -->
            <div class="flex items-center gap-3 p-3 border-b border-[#BBCB2F] rounded-md hover:bg-[#BBCB2F]/20 cursor-pointer">
                <div class="w-12 h-12 bg-gray-300 rounded-full animate-pulse"></div>
                <div class="flex flex-col flex-grow min-w-0">
                    <div class="h-4 bg-gray-300 rounded w-3/4 animate-pulse mb-1"></div>
                    <div class="h-3 bg-gray-200 rounded w-1/2 animate-pulse"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Chat Panel -->
    <section class="flex flex-col flex-1 bg-[#FFFFFF] h-1/2 md:h-full relative">

        <!-- Chat Header -->
        <header id="chatHeader" class="p-5 border-b border-[#BBCB2F] flex items-center gap-4 select-none pt-5">
            <img id="contactAvatar" src="" alt="Profile" class="w-12 h-12 rounded-full object-cover hidden md:block border border-[#BBCB2F]" />
            <div class="flex flex-col flex-grow">
                <div id="contactName" class="font-semibold text-lg leading-tight">Select a chat</div>
                <div id="contactStatus" class="text-sm text-[#02190888]">Offline</div>
            </div>
        </header>

        <!-- Messages -->
        <div id="messageContainer" class="flex-1 p-6 overflow-y-auto space-y-3 bg-[#F9FAF8]">
            <!-- Placeholder messages -->
            <div class="flex justify-start">
                <div class="bg-green-300 rounded-bl-none rounded-2xl px-4 py-2 max-w-xs animate-pulse h-10"></div>
            </div>
            <div class="flex justify-end">
                <div class="bg-yellow-300 rounded-br-none rounded-2xl px-4 py-2 max-w-xs animate-pulse h-10"></div>
            </div>
        </div>

        <!-- Message Input -->
        <form id="messageForm" class="p-4 border-t border-[#BBCB2F] flex items-center gap-3 bg-[#F9FAF8]">
            <input id="fileInput" type="file" accept="*" class="hidden"/>
            <input id="imageInput" type="file" accept="image/*" class="hidden"/>

            <button type="button" id="attachFileBtn" class="text-[#BBCB2F] hover:text-[#FEFA95] transition" aria-label="Attach file" title="Attach File">
                {{-- Paperclip SVG --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.586-6.586a4 4 0 10-5.656-5.656l-6.586 6.586a6 6 0 108.485 8.485L20.5 13"/>
                </svg>
            </button>

            <button type="button" id="attachImageBtn" class="text-[#BBCB2F] hover:text-[#FEFA95] transition" aria-label="Insert image" title="Attach Image">
                {{-- Image SVG --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <path d="M21 15l-5-5L5 21"/>
                </svg>
            </button>

            <input
                id="messageInput"
                type="text"
                placeholder="Type your message..."
                autocomplete="off"
                class="flex-grow p-2 rounded-lg border border-[#BBCB2F] focus:outline-none focus:ring-2 focus:ring-[#BBCB2F]"
                disabled
            />

            <button
                type="submit"
                class="bg-[#BBCB2F] hover:bg-[#BBCB2F]/90 p-2 rounded-lg text-[#021908] font-semibold disabled:opacity-50 disabled:cursor-not-allowed transition"
                disabled
            >
                Send
            </button>
        </form>

    </section>
</div>

{{-- Include the shared JS file --}}
<script src="{{ asset('js/chat.js') }}"></script>
@endsection
