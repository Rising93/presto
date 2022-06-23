<div class="d-md-flex justiy-content-center">
    <div class="col-12 col-md-6 me-3 formCust">
        <form action="{{route('contact.send')}}" method="post">
            @csrf
            <div class="mb-3">
                <p>{{__('ui.nome')}}</p>
                <label class="form-label"></label>
                <input name="name" type="text" class="form-control" placeholder="{{__('ui.nome')}}">
            </div>
            <div class="mb-3">
                <p>{{__('ui.cognome')}}</p>
                <label  class="form-label"></label>
                <input name="surname" type="text" class="form-control" placeholder="{{__('ui.cognome')}}">
            </div>
            <div class="mb-3">
                <p>{{__('ui.email')}}</p>
                <label  class="form-label"></label>
                <input name="email" type="email" class="form-control" placeholder="mail@esempio.com">
            </div>
            <div class="mb-3">
                <p>{{__('ui.testo')}}</p>
                <label  class="form-label"></label>
                <textarea name="body" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">{{__('ui.invia')}}</button>
        </form>
    </div>
    <div class="col-12 col-md-6 me-3 d-none-cust">
        <img class="img-fluid roundedcircle" src="img/contact.jpg" alt="">
    </div>
</div>

