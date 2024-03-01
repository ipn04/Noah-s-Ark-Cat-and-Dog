<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @if ($adoptionAnswerData)
        <p>DATE OF APPLICATION: {{ $adoptionAnswerData->created_at->format('F j, Y') }}</p>
    @else
        <p>No adoption answer data found.</p>
    @endif
    <p>In an effect to help the process go smoothly. please be as detailed as possible with your responses. Thank you!</p>
    <h2 class="my-4 text-center font-bold">PERSONAL INFORMATION</h2>
    <div class="grid grid-cols-3">
        <div class="p-2">Name: <span class="font-bold">{{ $adoptionAnswerData->adoption->application->user->firstname . ' ' . $adoptionAnswerData->adoption->application->user->name }}</span></div>
        <div class="p-2">Age: <span class="font-bold">{{ $age }}</span></div>
        <div class="p-2">FB/Twitter/IG: <span  class="font-bold">{{ $answers['first_question'] }}</span></div>
    </div>
    <div class="container">
        <div class="p-2">Address: <span class="font-bold">{{ $adoptionAnswerData->adoption->application->user->street . ' '. $adoptionAnswerData->adoption->application->user->barangay . ' ' .  $adoptionAnswerData->adoption->application->user->city . ' ' . $adoptionAnswerData->adoption->application->user->province . ' ' . $adoptionAnswerData->adoption->application->user->region}}</span></div>
        <div class="p-2">Phone: <span class="font-bold">{{ $adoptionAnswerData->adoption->application->user->phone_number }}</span></div>
        <div class="p-2">Email: <span class="font-bold">{{ $adoptionAnswerData->adoption->application->user->email }}</span></div>
        <div class="p-2">Email: <span class="font-bold">{{ $adoptionAnswerData->adoption->application->user->civil_status }}</span></div>
    </div>
    <p class="p-2">1. Who prompted you to adopt from us? <span class="font-bold">{{ $answers['second_question'] }}</span></p>
    <p class="p-2">2. Have you adopted from us before? <span class="font-bold">{{ $answers['third_question'] }}</span></p>
    <p class="p-2">3. For whom are you adopting a pet? <span class="font-bold">{{ $answers['fourth_question'] }}</span></p>
    <p class="p-2">4. Are there children below 18 in your house?? <span class="font-bold">{{ $answers['fifth_question'] }}</span></p>
    <p class="p-2">5. Do you have other pets? <span class="font-bold">{{ $answers['sixth_question'] }}</span></p>
    <p class="p-2">6. Have you had pets in the past? <span class="font-bold">{{ $answers['sevent_question'] }}</span></p>
    <p class="p-2">7. Who else do you live with? <span class="font-bold">{{ $answers['eight_question'] }}</span></p>
    <p class="p-2">8. Are any members of your house hold allergic to animals? <span class="font-bold">{{ $answers['ninth_question'] }}</span></p>
    <p class="p-2">9. Who will be responsible for feeding, grooming, and generally caring of your pet? <span class="font-bold">{{ $answers['tenth_question'] }}</span></p>
    <p class="p-2">10. Who will be financially responsible for your pets needs (i.e food,vet,bills,etc)? <span class="font-bold">{{ $answers['eleventh_question'] }}</span></p>
    <p class="p-2">11. Who will look after your pet if you go on vacation or in case of emergency? <span class="font-bold">{{ $answers['twelfth_question'] }}</span></p>
    <p class="p-2">12. How many hours in an average work day will your pet be left alone? <span class="font-bold">{{ $answers['thirteenth_question'] }}</span></p>
    <p class="p-2">13. Does everyone in the family support your decision to adopt a pet? <span class="font-bold">{{ $answers['fourteenth_question'] }}</span></p>
    <p class="p-2">14. What steps will you take to familiarize your new pet with his/her new surrounding? <span class="font-bold">{{ $answers['fifteenth_question'] }}</span></p>
    <p class="p-2">15. What type of building do you live in? <span class="font-bold">{{ $answers['seventeenth_question'] }}</span></p>
    <p class="p-2">16. Do you rent? <span class="font-bold">{{ $answers['eighteenth_question'] }}</span></p>
    <p class="p-2">17. What happens to your pet if or when you move? <span class="font-bold">{{ $answers['nineteenth_question'] }}</span></p>
    <p class="p-2">18. Do you have a fenced yard? <span class="font-bold">{{ $answers['twentieth_question'] }}</span></p>
    <p class="p-2">19. How much time will your dog spend in the yard? <span class="font-bold">{{ $answers['twentyfirst_question'] }}</span></p>
    <p class="p-2">20. Are you prepared to walk and potty train your dog? <span class="font-bold">{{ $answers['twentysecond_question'] }}</span></p>
    <p class="p-2">21. Are you prepared to manage chewing, marking, excessive barking, etc? <span class="font-bold">{{ $answers['twentythird_question'] }}</span></p>
</body>

</html>
