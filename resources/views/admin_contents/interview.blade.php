<x-app-layout>
    <x-slot name="title">Registerd User Page</x-slot>
    @include('admin_top_navbar.admin_top_navbar')
    @include('sidebars.admin_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div id="jitsi-container" class = "w-full h-full"></div>
            <script>
                    var container = document.querySelector('#jitsi-container');
                    var roomName = "{{ $scheduleInterview->room }}";
                    var api = null
                    var domain = "jitsi.member.fsf.org";
                    var userName = "Noahs Ark"; // Replace with your actual way of getting the user's name

                    var options = {
                        "roomName": roomName,
                        "parentNode": container,
                       
                        userInfo: {
                            displayName: userName,
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
