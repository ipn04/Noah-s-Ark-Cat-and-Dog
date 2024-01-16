<x-app-layout>
    <x-slot name="title">Registerd User Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')
    @include('sidebars.user_sidebar')
    <section class="sm:ml-64 h-screen max-w-full dark:bg-gray-900 p-2 antialiased">
        <div class="lg:h-5/6 h-full p-10 ">
            <div id="jitsi-container" class="w-full h-full"></div>
                
            <script>
                var container = document.querySelector('#jitsi-container');
                var roomName = "{{ $result->room }}";
                var name = "{{ $result->firstname }} {{ $result->lastname }}";

                var api = null
                var domain = "jitsi.member.fsf.org";
                var userName = ""; // Replace with your actual way of getting the user's name
    
                var options = {
                    "roomName": roomName,
                    "parentNode": container,
                    userInfo: {
                        displayName: name,
                        isModerator: false,
                    },
                };
                api = new JitsiMeetExternalAPI(domain, options);
    
                document.getElementById('startJitsiButton').addEventListener('click', function () {
                    startJitsiMeet();
                });
            </script>

        </div>
    </section>
    
</x-app-layout>
