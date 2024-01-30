<x-app-layout>
    @include('admin_top_navbar.admin_top_navbar')

    @include('sidebars.admin_sidebar')

    <div class="sm:ml-64">
        <div class="w-full px-5 flex flex-col justify-between">
            <div class="flex flex-col mt-5 scroll-smooth overflow-auto h-customHeight">
                <div class="flex justify-start mb-4">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('storage/' . $initialMessage->user->profile_image) }}" alt='user profile'
                            class="object-cover h-8 w-8 rounded-full" />
                    </div>
                    <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                        {{ $initialMessage->content }}
                    </div>
                </div>
                <div id="messageWrapper" class="max-h-customHeight overflow-y-auto">
                
                    {{-- <div id="messages">
                        
                    </div> --}}
                    @foreach ($threads as $thread)
                        <div class="flex justify-{{ $thread->sender_id == auth()->id() ? 'end' : 'start' }} mb-4" data-content="{{ $thread->content }}">
                            <div class="flex items-center">
                                @if ($thread->sender_id == auth()->id())
                                    {{-- admin reply --}}
                                    <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white admin_reply">
                                        {{ $thread->content ?? null }}
                                    </div>
                                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                                        class="object-cover h-8 w-8 rounded-full" />
                                @else
                                    {{-- user reply --}}
                                    <img src="{{ asset('storage/' . $thread->user->profile_image) }}" alt='user profile'
                                        class="object-cover h-8 w-8 rounded-full" />
                                    <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tl-3xl rounded-tr-xl text-white user_reply">
                                        {{ $thread->content ?? null }}
                                    </div>
                                @endif
                            </div>
                        </div>                    
                    @endforeach
                        
                    <div class="grid justify-items-end messages">
                        {{$content}}
                    </div> 

                </div>
            </div>
            <form id="sendMessageForm">
                @csrf
                <div class="flex flex-row items-center h-16 rounded-xl w-full">
                    <div>
                        <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input type="text" id="content" name="content" required
                                class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                            <button
                                class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button
                            class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                            <span>Send</span>
                            <span class="ml-2">
                                <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
