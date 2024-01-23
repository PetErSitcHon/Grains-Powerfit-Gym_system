<x-app-layout>
    


<video autoplay loop muted plays-inline class="video">
    <source src="{{ asset('/assets/video/gymworkout.mp4')}}">
</video>


{{-- <form id="timeForm">
  <div class="form-group">
      <label for="timeIn">Time In:</label>
      <input type="time" id="timeIn" name="timeIn">
  </div>
  
  <div class="form-group">
      <label for="timeOut">Time Out:</label>
      <input type="time" id="timeOut" name="timeOut">
  </div>
  
  <button type="submit">Submit</button>
</form>
</div> --}}

<div class="dashboard ">

<div class="row py-10 justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-55 typewriterd">
                    <h3 class="typed" > {{ __("Welcome Back!!!") }} </h3> 
                    </div>
                    <h4 class="py-6">  {{ Auth::user()->name }}</h4>
                </div>

                
                
            <div class="card bg-warning" style="width: 50rem;">
                <div class="card-body">
                  <p class="card-title">YOUR SUBSCRIPTION</p>
                    <table class="table">
                        <thead class="thead-dark f-6">
                          <tr>
                            <th scope="col">PLAN</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">START AT</th>
                            <th scope="col">EXPIRY</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($subscribe as $user)
                              
                          
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->stripe_status}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->ends_at}}</td>
                          </tr> 
                          @endforeach
                        </tbody>
                      </table>
                  <a href="{{route('attendance')}}" class="btn btn-primary">START WORKOUT</a>
                </div>
              </div>
              
              
       
    </div>

    <x-slot name="welcome">
      {{-- <h1 class="fs-1 fs-4">UNLEASH YOUR POTENTIAL, ONE REP AT A TIME</h1> --}}
    </x-slot>
    
    
   
</div>



</x-app-layout>
