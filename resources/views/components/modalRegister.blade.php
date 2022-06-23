<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <form action="{{route('register')}}" method="post">
                        @csrf
                        <p>{{__('ui.nome')}}</p>
                        <x-bladewind.input name="name" type="text" required="true" label="{{__('ui.inserisciNome')}}!"  />
                        <p>{{__('ui.email')}}</p>
                        <x-bladewind.input name="email" type="email" required="true" label="{{__('ui.inserisciEmail')}}"  />
                        <p>{{__('ui.password')}}</p>
                        <x-bladewind.input name="password" type="password" required="true" label="{{__('ui.inserisciPassword')}}!"  />
                        <p>{{__('ui.confermaPassword')}}</p>
                        <x-bladewind.input name="password_confirmation" type="password" required="true" label="{{__('ui.confermaPassword')}}!"  />
                        <x-bladewind.button
                          size="regular"
                          color="yellow"
                          can_submit="true"
                          >{{__('ui.registratiNavbar')}}
                         </x-bladewind.button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>