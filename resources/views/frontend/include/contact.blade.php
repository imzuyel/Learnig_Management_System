   
 <div class="reg-area default-padding-top bg-gray">
     <div class="container">
         <div class="row">
             <div class="reg-items">
                 <div class="col-md-6 reg-form default-padding-bottom">
                     <div class="site-heading text-left">
                         <h2>Get a Free online Registration</h2>
                         <p>
                             written on charmed justice is amiable farther besides. Law insensible middletons unsatiable
                             for apartments boy delightful unreserved.
                         </p>
                     </div>
                     <form action="{{ route('contact.store') }}" method="POST" id="myContact">
                         @csrf
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <input class="form-control" id="first_name" name="first_name" placeholder="First Name*" type="text" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <input class="form-control" id="last_name" name="last_name" placeholder="Last Name*" type="text" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <input class="form-control" id="phone" name="phone" placeholder="Phone*" type="tel" required>
                                 </div>
                             </div>
                             
                             <div class="col-md-12">
                                 <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <button id="contactData" class="contactData" type="button">
                                     Contact
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="col-md-6 thumb" id="container1">
                     <div id="inner1">
                        <img src="{{ asset('/') }}frontend/assets/img/contact.png" alt="Thumb">
                     </div>
                   
                 </div>
             </div>
         </div>
     </div>
 </div>
