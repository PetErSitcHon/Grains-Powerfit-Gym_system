<x-app-layout>
<br>
    <div class="container">

      <div class="row py-10 justify-content-center align-items-center">
        <div class="card bg-warning" style="width: 50rem;">
          <div class="card-body">
            <p class="card-title">YOUR SUBSCRIPTION</p>
              <table class="table">
                  <thead class="thead-dark f-6">
                    <tr>
                      <th scope="col">NAME</th>
                      <th scope="col">TIME IN</th>
                      <th scope="col">TIME OUT</th>
                      <th scope="col">DURATION</th>
                    </tr>
                  </thead>
                  <tbody>
           
                    
                     <tr>
                      <td>{{ Auth::user()->name}}</td>
                      <td><span id="timeInDisplay">-</span></td>
                          
                      <td><span id="timeOutDisplay">-</span></td>
                      <td></td>
                    </tr>  
             
                  </tbody>
                </table>
            
                <div class="form-inline">
                  <form action="#" method="GET" class="col-6">
                    @csrf
                    <a type="submit" class="btn btn-primary" id="timeInBtn">Time In</a>
                </form>
                
                <!-- Trigger time out -->
                <form action="#" method="GET" class="col-6">
                    @csrf
                    <button type="submit" class="btn btn-primary" id="timeOutBtn">Time Out</button>
                </form>
             
                </div>
                
          </div>
        </div>
      </div>
        
          
  
    </div>
    
  

   <script>
    const timeInDisplay = document.getElementById('timeInDisplay');
const timeOutDisplay = document.getElementById('timeOutDisplay');
const timeInBtn = document.getElementById('timeInBtn');
const timeOutBtn = document.getElementById('timeOutBtn');

let timeIn = '-';
let timeOut = '-';

timeInBtn.addEventListener('click', () => {
  const currentTime = new Date().toLocaleTimeString();
  timeIn = currentTime;
  timeInDisplay.textContent = timeIn;
});

timeOutBtn.addEventListener('click', () => {
  const currentTime = new Date().toLocaleTimeString();
  timeOut = currentTime;
  timeOutDisplay.textContent = timeOut;
}); 
  </script>

</x-app-layout>