<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <form action="{{route('login')}}" method="post">
                        @csrf
                        <x-bladewind.input name="email" type="email" required="true" label="Email"  />
                        <x-bladewind.input name="password" type="password" required="true" label="Password"  />
                        <x-bladewind.button
                          can_submit="true"
                          color="yellow">
                          Submit
                        </x-bladewind.button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>