@if (auth()->check())
<script>
    // const sendMessageUrl = '{{ route('send.replies', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->sender_id]) }}';
    // const userId = {{ auth()->user()->id }};
    // $(document).ready(function() {
    //     $('#sendMessageForm').submit(function(event) {
    //         event.preventDefault();

    //         var formData = $(this).serialize();
    //         console.log(formData);

    //         $.ajax({
    //             type: 'POST',
    //             url: '{{ route('send.replies', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->sender_id]) }}',
    //             data: formData,
    //             success: function(result) {
    //                 console.log(result);
    //                 if (result && result.length > 0) {
    //                     var newMessageContent = result[0].content;
    //                     console.log(newMessageContent);
    //                     var isCurrentUser = result[0].sender_id == {{ auth()->id() }};
    //                     console.log(isCurrentUser);
    //                     var messageContainerClass = isCurrentUser ? 'admin_reply' :
    //                         'user_reply';
    //                     var messageJustifyClass = isCurrentUser ? 'end' : 'start';

    //                     var newMessageContainer = $(
    //                         '<div class="flex justify-' + messageJustifyClass +
    //                         ' mb-4 ' + messageContainerClass + '">' +
    //                         '<div class="' + messageContainerClass +
    //                         ' mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">' +
    //                         newMessageContent +
    //                         '</div>' +
    //                         '<div class="flex justify-center items-center">' +
    //                         '<img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="user profile" ' +
    //                         'class="object-cover h-8 w-8 rounded-full" />' +
    //                         '</div>' +
    //                         '</div>'
    //                     );

    //                     $('#messageWrapper').append(newMessageContainer);
    //                     console.log($('#messageWrapper')[0].scrollHeight);

    //                     // Scroll to the last message
    //                     $('#messageWrapper').scrollTop($('#messageWrapper')[0]
    //                     .scrollHeight);

    //                     $('#content').val('');
    //                 } else {
    //                     console.warn('Empty or invalid response from the server');
    //                 }
    //             }
    //         });
    //     });
    // });
 
    // console.log("trigger");
    // const messages_container = document.getElementById("messages");
    // const content_input = document.getElementById("content");
    // const send_form = document.getElementById("sendMessageForm");
                
    // // window.Echo.private('chat')
    // //     .listen('.content', (event) => {
    // //         console.log('Event Received:', event);
    // //         console.log('Content:', event.content);
    // //         messages_container.innerHTML += '<div class="messages"><strong>' + event.content + '</strong></div>';
    // // });

    // window.Echo.private('chat')
    // .listen('.content', (event) => {
    //     console.log('Event Received:', event);
    //     console.log('Content:', event.content);
    //     // Update your UI here with the received content
    //     messages_container.innerHTML += '<div class="messages"><strong>' + event.content + '</strong></div>';
    // });

    // send_form.addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     const formData = new FormData(send_form);

    //     axios.post('{{ route('send.replies', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->sender_id]) }}', formData)
    //     .then(response => {
    //         console.log(response);
    //         const success = response.data.success; 
    //         console.log('Success:', success);

    //         if (success) {
            
    //         console.log('Message successfully stored.');

    //         content_input.value = '';
    //         } else {
    //         console.error('Error storing the message.');
    //         }
    //     })
    //     .catch(error => {
    //         console.error(error);
    //         if (error.response && error.response.data && error.response.data.error) {
    //             console.error('Server Error: ' + error.response.data.error);
    //         } else {
    //             console.error('An error occurred.');
    //         }
    //     });
    //     // const options = {
    //     //     method: 'post',
    //     //     url: '('{{ route('send.reply', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->sender_id]) }}', formData)',
    //     //     data: {
    //     //         content: content_input.value
    //     //     },
    //     // }

    //     // axios(options);

    // });
    // const channel = Echo.private('chat');
    const userId = {{ auth()->user()->id }};
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'ap1'});
    const channel = pusher.subscribe('public');
    
    var userProfileImage = "{{ asset('storage/' . auth()->user()->profile_image) }}";
    
    // channel.bind('chat', function (data) {
    //     $.post("/receive", {
    //     _token:  '{{csrf_token()}}',
    //     message: data.message,
    //     })
    //     .done(function (res) {
    //     // $(".messages > .message").last().after(res);
    //     $(document).scrollTop($(document).height());
    //     });
    // });
    channel.bind('client-content', function (data) {
        
        $(".messages").append("<div class='flex items-center mb-4'><div class='mr-2 py-3 px-4  bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white text-right'>" + data.message + "</div>" + "<img src='" + userProfileImage + "' alt='user profile' class='object-cover h-8 w-8 rounded-full' />" + "</div>");

        // Scroll to the bottom of the page
        $(document).scrollTop($(document).height());
    });
    //Broadcast messages
    $("form").submit(function (event) {
        event.preventDefault();

        var messageContent = $("#content").val();

        if (messageContent.trim() !== "") {
            console.log("Message Content Before AJAX Request:", messageContent);

            $.ajax({
                url: '{{ route('send.replies', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->sender_id]) }}',
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    _token: '{{ csrf_token() }}',
                    content: messageContent,
                },
                beforeSend: function () {
                    console.log("Sending AJAX Request...");
                },
                success: function (res) {
                    console.log("AJAX Request Successful. Response:", res);

                    if (res && res.length > 0) {
                        var messageContent = res[0].content;

                        // Trigger Pusher event for the new message
                        channel.trigger('client-content', {
                            message: messageContent,
                        });

                        // Assuming you have only one .messages container
                        $(".messages").append("<div class='flex items-center mb-4'><div class='mr-2 py-3 px-4  bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white text-right'>" + messageContent + "</div>" + "<img src='" + userProfileImage + "' alt='user profile' class='object-cover h-8 w-8 rounded-full' />" + "</div>");

                        // Clear the input field
                        $("form #content").val('');

                        // Scroll to the bottom of the page
                        $(document).scrollTop($(document).height());
                    } else {
                        console.log("Empty or invalid response. Unable to update the message.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Request Failed. Status:", status, "Error:", error);
                },
                complete: function () {
                    // Log a message after the request is complete (whether it succeeded or failed)
                    console.log("AJAX Request Complete.");
                }
            });
        } else {
            console.log("Message is null or empty. Not making the AJAX request.");
            // You can handle this case as needed, such as showing an error message.
        }
    });

</script> 
@endif