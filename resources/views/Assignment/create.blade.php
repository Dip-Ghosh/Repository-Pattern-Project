
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#b5b5bf">
                <div class="col-md-4 offset-1">
                    <img src="{{asset('img/assignent.png')}}" style=" border-radius: 50%;;background-color: #e06363" class="max-h-70px" alt="" />
                </div>
                <div class="col-md-4 offset-2" >
                    <h4 class="modal-title" id="exampleModalLabel" style=" font-weight: bold;color: #1a9012; margin-left: -155px;">Give an Assignment</h4>
                </div>



            </div>
            @if(count($errors)>0)
                @foreach($errors as $e)
                    {{$e}}
                @endforeach
                @endif
            <div class="modal-body">
                <form class="form" id="form">
                    <div class="card-body" >
                        <div class="form-group">
                            <select  name="acquistion_officer" required id="acquistion-officer" class="form-control form-control-lg">
                                <option value="" >Select an acquisition  officer</option>
                                <option value="Dip">Dip</option>
                                <option value="Rana">Rana</option>
                                <option value="Shovon">Shovon</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="date_line" id="date-line" required class="form-control form-control-lg" >
                                <option value="" >Select Dateline</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>

                            </select>
                        </div>
                        <div class="form-group" >
                            <textarea class="form-control" id="instruction" name="instruction" placeholder="Add Instructions"  rows="5"></textarea>
                        </div>

                    </div>

                </form>

            </div>
            <div class="modal-footer" style="margin-buttom: -5px ;background-color:#b5b5bf">
                <button type="button" class="btn btn-light-danger " data-dismiss="modal">Close</button>
                <button type="button" id="save-instruction" class="btn btn-light-success ">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script>



         $(document).on('click','#save-instruction',function(){
             const url = "{{route('assignment-store')}}";
             const officer = $('#acquistion-officer').val();
             const dateline = $('#date-line').val();
             const instruction = $('#instruction').val();


             $.ajax({
                 type: 'POST',
                 url: url,
                 data: {
                     "_token": "{{ csrf_token() }}",
                     "officer":officer,
                     "dateline":dateline,
                     "instruction":instruction

                 },
                 success:function (response){

                         if (response.message) {
                             Swal.fire({
                                 position: 'center',
                                 icon: 'success',
                                 title: response.message,
                                 showConfirmButton: false,
                                 timer: 1500
                             }).then(function (value){
                                 if(value){
                                     $('#exampleModal').modal('hide');
                                   window.location.reload();
                                 }
                             })
                         }
                 },
                 error: function(response) {
                    var errors = response.responseJSON.errors;
                      var data = [];
                     for (var key in errors) {
                      data.push(errors[key][0]);
                     }

                         Swal.fire({
                             icon: 'error',
                             title: '',
                             text: data

                         }).then(function (value){
                             if(value){
                                 $('#exampleModal').modal('hide');
                                 window.location.reload();
                             }
                         })



                 }

         })
     })
 </script>
