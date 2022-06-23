<x-layout>
        <h1 class="text-center my-5">Reset Password!</h1>
<div class="container my-5">
        <div class="row justify-content-center">
                <div class="col-12 col-md-6 formCust">
                        <form action="{{route('password.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{$request->route('token')}}">
                                <x-bladewind.input name="email" type="hidden" required="true" value="{{$request->email}}"  />
                                <p>Nuova Password</p>
                                <x-bladewind.input name="password" type="password" required="true" label="Inserisci la tua password!"  />
                                <p>Conferma Password</p>
                                <x-bladewind.input name="password_confirmation" type="password" required="true" label="Conferma Password!"  />
                                <button type="submit" class="btn btn-warning">Invia</button>
                        </form>
                </div>
        </div>
</div>

</x-layout>