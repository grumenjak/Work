           <!-- Ako postoji ikoja greška onda ispiši ovo ispod   -->
           @if ($errors->any())  
           <div class="form-group">
               <!-- greške od validacije iz UserController.php   -->
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>
                               {{ $error }}
                           </li>
                       @endforeach
                   </ul>
               </div>
           </div>
           @endif