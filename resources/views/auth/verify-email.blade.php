<x-layout>
    <div class="card formCust" >
        <div class="row justify-content-center align-items-center text-center mb-5">
            <h1 class="col-12 mt-5">{{__('ui.emailDiConferma')}}</h1>
            <h2 class="col-12 mt-5">{{__('ui.verifica')}}</h2>
            <x-revisorSVG.svgemailverifi/>
            <h3>Clicca qui per reinviare la email di conferma!</h3>
            <form action="{{route('verification.send')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Reinvia Email di Conferma</button>
            </form>  
            @if (session('status') == 'verification-link-sent')
            <script>
                showNotification('Email inviata!!', "Email inviata con successo. Controlla la tua casella email!",'success','2');
        </script>
            @endif
    </div>
</div>
</x-layout>