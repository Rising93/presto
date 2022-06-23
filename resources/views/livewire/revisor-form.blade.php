<div>
<form wire:submit.prevent="becomeRevisor">
        @csrf
        <div>
        @if (session()->has('message'))
            <script>
                    showNotification('Perfetto!', "{!!session('message')!!}",'success','3');
            </script>
            @endif
            @if (session()->has('allert'))
            <script>
                    showNotification('Attenzione!', "{!!session('allert')!!}",'warning','3');
            </script>
            @endif
            @if (session()->has('status'))
            <script>
                    showNotification('Attenzione!', "{!!session('status')!!}",'error','3');
            </script>
            @endif
        </div>
        
        <x-bladewind.button
        color="yellow"
        can-submit="true">
            Candidati
        </x-bladewind.button>

    </form>
</div>
