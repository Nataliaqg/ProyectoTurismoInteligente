<div  >
    
    <div class="glider-contain">
          <ul class="glider">  
  
            @foreach ($lugarturisticos as $lugarturistico)
                
              <li class="bg-white rounded-lg shadow  {{ $loop->last ? '' : 'mr-4' }}">
                  <article>

                        <figure>
                          {{-- <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($hotel->images->first()->url) }}" alt=""> --}}
                          @if ($lugarturistico->images->first()== null)
                          <img class="h-48 w-56 object-cover object-center"
                          src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                          alt="">
                        @else
                        <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($lugarturistico->images->first()->url) }}" alt="">
                        @endif

                           
                        </figure>
  
                        <div class="py-4 px-6">
                          <h1 class="text-lg font-semibold">
                            {{Str::limit($lugarturistico->nombre,30)}}
                          </h1>
                        </div>
  
                    </article>  
                  
              </li>
  
            @endforeach
  
  
          </ul>
        
          <button aria-label="Previous" class="glider-prev">«</button>
          <button aria-label="Next" class="glider-next">»</button>
          <div role="tablist" class="dots"></div>
      </div>
</div>
