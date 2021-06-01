 <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard"
     style="background-image: url({{ asset('/') }}frontend/assets/img/bg4.jpg);">
     <div class="container">
         <div class="row">
             @foreach ($achiements as $achiement)
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="{{ $achiement->icon }}"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="{{ $achiement->amount }}" data-speed="5000"></span>
                            <span class="medium">{{ $achiement->name }}</span>
                        </div>
                    </div>
                </div>
               @endforeach
         </div>
     </div>
 </div>
