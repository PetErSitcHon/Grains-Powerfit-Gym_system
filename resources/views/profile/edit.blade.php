<x-app-layout>

      
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
                  @include('profile.partials.update-profile-information-form')
              </div>
          </div>

          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
              <div class="card-body p-0">
                <p class="card-title text-center">YOUR SUBSCRIPTION</p>
                <table class="table">
                    <thead class="thead-dark f-6">
                      <tr>
                        <th scope="col">PLAN</th>
                        <th scope="col">START AT</th>
                        <th scope="col">EXPIRY</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1 YEAR</td>
                        <td>December 13, 2023</td>
                        <td>12/13/2024</td>
                      </tr> 
                    </tbody>
                  </table>
              <a href="#" class="btn btn-primary">SEE PROGRESS</a>
              </div>
            </div>
        </div>

     
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <div class="max-w-xl">
            <div class="card-body text-center p-0">
              <p class="card-title text-center">YOUR QR-CODE</p>
              <div class="code ">
                {!! QrCode::size(250)->generate(Auth::user()->name) !!}
              </div>
            </div>
            <br>
            <a href="#" class="btn btn-primary">DONWLOAD</a>
          </div>
      </div>

          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
                  @include('profile.partials.update-password-form')
              </div>
          </div>

          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <div class="max-w-xl">
                  @include('profile.partials.delete-user-form')
              </div>
          </div>
      </div>
  </div>
    </div>
  </div>



</x-app-layout>
