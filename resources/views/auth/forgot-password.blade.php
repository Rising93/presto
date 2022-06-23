<x-layout>
@if (session()->has('status'))
        <script>
                showNotification('Perfetto!!', "Abbiamo inviato in link per il reset password all\' indirizzo da te fornito. Controlla la tua casella mail",'warning','4');
        </script>
    @endif
<h1 class="text-center my-5">Scrivi la tua mail se hai dimenticato la password!</h1>
<div class="container my-5 ">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-6 formCust">
            <form action="{{route('password.request')}}" method="post">
                @csrf
                <div class="mb-3">
                    <p>Email</p>
                    <label  class="form-label"></label>
                    <input name="email" type="email" class="form-control" placeholder="mail@esempio.com">
                </div>
                <button type="submit" class="btn btn-warning">Invia</button>
            </form>
        </div>
    </div>
</div>
</x-layout>