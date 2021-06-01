 @push('css')
     <style>
         .centered {
             position: fixed;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%);
             transform: -webkit-translate(-50%, -50%);
             transform: -moz-translate(-50%, -50%);
             transform: -ms-translate(-50%, -50%);
             color: darkred;
             z-index: 100;
             visibility: hidden;
         }

     </style>
 @endpush
 <img class="centered" src="{{ asset('images/ajax-loader.gif') }}" alt="">
 <div class="form-group row">
     <label class="col-sm-2 col-form-label">Root Post</label>
     <div class="col-sm-10">
         <select class="form-control single-select" name="parent_id" id="parent_id">
             <option value="0" @if (isset($post->parent_id) && $post->parent_id == 0) selected="" @endif>Main Post</option>
                @if (!empty($categorypost))
                    @foreach ($categorypost->posts as $postappend)
                        <option value="{{ $postappend->id }}" @if (isset($post->parent_id) && $post->parent_id == $postappend->id)   selected="" @endif>
                            {{ $postappend->title }}
                        </option>
                    @endforeach
                @else
                @if (!empty($posts))
                     @foreach ($posts as $postAll)
                        <option value="{{ $postAll->id }}" @if (isset($post->parent_id) && $post->parent_id == $postAll->id)   selected="" @endif>
                            {{ $postAll->title }}
                        </option>
                    @endforeach
                @endif
                
                @endif
         </select>
     </div>
 </div>
 @push('js')
     
 @endpush
