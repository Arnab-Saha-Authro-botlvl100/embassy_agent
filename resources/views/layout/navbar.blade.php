<div class=" ">
  <nav class="w-full h-30 px-7 py-3 bg-[#225672] text-white flex items-center justify-between">
    <div>
        <a href="{{route('user/index')}}" class="border-r-2 border-black text-lg font-semibold p-3">File Solution</a>
        {{-- <a class="text-lg" href=""><i class="fa fa-list-alt text-xl pl-6 mr-2" aria-hidden="true"></i>Create Embassy List</a> --}}
        <a class="text-lg" href="{{route('user/embassy_list')}}" target="blank"> <i class="fa fa-list-alt text-xl pl-6 mr-2" aria-hidden="true"></i>Create Embassy List</a>
    </div>
   
    <div class="right flex items-center gap-2 space-x-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Agent
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="showpassenger">
            Add Passenger
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="company">
            Add Company
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="visapurchase">
            Visa Purchase
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="visasell">
            Visa Sell
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="umraall">
            Umra
        </button>

        

         <button  data-bs-toggle="modal" data-bs-target="#user">
            <span><i class="fa-regular fa-user font-semibold" ></i></span>
         </button>
         <button >
           <i class="bi bi-bell text-xl"></i>
         </button>
         <button >
             <a href="{{route('user/logout')}}"><i class="bi bi-box-arrow-left"></i></a>
             
         </button>
         
    </div>
</nav>
  <section id="topbar" class="d-flex align-items-center ">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>
</div>

  
