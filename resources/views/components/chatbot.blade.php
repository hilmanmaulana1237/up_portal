{{-- Floating Chatbot Widget --}}
<div x-data="chatbot()" x-cloak class="fixed bottom-6 right-6 z-50">
    {{-- Chat Button --}}
    <button @click="toggleChat()" 
            class="group flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/40 transition-all hover:scale-110 hover:shadow-xl hover:shadow-indigo-500/50"
            :class="{ 'ring-4 ring-indigo-300': isOpen }">
        <svg x-show="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        <svg x-show="isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    {{-- Tooltip --}}
    <div x-show="!isOpen && showTooltip" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute bottom-16 right-0 mb-2 rounded-lg bg-gray-900 px-3 py-2 text-sm text-white shadow-lg">
        <div class="flex items-center gap-2">
            <span>💬</span>
            <span>Ada pertanyaan?</span>
        </div>
        <div class="absolute -bottom-1 right-5 h-2 w-2 rotate-45 bg-gray-900"></div>
    </div>

    {{-- Chat Window --}}
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="absolute bottom-20 right-0 w-80 sm:w-96 overflow-hidden rounded-2xl bg-white shadow-2xl dark:bg-neutral-800">
        
        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-3">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-white/20">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-white">Blog Mini Assistant</h3>
                    <p class="text-xs text-white/70">Powered by DeepSeek AI</p>
                </div>
            </div>
        </div>

        {{-- Messages --}}
        <div class="h-72 overflow-y-auto p-4 space-y-3" x-ref="messagesContainer">
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.role === 'user' ? 'flex justify-end' : 'flex justify-start'">
                    <div :class="msg.role === 'user' 
                        ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl rounded-br-md' 
                        : 'bg-gray-100 dark:bg-neutral-700 text-gray-800 dark:text-gray-200 rounded-2xl rounded-bl-md'"
                        class="max-w-[85%] px-4 py-2 text-sm">
                        <p x-text="msg.content" class="whitespace-pre-wrap"></p>
                    </div>
                </div>
            </template>
            
            {{-- Loading --}}
            <div x-show="isLoading" class="flex justify-start">
                <div class="bg-gray-100 dark:bg-neutral-700 rounded-2xl rounded-bl-md px-4 py-3">
                    <div class="flex items-center gap-1">
                        <span class="h-2 w-2 animate-bounce rounded-full bg-gray-400" style="animation-delay: 0ms"></span>
                        <span class="h-2 w-2 animate-bounce rounded-full bg-gray-400" style="animation-delay: 150ms"></span>
                        <span class="h-2 w-2 animate-bounce rounded-full bg-gray-400" style="animation-delay: 300ms"></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Input --}}
        <div class="border-t border-gray-200 dark:border-neutral-700 p-3">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                <input type="text" 
                       x-model="userInput"
                       @keydown.enter.prevent="sendMessage()"
                       placeholder="Tanyakan sesuatu..." 
                       class="flex-1 rounded-full border border-gray-200 bg-gray-50 px-4 py-2 text-sm text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white dark:placeholder-gray-400"
                       :disabled="isLoading">
                <button type="submit" 
                        :disabled="isLoading || !userInput.trim()"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white transition-all hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function chatbot() {
    return {
        isOpen: false,
        showTooltip: true,
        isLoading: false,
        userInput: '',
        messages: [
            { role: 'assistant', content: 'Halo! 👋 Saya asisten virtual Blog Mini. Ada yang bisa saya bantu tentang artikel atau penggunaan blog ini?' }
        ],
        
        init() {
            // Show tooltip after 3 seconds
            setTimeout(() => {
                this.showTooltip = true;
            }, 3000);
            
            // Hide tooltip after 8 seconds or on open
            setTimeout(() => {
                this.showTooltip = false;
            }, 8000);
        },
        
        toggleChat() {
            this.isOpen = !this.isOpen;
            this.showTooltip = false;
            if (this.isOpen) {
                this.$nextTick(() => {
                    this.scrollToBottom();
                });
            }
        },
        
        async sendMessage() {
            const message = this.userInput.trim();
            if (!message || this.isLoading) return;
            
            // Add user message
            this.messages.push({ role: 'user', content: message });
            this.userInput = '';
            this.isLoading = true;
            this.scrollToBottom();
            
            try {
                const response = await fetch('{{ route("chat") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ message: message })
                });
                
                const data = await response.json();
                this.messages.push({ role: 'assistant', content: data.reply || 'Maaf, terjadi kesalahan.' });
            } catch (error) {
                this.messages.push({ role: 'assistant', content: 'Maaf, saya tidak bisa menjawab saat ini. Silakan coba lagi.' });
            } finally {
                this.isLoading = false;
                this.scrollToBottom();
            }
        },
        
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$refs.messagesContainer;
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        }
    }
}
</script>
