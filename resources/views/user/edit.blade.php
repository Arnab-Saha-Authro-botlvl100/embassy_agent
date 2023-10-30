<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.head')
</head>
<body>
  @php
  // dd($candidates);
  @endphp
    <main>
        <div class="container-fluid">
                {{-- <h1 class="text-danger fw-bold text-center my-5">Edi</h1> --}}
            <form class="row g-3" id="addcandidate"  method="post">
                @csrf

                <input type="hidden" id="candidate_id" name="candidate_id" value="{{ $id}}">
                <div class="px-10 gap-x-10 grid md:grid-cols-2">
                  <div class="py-1">
                  <div class="font-semibold text-lg" >Agent Name </div>
                  <input type="text" class="form-control uppercase" id="pname" name="pname" value="{{$candidates[0]->name}}" placeholder="Agent Name" required>
                </div>
                <div class="py-1">
                  <div class="font-semibold text-lg">Agent Phone</div>
                  <input type="text" class="form-control uppercase " id="pnumber" name="pnumber" minlength="0" maxlength="9" value="{{$candidates[0]->phone}}" required placeholder="Phone Number">
                </div>
                <div class="py-1">
                  <div class="font-semibold text-lg">Address</div>
                  <input type="text" class="form-control uppercase " id="address" placeholder="Address" name="address" value="{{$candidates[0]->address}}">
                </div>
                <div class="py-1">
                 
                    <div class="form-outline">
                        <input type="file" id="image_file" name="image_file">                            
                        <label class="form-label" for="formProductImageFile">ID Card</label>
                    </div>
                    <div class="form-control">
                      @if ($candidates[0]->id_card)
                          <img src="{{ asset('images/' . $candidates[0]->id_card) }}" alt="Agent Photo" width="100" height="100">
                      @else
                          <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                      @endif
                    </div>
                </div>
                <div class="py-1">
                  
                    <div class="form-outline">
                        <input type="file" id="id_card" name="id_card" >                            
                        <label class="form-label" for="formProductImageFile">Image</label>
                        <div class="form-control">
                          @if ($candidates[0]->photo)
                              <img src="{{ asset('images/' . $candidates[0]->photo) }}" alt="Agent Photo" width="100" height="100">
                          @else
                              <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                          @endif
                    </div>
                  
                </div>
              <div class="text-center">
                <button
                  type="submit"
                  class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold"
                >
                  Edit Agent
                </button>
              </div>
                
              
        
            </form>
        </div>
    </main>
    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        $('#addcandidate').submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            var candidateId = document.getElementById('candidate_id').value;
            var route = "{{ route('user/personal_edit', ['id' => ':id']) }}";
            route = route.replace(':id', candidateId);
            console.log(route);
            // console.log(route, formData);
            // Send the AJAX request
            $.ajax({
                url: route,
                type: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                        
                    });
                    if (response.redirect_url) {
                        setTimeout(function() {
                          var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                          window.location.href = redirectUrl;
                        }, 2000);
                    }
                                            
                },
                error: function(response) {
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                      
                    });
                    if (response.redirect_url) {
                        setTimeout(function() {
                          var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                          window.location.href = redirectUrl;
                        }, 2000);
                    }l
                }
            });
        });
      
    });
</script>

</body>
</html>