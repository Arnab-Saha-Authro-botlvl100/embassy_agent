<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
    </style>
    @include('layout.head')
</head>
<body>

    <div class="container">
        <div class="d-flex mt-5" style="justify-content: space-between;">
            <div>
                <label for="pass" class="form-label">Select by passport number/Name</label>
                <input list="candidates" name="candidate" id="candidate" class="form-control" onchange="getdata()">
        
            </div>
            
            <datalist id="candidates">
                @foreach($candidates as $candidate)
                    <option value="{{ $candidate->candidate_id }}">
                        <b class="text-danger">Passport no: {{ $candidate->passport_number }},</b>
                        Candidate Name: {{ $candidate->name }}
                    </option>
                @endforeach
            </datalist>  
            <button class="btn btn-primary" onclick="printtable()">Print</button>
        </div>
      
    <div class="bg-white p-16 space-y-5 pt-[100px] w-[1150px] container-fluid w-80" id="printable">
        <h2 class="text-center text-4xl font-medium">
            بيان بالجوازات المقدمة
        </h2>
    
        <div class="flex text-xl">
            <div class="flex-1 space-y-1">
                <h3 class="flex">
                    <span class="font-semibold text-2xl w-[170px]">
                        {{ Session::get('rl_no') }}
                        
                    </span>
                    <span>:رقم الرخصة</span>
                </h3>
                <h3 class="flex">
                    <span contentEditable class="font-semibold text-2xl w-[170px]">
                        {{-- {{ dayjs()->format("DD/MM/YYYY") }} --}}
                    </span>
                    <span>: التاريخ</span>
                </h3>
            </div>
            <div class="flex-2">
                <h3 class="flex items-center justify-end gap-5">
                    <span class="font-semibold mr-14 text-2xl">
                        {{-- {{ $agency_name?.arabic }} --}}
                       {{Session::get('arabic_name')}} 
                    </span>
                    <span>: اسم مقدم الجوازات</span>
                </h3>
                <h3 class="flex justify-between">
                    <span></span>
                    <span>: الــتـــوقـيـــع</span>
                </h3>
            </div>
        </div>
       
        <table class="w-full table-bordered" id="embassy_list">
            <thead>
                <tr class=" text-center ">
                  
                            <th>
                                <p>ت</p>
                                <p>SL</p>
                            </th>
                            <th>
                                <p>المهنة</p>
                                <p>Profession</p>
                            </th>
                            <th class="w-[90px]">
                                <p>التاريخ</p>
                                <p>Year</p>
                            </th>
                            <th class="w-[140px]">
                                <p>رقم التأشيرة</p>
                                <p>Visa Number</p>
                            </th>
                            <th>
                                <p>اسم الكفيل</p>
                                <p>Sponsor Name</p>
                            </th>
                            <th class="w-[140px]">
                                <p>أرقام الجوازات</p>
                                <p>Passport No.</p>
                            </th>
                            
                </tr>
            </thead >
            
            <tbody id="table_body">
                
                
            </tbody>
            <tfoot>
                <tr class="[&>td]:border [&>td]:border-black [&>td]:p-0 text-xl text-center relative group">
                    <td>{{ "" }}</td>
                    <td>{{ "" }}</td>
                    <td>{{ "" }}</td>
                    <td>{{ "" }}</td>
                    <td class="font-bold text-xl" id="total">
                     
                    </td>
                    <td>المجموع</td>
                </tr>
            </tfoot>
        </table>
        
        <div style="display: flex; flex-wrap: wrap; justify-content: center; font-size: 2rem; font-weight: bold; text-align: center; padding: 0;">
            <div style="flex-basis: 50%; flex-grow: 1;">: الختم</div>
            <div style="flex-basis: 50%; flex-grow: 1;">: المستلم</div>
            <div style="flex-basis: 50%; flex-grow: 1;">: التعبئة</div>
            <div style="flex-basis: 50%; flex-grow: 1;">: المدقق</div>
            <div style="flex-basis: 50%; flex-grow: 1;">: التسجيل</div>
            <div style="flex-basis: 50%; flex-grow: 1;">: المسئول</div>
        </div>
          
    </div>
    @include('layout.script')
    <script type="text/javascript">
        var sl = 1;
        function getdata(){
            var id = document.getElementById('candidate').value;
            
            fetch('/user/embassy/' + id, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
           // Parse the response as JSON
            .then(data => {
                var tbody = document.getElementById('table_body');
                var tr = document.createElement('tr');
        //         var tr2 = `<tr class="border border-black p-0 text-xl text-center relative group">
        //       <td>${sl}</td>
        //       <td>${data[0].prof_name_arabic}</td>
        //       <td>${data[0].visa_date2}</td>
        //       <td>${data[0].visa_no}</td>
        //       <td>${data[0].spon_name_arabic}</td>
        //       <td>${data[0].passport_number}</td>
        //   </tr>`;

                tr.classList.add('border', 'border-black', 'p-0', 'text-xl', 'text-center', 'relative', 'group');

                var td1 = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var td4 = document.createElement('td');
                var td5 = document.createElement('td');
                var td6 = document.createElement('td');
                td1.innerHTML = sl;
                sl++;
                td2.innerHTML = data[0].prof_name_arabic;
                td3.innerHTML = data[0].visa_date2.substr(0, 4);
                td4.innerHTML = data[0].visa_no;
                td5.innerHTML = data[0].spon_name_arabic;
                td6.innerHTML = data[0].passport_number;
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                tr.appendChild(td6);
                tbody.appendChild(tr);
                // tbody.appendChild(tr2);
                console.log(data);

            })
            .catch(error => {
                // Handle any errors that occurred during the request
                // ...
            });
            document.getElementById('total').innerHTML = sl;
        }

        function printtable() {
            // Hide other elements on the page
            var elementsToHide = document.querySelectorAll('body > *:not(#printable)');
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'none';
            }

            // Print the specific table
            var printContents = document.getElementById('printable').outerHTML;
            var newWindow = window.open('', '_blank');
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            
            // Restore the original contents of the page
            document.body.innerHTML = originalContents;

            // Show the previously hidden elements
            for (var j = 0; j < elementsToHide.length; j++) {
                elementsToHide[j].style.display = '';
            }
        }

    </script>
</body>
</html>