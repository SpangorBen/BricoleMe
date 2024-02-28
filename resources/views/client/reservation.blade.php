@extends('layouts.client-layout')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">

        @include('components.nav-client')
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd" d="M14.348 5.652a.5.5 0 0 1 .708.708L10.707 10l4.35 4.35a.5.5 0 1 1-.708.708L10 10.707l-4.35 4.35a.5.5 0 1 1-.708-.708L9.293 10 4.643 5.65a.5.5 0 1 1 .708-.708L10 9.293l4.35-4.35z"/>
                </svg>
            </span>
        </div>
    @endif
        <div class="flex flex-wrap">

            @foreach ($reservations as $reserv)
            
                <div class="md:w-1/2 lg:w-1/3 py-4 px-4">
                    <div>
                        <div>
                            <div class="bg-white relative shadow p-2 rounded-lg text-gray-800 hover:shadow-lg">
                                <a href=" {{route('client.reclamation-forme', ['id' => $reserv->id]) }}"
                               
                                    class="right-0 mt-4 rounded-l-full absolute text-center font-bold text-xs text-red-600 px-2 py-1 bg-orange-200">
                                    <i class="fa-solid fa-circle-xmark fa-xl" style="color: #ff0000;">
                                    </i>
                                    <p>reclamer</p>

                                </a>
                                <img src="
                                https://www.samsic-emploi.fr/sites/samsic-emploi/files/styles/image_contenu/public/paragraph/image/2021-03/image%20m%C3%A9tier%20plombier%20-%20samsic%20emploi.jpg?itok=skyMmgY_"
                                    class="h-32 rounded-lg w-full object-cover">
                                <div class="flex justify-center">
                                    <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                        class="rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-16 w-16">
                                </div>
                                <div class="py-2 px-2">
                                    <div class=" font-bold font-title text-center">
                                        {{ $reserv->service->artisan->user->name }}
                                    </div>





                                    <p class="text-md pt-2"><strong>Service:</strong> {{ $reserv->service->name }}
                                        | {{ $reserv->service->tarif }} DH/heur</p>
                                    <p class="text-md pt-2"><strong>date départ:</strong>{{ $reserv->dateDepart }}</p>
                                    <p class="text-md pt-2"><strong>date final:</strong>{{ $reserv->dateFinal }}</p>
                                    <p class="text-md pt-2"><strong>Status:</strong> {{ $reserv->status }}</p>
                                </div>


                                @if ($reserv->status == 'pending')
                                    <a href="{{route('client.destroy', ['id' => $reserv->id]) }}"><button id="reserveBtn"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 w-full">
                                            Cancel
                                        </button>
                                    </a>
                                @elseif($reserv->status == 'done')
                                    <a href="{{route('client.review', ['id' => $reserv->id]) }}"> <button id="reserveBtn"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4 w-full">
                                            Review
                                        </button>
                                    </a>
                                @else
                                    <button id="reserveBtn"
                                        class="bg-gray-200  text-black font-bold py-2 px-4 rounded mt-4 w-full">
                                        doing
                                    </button>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
                
            @endforeach



        </div>

    </main>
@endsection