<x-app-layout>
    @include('sidebars.user_sidebar')
    @if ($errors->any())
        <script>
            var errorMessages = [];
            @foreach ($errors->all() as $error)
                errorMessages.push("{{ $error }}");
            @endforeach
    
            // Check if there are error messages before showing the alert
            if (errorMessages.length > 0) {
                swal({
                    title: "Error!",
                    text: errorMessages.join('\n'), // Join error messages with line breaks
                    type: "error",
                    confirmButtonText: "Cool"
                });
            }
        </script>
    @endif

    @if(session('message_sent'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "You successfully sent a message to the shelter, check your inbox now!", 
                    "Press 'OK' to exit!", 
                    "success"
                )
            });
        </script>
    @endif
    <div class="sm:ml-64">
        <div class="relative overflow-x-auto p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    @foreach($mainMessages as $message)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 message-row" data-message-id="{{ $message->id }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $message->concern }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $message->message }}
                            </td>
                            <td class="px-6 py-4 flex justify-end">
                                {{ $message->created_at->format('M d, Y H:i') }}
                            </td>
                        </tr>
                        <!-- Reply input for each main message -->
                        {{-- <tr class="hidden reply-input-row" data-parent-id="{{ $message->id }}">
                            <td colspan="3">
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{ $message->id }}">
                                    <input type="text" name="reply_content" placeholder="Type your reply...">
                                    <button type="submit">Send</button>
                                </form>
                            </td>
                        </tr> --}}
                        <!-- component -->
                        <div class="hidden reply-input-row flex h-5/6 antialiased text-gray-800" data-parent-id="{{ $message->id }}">
                            <div class="flex flex-row h-full w-full overflow-x-hidden">
                            <div class="flex flex-col py-8 pl-2 pr-2 w-64 bg-white flex-shrink-0">
                                <div class="flex flex-row items-center justify-center h-12 w-full">
                                <div
                                    class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
                                >
                                    <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                    ></path>
                                    </svg>
                                </div>
                                <div class="ml-2 font-bold text-2xl">QuickChat</div>
                                </div>
                                <div
                                class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg"
                                >
                                <div class="h-20 w-20 rounded-full border overflow-hidden">
                                    <img
                                    src="https://avatars3.githubusercontent.com/u/2763884?s=128"
                                    alt="Avatar"
                                    class="h-full w-full"
                                    />
                                </div>
                                <div class="text-sm font-semibold mt-2">Noah's Ark</div>
                                <div class="text-xs text-gray-500">Noah' Ark Admin</div>
                                </div>
                            </div>
                            <div class="flex flex-col flex-auto justify-end max-h-96  p-4">
                                <div
                                class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
                                >
                                <div id="replies" class="flex flex-col h-full overflow-x-auto mb-4">
                                    <div class="flex flex-col h-full">
                                        <div class="flex">
                                            <div class="flex flex-col">
                                                <div>
                                                    @foreach($mainMessages as $mainMessage)
                                                        <div class="flex flex-col" data-reply="{{ $mainMessage->message }}">
                                                            <p>Main Message: {{ $mainMessage->message }}</p>
                                                            <p>Replies:</p>
                                                            <ul class="replies-list">
                                                                @foreach($mainMessage->replies as $reply)
                                                                    <li class="user_reply" id="user_reply">{{ $reply->message }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
                                >
                                    <div>
                                    <button
                                        class="flex items-center justify-center text-gray-400 hover:text-gray-600"
                                    >
                                        <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                        ></path>
                                        </svg>
                                    </button>
                                    </div>
                                    <div class="flex-grow ml-4">
                                        <div class="relative w-full flex">
                                            <form id="replyForm" method="POST" action="{{ route('messages.reply') }}"> 
                                                @csrf
                                                    <input class="hidden" type="text" name="concern" value=" {{$previousMessageConcern}} " id="concern">
                                                    <input class="hidden" name="parent_id" value="{{ $parentId }}">
                                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                                    <input
                                                    type="text" name="message" id="message"
                                                    class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10 mx-4" required
                                                    />
                                                    <button id="sendMessage"    
                                                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0" type="submit">
                                                    <span>Send</span>
                                                    <span class="ml-2">
                                                    <svg
                                                        class="w-4 h-4 transform rotate-45 -mt-px"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                                        ></path>
                                                    </svg>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>           
    </div>
</x-app-layout>
<script>

$(document).ready(function() {
    function updateMessages(messages) {
        var messagesHTML = '';

        messages.forEach(function(mainMessage) {
            messagesHTML += `
                <div class="flex flex-col" data-reply="${mainMessage.message}">
                    <p>Main Message: ${mainMessage.message}</p>
                    <p>Replies:</p>
                    <ul class="replies-list">`;

            mainMessage.replies.forEach(function(reply) {
                messagesHTML += `<li class="user_reply">${reply.message}</li>`;
            });

            messagesHTML += `</ul></div>`;
        });

        $('#replies').html(messagesHTML);
    }

    $('#replyForm').on('submit', function(event) {
        event.preventDefault();

        jQuery.ajax({
            url: "{{ route('messages.reply') }}",
            data: jQuery('#replyForm').serialize(),
            type: 'post',
            dataType: 'json',

            success: function(result) {
                var mainMessages = result.mainMessages;
                console.log(result);

                updateMessages(mainMessages);

                $('#replyForm')[0].reset();
            },
            error: function(error) {
                console.error('Error sending message:', error);
            }
        });
    });

    // Initial load of messages (if needed)
    // You might load initial messages when the page loads
    // by calling AJAX here or embedding the initial data in the HTML.
});











    document.addEventListener('DOMContentLoaded', function() {
        const messageRows = document.querySelectorAll('.message-row');
        messageRows.forEach(row => {
            row.addEventListener('click', function() {
                const parentId = this.dataset.messageId;
                const replyInputRow = document.querySelector(`.reply-input-row[data-parent-id="${parentId}"]`);
                replyInputRow.classList.toggle('hidden');
            });
        });
    });
</script>

