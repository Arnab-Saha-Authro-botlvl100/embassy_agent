
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  {{-- <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

  <!-- JavaScript -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
      #candidatetable_filter{
        margin-bottom: 20px;
      }
      .tooltip {
      position: relative;
      display: inline-block;
    /* If you want dots under the hoverable text */
      }
    
    /* Tooltip text */
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 200px;
      background-color: #92560c;
      color: #fff;
      border:1px solid white;
      text-align: center;
      padding: 3px 3px;
      font-size:14px;
      border-radius: 6px;
    
      /* Position the tooltip text - see examples below! */
      position: absolute;
      z-index: 1;
      right:10px;
      top:40px;
    }
    
    /* Show the tooltip text when you mouse over the tooltip container */
    .tooltip:hover .tooltiptext {
      visibility: visible;
    }
  </style> 
  <script>
    tailwind.config = {
      important:true,
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
          backgroundImage:{
              'hero-pattern': "url('/asset/image/hero1.jpg')",
          }
        },
      },
    };
  </script>
  @include('layout.head')
</head>

<body>
  <div class="container-fluid">
   @include('layout.navbar')
  </div>
  <!-- ======= Top Bar ======= -->
  

  <!-- ======= Header ======= -->
 
  <!-- ======= Hero Section ======= -->
  <section id="" class=" align-items-center">
   
    </div>
    @if(session('success'))
      <script>
          alert("{{ session('success') }}");
          {!! session()->forget('success') !!}
      </script>
    @endif


    {{-- <div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
           
          </div>
        </div>
      </div>
    </div> --}}

    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Agent</h5>
            <button type="button" class="btn-close btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

         
          <div class="modal-body">
              <form class="row g-3" id="addcandidate" action="{{route('user/index')}}" method="post" enctype="multipart/form-data">
                  @csrf
                      
                    <div class="px-10 gap-x-10 grid md:grid-cols-2">
                      <div class="py-1">
                      <div class="font-semibold text-lg" >Agent Name </div>
                      <input type="text" class="form-control uppercase" id="pname" name="pname" placeholder="Agent Name" required>
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Agent Phone</div>
                      <input type="text" class="form-control uppercase " id="pnumber" name="pnumber" minlength="0" maxlength="9" required placeholder="Phone Number">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Address</div>
                      <input type="text" class="form-control uppercase " id="address" placeholder="Address" name="address">
                    </div>
                    <div class="py-1">
                     
                        <div class="form-outline">
                            <input type="file" id="image_file" name="image_file">                            
                            <label class="form-label" for="formProductImageFile">Image File</label>
                        </div>
                     
                    </div>
                    <div class="py-1">
                      
                        <div class="form-outline">
                            <input type="file" id="id_card" name="id_card" >                            
                            <label class="form-label" for="formProductImageFile">ID Card</label>
                        </div>
                      
                    </div>
                  <div class="text-center">
                    <button
                      type="submit"
                      class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold"
                    >
                      Add Agent
                    </button>
                  </div>
            </form>
          </div>  
          <div class="modal-footer">
            <button type="button" class=" bg-[#074f56] p-3 rounded text-white font-semibold" data-bs-dismiss="modal">Close</button>
        
          </div>
        </div>
      </div>
    </div>
    
    

  </section><!-- End Hero -->

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

  <div class="container ">
    <div class="table-responsive">
      <table class="table table-bordered border-primary" id="candidatetable">
        <thead>
          <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">ID Card</th>
            <th scope="col">Photo</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
         
          @foreach ($agent as $index=>$item)
          <tr>
              <td>{{ $index++ }}</td>
              <td>{{ $item->name ?? 'N/A' }}</td>
              <td>{{ $item->phone ?? 'N/A' }}</td>
              <td>{{ $item->address ?? 'N/A' }}</td>
              <td>
                @if ($item->id_card)
                    <img src="{{ asset('images/' . $item->id_card) }}" alt="Agent ID Card" width="100" height="100">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                @endif
              </td>
              <td>
                  @if ($item->photo)
                      <img src="{{ asset('images/' . $item->photo) }}" alt="Agent Photo" width="100" height="100">
                  @else
                      <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                  @endif
              </td>
              <td>
                <a href="{{ route('view', $item->id) }}"><i class="fas fa-eye"></i></a>
                <a href="{{ route('edit', $item->id) }}"><i class="fas fa-edit"></i></a>
                <a href="{{ route('delete', $item->id) }}"><i class="fas fa-trash"></i></a>
              </td>
          </tr>
          @endforeach
          
        </tbody>
       
      </table>

    </div>
    
  </div>

  <div class="modal-body container m-5" id="passenger">
    <h4 class="text-center h4 mb-3">Add Passenger</h4>
    <!-- Form for adding a passenger -->
    <form class="row g-3" id="addpassenger" action="{{ route('user/passenger') }}" method="post" enctype="multipart/form-data">
      @csrf

        <div class="col-md-6">
            <label for="passenger_name" class="form-label">Passenger Name</label>
            <input type="text" class="form-control" id="passenger_name" name="passenger_name" placeholder="Passenger Name" required>
        </div>

        <div class="col-md-6">
            <label for="pnumber" class="form-label">Passenger Phone</label>
            <input type="text" class="form-control" id="pnumber" name="pnumber" minlength="0" maxlength="9" required placeholder="Phone Number">
        </div>

        <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">District</label>
            <input type="text" class="form-control" id="district" placeholder="District" name="district">
        </div>

        <div class="col-md-6">
          <label for="agent" class="form-label">Agent</label>
          <select class="form-select" id="agent" name="agent">
              <option value="">Select an Agent</option> <!-- Default option -->
              @foreach($agent as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
          </select>
        </div>
      

        <div class="col-md-6">
            <label for="passport" class="form-label">Passport</label>
            <input type="text" class="form-control" id="passport" placeholder="Passport" name="passport">
        </div>

        <div class="col-md-6">
            <label for="image_file" class="form-label">Image File</label>
            <input type="file" class="form-control" id="image_file" name="image_file">
        </div>

        <div class="col-md-6">
            <label for="passport_pic" class="form-label">Passport Copy</label>
            <input type="file" class="form-control" id="passport_pic" name="passport_pic">
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Add Passenger
          </button>
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="closepassenger">
              Close
          </button>
        </div>
        
    </form>

    <div class="container mt-4">
      <div class="table-responsive">
        <h4 class="text-center">All Passenger</h4>
        <table class="table table-bordered border-primary" id="passengertable">
          <thead>
            <tr>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Agent</th>
              <th scope="col">Passport Number</th>
              <th scope="col">Passport </th>
              <th scope="col">Photo</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
  
          <tbody>
           
            @foreach ($passengers as $index=>$passenger)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $passenger->passenger_name ?? 'N/A' }}</td>
                <td>{{ $passenger->pnumber ?? 'N/A' }}</td>
                <td>{{ $passenger->address ?? 'N/A' }}</td>
                <td>{{ $passenger->agent ?? 'N/A' }}</td>
                <td>{{ $passenger->passport ?? 'N/A' }}</td>

                <td>
                  @if ($passenger->passport_pic)
                      <img src="{{ asset('images/' . $passenger->passport_pic) }}" alt="Agent Photo" width="100" height="100">
                  @else
                      <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                  @endif
              </td>

                <td>
                  @if ($passenger->image_file)
                      <img src="{{ asset('images/' . $passenger->image_file) }}" alt="Agent ID Card" width="100" height="100">
                  @else
                      <img src="{{ asset('images/default.jpg') }}" alt="No Photo" width="100" height="100">
                  @endif
                </td>
               
                <td>
                  <a href="{{ route('view', $passenger->id) }}"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('edit', $passenger->id) }}"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('delete', $passenger->id) }}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            
          </tbody>
         
        </table>
  
      </div>
      
    </div>
  </div>

  <div class="modal-body container m-5" id="visapurchasesection" >
    <h4 class="text-center h4 mb-3">Add Visa</h4>
    <!-- Form for adding a passenger -->
    <form class="row g-3" id="addvisa"  method="post" action="{{ route('user/visa') }}" enctype="multipart/form-data">
      @csrf

        <div class="col-md-6">
            <label for="buy_form" class="form-label">Buy Form</label>
            <input type="text" class="form-control" id="buy_form" name="buy_form" placeholder="Purchase Form" required>
        </div>

        <div class="col-md-6">
            <label for="pnumber" class="form-label">Company Name</label>
            <select class="form-select" id="company" name="company" required>
              <option value="">Select Company</option> <!-- Default option -->
              @foreach($companys as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="address" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" placeholder="Country" name="country" required>
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">Worker Salary</label>
            <input type="text" class="form-control" id="salary" placeholder="Worker Salary" name="salary">
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">Profession Name</label>
            <input type="text" class="form-control" id="prof_name" placeholder="Profession Name" name="prof_name">
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">Purchase Amount</label>
            <input type="text" class="form-control" id="total_tk" placeholder="Purchase Amount" name="total_tk" required>
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" placeholder="Purchase Amount" name="quantity" required>
        </div>

        <div class="col-md-6">
            <label for="district" class="form-label">Invoice Number</label>
            <input type="text" class="form-control" id="invoice" placeholder="Invoice Number" name="invoice" readonly>
        </div>


        <div class="col-12 text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Add To Visa
          </button>
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="closevisa">
              Close
          </button>
        </div>
        
    </form>

    <div class="container mt-4">
      <div class="table-responsive">
        <h4 class="text-center">All Visas</h4>
        <table class="table table-bordered border-primary" id="passengertable">
          <thead>
            <tr>
              <th scope="col">Serial Number</th>
              <th scope="col">Buy Form</th>
              <th scope="col">Company</th>
              <th scope="col">Country</th>
              <th scope="col">Purchase Tk</th>
              <th scope="col">Quantity</th>
              <th scope="col">Per Visa</th>
              <th scope="col">Invoice</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
  
          <tbody>
           
            @foreach ($visas as $index=>$visa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $visa->buy_form ?? 'N/A' }}</td>
                <td>{{ $visa->company ?? 'N/A' }}</td>
                <td>{{ $visa->country ?? 'N/A' }}</td>
                <td>{{ $visa->purchase_tk ?? 'N/A' }}</td>
                <td>{{ $visa->quantity ?? 'N/A' }}</td>
                <td>{{ $visa->per_visa ?? 'N/A' }}</td>
                <td>{{ $visa->invoice ?? 'N/A' }}</td>

                <td>
                  <a href="{{ route('view', $visa->id) }}"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('edit', $visa->id) }}"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('delete', $visa->id) }}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            
          </tbody>
         
        </table>
  
      </div>
      
    </div>
  </div>

  <div class="modal-body container m-5" id="companysection">
    <h4 class="text-center h4 mb-3">Add Company</h4>
    <!-- Form for adding a passenger -->
    <form class="row g-3" id="addcompany" action="{{ route('user/company') }}" method="post" enctype="multipart/form-data">
      @csrf

        <div class="col-md-6">
            <label for="buy_form" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
        </div>

        <div class="col-md-6">
            <label for="pnumber" class="form-label">Type</label>
            <select class="form-select" id="travelType" name="company_type">
              <option value="umra">Umra</option>
              <option value="hajj">Hajj</option>
              <option value="ticket">Ticket</option>
              <option value="visa_process">Visa Process</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="pnumber" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required placeholder="Company Description">
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Add Company
          </button>
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="closecompany">
              Close
          </button>
        </div>
        
    </form>

    <div class="container mt-4">
      <div class="table-responsive">
        <h4 class="text-center">All Company</h4>
        <table class="table table-bordered border-primary" id="passengertable">
          <thead>
            <tr>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Total Purchase</th>
              <th scope="col">Total Sell</th>
              <th scope="col">Profit</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
  
          <tbody>
           
            @foreach ($companys as $index=>$company)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $company->name ?? 'N/A' }}</td>
                <td>{{ $company->description ?? 'N/A' }}</td>
                <td>{{ $company->total_purchase ?? '-' }}</td>
                <td>{{ $company->total_sell ?? '-' }}</td>
                <td>{{ $company->profit ?? '-' }}</td>

                <td>
                  <a href="{{ route('view', $passenger->id) }}"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('edit', $passenger->id) }}"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('delete', $passenger->id) }}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            
          </tbody>
         
        </table>
  
      </div>
      
    </div>
  </div>

  <div class="modal-body container m-5" id="visasell">
    <h4 class="text-center h4 mb-3">Visa Sell</h4>
    <!-- Form for adding a passenger -->
    <form class="row g-3" id="addcompany" action="{{ route('user/visa_sell') }}" method="post" enctype="multipart/form-data">
      @csrf

        <div class="col-md-6">
          <label for="pnumber" class="form-label">Company Name</label>
            <select class="form-select" id="companyloadinvoice" name="company" required>
              <option value="">Select Company</option> <!-- Default option -->
              @foreach($companys as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-6">
          <label for="pnumber" class="form-label">Invoice Number</label>
          <select class="form-select" id="invoiceoption" name="invoiceoption" required>
              <option value="">Select an option</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="pnumber" class="form-label">Avaiable Visa</label>
          <input type="number" class="form-control" id="available_visa" name="available_visa" readonly>
        </div>

        <div class="col-md-6">
          <label for="pnumber" class="form-label">Price</label>
          <input type="number" class="form-control" id="price_per_visa" name="price_per_visa" readonly>
        </div>
      

        <div class="col-md-6">
          <label for="agent" class="form-label">Agent</label>
          <select class="form-select" id="agentoption" name="agent">
              <option value="">Select an Agent</option> <!-- Default option -->
              @foreach($agent as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="agent" class="form-label">Passanger</label>
          <select class="form-select" id="sellpassenger" name="sellpassenger">
              <option value="">Select a passanger</option> <!-- Default option -->
          </select>
        </div>
        <div class="col-md-4">
          <label for="agent" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="sellquatity" name="sellquatity">
        </div>
        <div class="col-md-4">
          <label for="agent" class="form-label">Price Per Visa</label>
          <input type="number" class="form-control" id="price_per" name="price">
        </div>
        <div class="col-md-4">
          <label for="agent" class="form-label">Total</label>
          <input type="number" class="form-control" id="total" name="total" readonly>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Sell Visa
          </button>
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="closecompany">
              Close
          </button>
        </div>
        
    </form>

    <div class="container mt-4">
      <div class="table-responsive">
        <h4 class="text-center">All Company</h4>
        <table class="table table-bordered border-primary" id="passengertable">
          <thead>
            <tr>
              <th scope="col">Serial Number</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Total Purchase</th>
              <th scope="col">Total Sell</th>
              <th scope="col">Profit</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
  
          <tbody>
           
            @foreach ($companys as $index=>$company)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $company->name ?? 'N/A' }}</td>
                <td>{{ $company->description ?? 'N/A' }}</td>
                <td>{{ $company->total_purchase ?? '-' }}</td>
                <td>{{ $company->total_sell ?? '-' }}</td>
                <td>{{ $company->profit ?? '-' }}</td>

                <td>
                  <a href="{{ route('view', $passenger->id) }}"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('edit', $passenger->id) }}"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('delete', $passenger->id) }}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            
          </tbody>
         
        </table>
  
      </div>
      
    </div>
  </div>

  <div class="modal-body container m-5" id="umra">
    <h4 class="text-center h4 mb-3">Umra/Hajj</h4>
    <!-- Form for adding a passenger -->
    <form class="row g-3" id="addcompany" action="{{ route('user/purchase') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="col-md-6">
        <label for="agent" class="form-label">Type</label>
        <select class="form-select" id="select_type" name="type">
            <option value="">Select Type</option> <!-- Default option -->
            <option value="umra">URMA</option>
            <option value="hajj">Hajja</option>

        </select>
      </div>

      <div class="col-md-6">
        <label for="agent" class="form-label">Agent</label>
        <select class="form-select" id="agentoptionpurchase" name="agentpurchase">
            <option value="">Select an Agent</option> <!-- Default option -->
            @foreach($agent as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
      </div>
        
        <div class="col-md-6">
          <label for="agent" class="form-label">Passanger</label>
          <select class="form-select" id="sellpassengerpurchase" name="sellpassengerpurchase">
              <option value="">Select a passanger</option> <!-- Default option -->
          </select>
        </div>
       
        <div class="col-md-4">
          <label for="agent" class="form-label">Price</label>
          <input type="number" class="form-control" id="deal_price_umra" name="deal_price_umra">
        </div>

        <div class="col-md-4">
          <label for="agent" class="form-label">Order Code</label>
          <input type="text" class="form-control" id="order_id" name="order_id" readonly>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
              Add Umra
          </button>
          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="closecompany">
              Close
          </button>
        </div>
        
    </form>

    <div class="container mt-4">
      <form class="row g-3" id="addpurchase" action="{{ route('search-order') }}" method="post" onsubmit="searchOrder(); return false;">
        @csrf
        <label class="form-label">Enter Order ID</label>
        <input type="text" class="form-control" placeholder="Enter Order ID" name="order_id" id="order_id">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Search
        </button>
      </form>
      
      <div class="container mt-3" id="purchasesection">
          <form id="infoForm"  method="post">
            @csrf
        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Agent Section</h5>
                    <input type="text" class="form-control" id="agentName" name="agentName" readonly>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5>Deal Price</h5>
                        <input type="text" class="form-control" id="dealPrice" name="dealPrice" readonly>
                    </li>
                    <li class="list-group-item">
                        <h5>Final Price</h5>
                        <input type="text" id="finalPrice" name="finalPrice" class="form-control" readonly>
                    </li>
                    <li class="list-group-item">
                        <h5>Passenger</h5>
                        <input type="text" class="form-control" id="passengerName" name="passengerName" readonly>
                    </li>
                    <li class="list-group-item">
                        <h5>Previous Deal</h5>
                        <input type="text" class="form-control" id="previousDeal" name="previousDeal" readonly>
                    </li>
                    <li class="list-group-item">
                        <h5>Type</h5>
                        <select class="form-select" id="travelType" name="travelType" readonly>
                          <option value="umra">Business</option>
                          <option value="hajj">Economy</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <h5>Order Number</h5>
                        <input type="text" class="form-control" id="purchaseOrder" name="purchaseOrder" readonly>
                    </li>
                </ul>
            </div>
        </form>
      
      </div>
    </div>
  </div>
 

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
{{-- 
  <script src="{{asset('assets/js/main.js')}}"></script> --}}
 @include('layout.script')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $('#candidatetable').DataTable();
    $('#passengertable').DataTable();

    var randomString = generateRandomString(8); // Change the number to the desired length
    var order_id = generateRandomString(10); // Change the number to the desired length
    $('#invoice').val(randomString);
    $('#order_id').val(order_id);

    $('#passenger').hide();
    $('#visapurchasesection').hide();
    $('#companysection').hide();

    $('#showpassenger').click(function(){
      $('#passenger').show('2');
    });
    $('#closepassenger').click(function(){
      $('#passenger').hide('2');
    });

    $('#company').click(function(){
      $('#companysection').show('2');
    });
    $('#closecompany').click(function(){
      $('#companysection').hide('2');
    });

    $('#visapurchase').click(function(){
      $('#visapurchasesection').show('2');
    });
    $('#closevisa').click(function(){
      $('#visapurchasesection').hide('2');
    });
    $('#sellquatity, #price_per').on('change', calculateTotal);

    function generateRandomString(length) {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var result = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            result += characters.charAt(randomIndex);
        }
        return result;
    }

    function calculateTotal() {
      var quantity = parseFloat($('#sellquatity').val()) || 0;
      var pricePerVisa = parseFloat($('#price_per').val()) || 0;
      var total = quantity * pricePerVisa;
      $('#total').val(total);
    }

    function searchOrder() {
        var order_id = $('#order_id').val();
        $.ajax({
          type: 'POST',
          url: '/search-order/' + order_id,
          success: function(response) {
              // Handle the JSON response
              const orderData = response.data.order;
              const passengerData = response.data.passenger;
              const agentData = response.data.agent;

              // Populate the fields with dynamic data
              $('#agentName').val(agentData);
              $('#dealPrice').val(orderData.deal_price);
              $('#finalPrice').val(orderData.deal_after);
              $('#passengerName').val(passengerData);

              // Populate the "Type" select element
              const travelTypeSelect = $('#travelType');
              travelTypeSelect.val(orderData.type);
          },
          error: function(error) {
              // console.error(error);
              // Handle errors here
          }
      });

    }

});
var dataObject = {};
function callApi(apiUrl, method, data, headers) {
            $.ajax({
                url: apiUrl,
                type: method,
                data: data,
                headers: headers,
                dataType: "json",
                // success: function (response) {
                //     console.log(response);
                //     for (var key in response) {
                //         dataObject[key] = response[key];
                //     }
                      
                // },
                success: function (response) {
                        console.log(response);
                        
                        for (var key in response.candidates) {
                            var candidateValue = response.candidates[key];
                            var userEmail = key;
                            var combinedValue = {
                                candidate: candidateValue,
                                user: response.users[candidateValue] || null 
                            };
                            dataObject[userEmail] = combinedValue;
                        }
                        console.log(dataObject);
                    },   
                    error: function (error) {
                    console.error("Error calling API:", error);
                }
            });
}
$('#pnumber').on('change', function () {
    var inputValue = $(this).val();
    var foundObject = dataObject[inputValue];
   
    if (foundObject) {
        // var email = Object.keys(foundObject)[0];
        var email = foundObject.candidate;
        // var licenceName = foundObject[email].user ? foundObject[email].user.licence_name : "Not available";
        var licenceName = foundObject.user.licence_name ? foundObject.user.licence_name : "Not available";
        alert(inputValue + " exists in database under: " + licenceName+'('+ foundObject.user.rl_no +')'+' Contact here: '+ email);
        $('#pnumber').val("");
    } else {
        
    }
});
$('#passport').blur(function(){
    var passport = $('#passport').val();
    $.ajax({
        url: '/check-passport/' + passport, // Replace with your Laravel route URL
        method: 'GET', // Use the appropriate HTTP method (GET or POST) based on your Laravel route
        dataType: 'json', // Specify the expected data type (JSON in this case)
        success: function(data) {
            if (data.exists) {
                Swal.fire({
                    title: 'Duplicate !!!',
                    text: 'This Passport Number is already in use',
                    icon: 'warning',
                });
                $('#passport').val('');
            } else {
               
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            Swal.fire({
                    title: 'Error !!!',
                    text: 'Something went wrong in passport check',
                    icon: 'error',
                });
        }
    });
});

$('#companyloadinvoice').change(function() {
   var comid = $(this).val();
   $.ajax({
      type: "GET",
      url: '/load-invoice/' + comid,
      success: function(response) {
         var selectElement = $('#invoiceoption');

         // Clear existing options, except the default option
         selectElement.find('option:not(:first)').remove();

         if (response.length > 0) {
            $.each(response, function(index, item) {
               selectElement.append($('<option>', {
                  value: item.id,
                  text: item.invoice
               }));
            });
         } else {
            console.log("No data found in the response.");
         }
      },
      error: function(error) {
         console.error(error);
      }
   });
});


$('#agentoption').change(function() {
   var comid = $(this).val();
  
   $.ajax({
      type: "GET", 
      url: '/load-passanger/' + comid, 
      success: function(response) {
        // console.log(response);
         if (response.length > 0) {

            var selectElement = $('#sellpassenger');
            selectElement.find('option:not(:first)').remove();
            $.each(response, function(index, item) {
              var option = $('<option>', {
                  value: item.id,
                  text: item.passenger_name
              });
              selectElement.append(option);
            });

         } else {
            console.log("No data found in the response.");
         }
      },
      error: function(error) {
         console.error(error);
      }
   });
});
$('#agentoptionpurchase').change(function() {
   var comid = $(this).val();
   var type  = $('#select_type').val();
   $.ajax({
      type: "GET", 
      url: '/load-' + type + '/' + comid,
      success: function(response) {
        // console.log(response);
         if (response.length > 0) {

            var selectElement = $('#sellpassengerpurchase');
            selectElement.find('option:not(:first)').remove();
            $.each(response, function(index, item) {
              var option = $('<option>', {
                  value: item.id,
                  text: item.passenger_name
              });
              selectElement.append(option);
            });

         } else {
            console.log("No data found in the response.");
         }
      },
      error: function(error) {
         console.error(error);
      }
   });
});

$('#invoiceoption').change(function() {
   var comid = $(this).val();
  
   $.ajax({
      type: "GET", 
      url: '/load-visa-details/' + comid, 
      success: function(response) {
        console.log(response);
        $.each(response, function(index, item) {
          $('#available_visa').val(item.quantity);
          $('#price_per_visa').val(item.per_visa);
        });
        
      },
      error: function(error) {
         console.error(error);
      }
   });
});

$('#addcandidate').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();
        console.log(formData);
        $.ajax({
              url: form.attr('action'),
              method: form.attr('method'),
              data: form.serialize(),
              success: function(response) {
                
                  console.log(response);
                  
                  Swal.fire({
                      title: response.title,
                      text: response.message,
                      icon: response.icon,
                      
                  });
                  if (response.redirect_url) {
                            setTimeout(function() {
                              var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                              window.location.href = redirectUrl;
                            }, 3000);
                    }
                                          
              },
              error: function(response) {
                
                  console.log(response);
                  var errorMessage = xhr.responseText;
                  var regex = /SQLSTATE\[23000\]:.*Duplicate entry.*'(.+)' for key '(.+)'/;
                  var matches = errorMessage.match(regex);
                  var duplicateEntryValue = matches ? matches[1] : null;
                  var duplicateEntryKey = matches ? matches[2] : null;

                  console.log("Duplicate Entry Value:", duplicateEntryValue);
                  console.log("Duplicate Entry Key:", duplicateEntryKey);
                  Swal.fire({
                      title: "Error",
                      text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                      icon: 'error',
                    
                  });
                  if (response.redirect_url) {
                            setTimeout(function() {
                              var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                              window.location.href = redirectUrl;
                            }, 3000);
                    }
                  
              }
          });
      });

function formatDate(date) {
  date.setDate(date.getDate() - 1); // Subtract 1 day from the date

  var year = date.getFullYear();
  var month = ('0' + (date.getMonth() + 1)).slice(-2);
  var day = ('0' + date.getDate()).slice(-2);

  return year + '-' + month + '-' + day;
}


</script>

</body>

</html>