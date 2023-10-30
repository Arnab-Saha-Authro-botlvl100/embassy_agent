<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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


    <div class="container mt-3" id="purchasesection">
        <form id="infoForm"  method="post" action="{{ route('confirm-order') }}"> 
          @csrf
      
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Agent Section</h5>
                  <input type="text" class="form-control" id="agentName" name="agentName" readonly value="{{$data['agent']}}">
              </div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <h5>Deal Price</h5>
                      <input type="text" class="form-control" id="dealPrice" name="dealPrice" readonly value="{{ $data['order']['deal_price'] }}"
                      >
                  </li>

                  <li class="list-group-item">
                    <label for="agent" class="form-label">Given</label>
                    <input type="number" class="form-control" id="deal_price_third"
                          value="{{ $data['order']['deal_after'] }}" readonly>
                  </li>

                  <li class="list-group-item">
                    <label for="agent" class="form-label">Due</label>
                    <input type="number" class="form-control" id="deal_price_third"
                          value="{{ $data['order']['deal_price'] - $data['order']['deal_after'] }}" readonly>
                  </li>

                  <li class="list-group-item">
                      <h5>Now Giving</h5>
                      <input type="text" id="finalPrice" name="finalPrice" class="form-control" >
                  </li>
                  <li class="list-group-item">
                      <h5>Passenger</h5>
                      <input type="text" class="form-control" id="passengerName" name="passengerName" readonly value="{{$data['passenger']}}">
                  </li>
                 
                  <li class="list-group-item">
                    <h5>Type</h5>
                    <select class="form-select" id="travelType" name="travelType" readonly>
                        <option value="umra" {{ $data['order']['type'] === 'umra' ? 'selected' : '' }}>Business</option>
                        <option value="hajj" {{ $data['order']['type'] === 'hajj' ? 'selected' : '' }}>Economy</option>
                    </select>                    
                 </li>
                
                  <li class="list-group-item">
                      <h5>Order Number</h5>
                      <input type="text" class="form-control" id="purchaseOrder" name="purchaseOrder" readonly value="{{$data['order']['order_id']}}">
                      <input type="hidden" id="order_id" name="order_id" value="{{$data['order']['id']}}">
                  </li>
              </ul>
          </div>
          <div class="row mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
    
    </div>

    <div class="modal-body container m-5" id="umrathirdparty">
        <h4 class="text-center h4 mb-3">Umra/Hajj</h4>
        <!-- Form for adding a passenger -->
        <form class="row g-3" id="addcompany"  action="{{ route('thirdpartypurchase') }}" method="post" enctype="multipart/form-data">
          @csrf
    
          <div class="col-md-6">
            <label for="agent" class="form-label">Agent</label>
            <div class="card-body">
                <input type="text" class="form-control" id="agentName" name="" readonly value="{{$data['agent']}}">
                <input type="hidden" class="form-control" id="agentName" name="agentNamethird" readonly value="{{$data['order']['agent']}}">
            </div>
          </div>
    
          <div class="col-md-6">
            <label for="agent" class="form-label">Type</label>
           
            <select class="form-select" id="travelType" name="thirdcompanytype" readonly>
                <option value="umra" {{ $data['order']['type'] === 'umra' ? 'selected' : '' }}>Umra</option>
                <option value="hajj" {{ $data['order']['type'] === 'hajj' ? 'selected' : '' }}>Hajj</option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="agent" class="form-label">Company</label>
           
            <select class="form-select" id="travelType" name="thirdcompany">
                <option value="">Select Company</option>
                @foreach($companys as $company)
                    <option value="{{ $company->id }}" @if(isset($thirdparty) && $thirdparty[0]->company == $company->id) selected @endif>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            
          </div>
         
           
            <div class="col-md-3">
              <label for="agent" class="form-label">Price</label>
              <input type="number" class="form-control" id="deal_price_third" name="deal_price_third"
                    value="{{ isset($thirdparty) && !$thirdparty->isEmpty() ? $thirdparty[0]->deal : '' }}"
                    @if (isset($thirdparty) && !$thirdparty->isEmpty()) readonly @endif>
            </div>

            <div class="col-md-3">
              <label for="agent" class="form-label">Given</label>
              <input type="number" class="form-control" id="deal_price_given" name="deal_price_given"   placeholder="{{ isset($thirdparty) && !$thirdparty->isEmpty() ? $thirdparty[0]->given : '' }}">
              <input type="hidden" class="form-control" id="prev_given" name="prev_given" value="{{ isset($thirdparty) && !$thirdparty->isEmpty() ? $thirdparty[0]->given : ''}}">
            </div>
    
            <div class="col-md-4">
              <label for="agent" class="form-label">Order Code</label>
              <input type="text" class="form-control" id="order_id_third" name="order_id_third" readonly value="{{$data['order']['order_id']}}">
            </div>
    
            <div class="col-12 text-center">
              <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                  Place Order
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
          
       
        </div>
      </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
