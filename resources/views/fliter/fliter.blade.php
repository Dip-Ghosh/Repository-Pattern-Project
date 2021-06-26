<div class="content d-flex flex-column flex-column-fluid" id="" style="margin-top: 45px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="tab-content">
                        <div class="tab-pane  pt-3 pr-5 mr-n5 active in" id="dashboard-data" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('campaign-list')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <fieldset class=" col-md-3 scheduler-border">
                                                <legend class="scheduler-border">Campaign</legend>
                                                <div class="col-md-12 control-group">
                                                    <select name="campaign" class="form-control" id="campaign">
                                                        <option value=""
                                                                @if(isset($dataSearch['campaign']) && $dataSearch['campaign'] == Null) selected @endif >
                                                            Select Campaign
                                                        </option>
                                                        <option value="NSU Summer 20"
                                                                @if(isset($dataSearch['campaign']) && $dataSearch['campaign'] == 'NSU Summer 20') selected @endif>
                                                            NSU Summer 20
                                                        </option>
                                                        <option value="NSU Spring 20"
                                                                @if(isset($dataSearch['campaign']) && $dataSearch['campaign'] == 'NSU Spring 20') selected @endif>
                                                            NSU Spring 20
                                                        </option>
                                                        <option value="NSU Fall 20"
                                                                @if(isset($dataSearch['campaign']) && $dataSearch['campaign'] == 'NSU Fall 20') selected @endif>
                                                            NSU Fall 20
                                                        </option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset class=" col-md-5 scheduler-border">
                                                <legend class="scheduler-border">Filter By</legend>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="control-group">
                                                            <select class="form-control select2" id="select_mul"
                                                                    name="search-filter[]" multiple="multiple">
                                                                <option value="Name"
                                                                        @if(isset($dataSearch['name']) && !empty($dataSearch['name']) && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Name
                                                                </option>
                                                                <option value="Pickup Point"
                                                                        @if(isset($dataSearch['pickuppoint']) && !empty($dataSearch['pickuppoint']) && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Pickup Point
                                                                </option>
                                                                <option value="Drop-off Point"
                                                                        @if(isset($dataSearch['droppoint']) && !empty($dataSearch['droppoint']) && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Drop-off Point
                                                                </option>
                                                                <option value="Institute"
                                                                        @if(isset($dataSearch['institute']) && !empty($dataSearch['institute']) && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Institute
                                                                </option>
                                                                <option value="Date"
                                                                        @if(isset($dataSearch['datetime']) && !empty($dataSearch['datetime']) && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Date
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-6" id="name-filter"
                                                         @if(isset($dataSearch['name']) && !empty($dataSearch['name']) && empty($dataSearch['groupByFilter'])) style="display: block"
                                                         @else  style="display: none" @endif>
                                                        <div class="control-group">
                                                            <label for="Name" style="font-weight: bold">Name</label>
                                                            <input type="text" class="form-control" id="Name"
                                                                   value="{{(isset($dataSearch['name']) && !empty($dataSearch['name']) && empty($dataSearch['groupByFilter'])) ?$dataSearch['name']:''}}"
                                                                   name="name" placeholder="Name "/>
                                                            <i class="icon-time"></i>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" id="pickup-filter"
                                                         @if(isset($dataSearch['pickuppoint']) && !empty($dataSearch['pickuppoint']) && empty($dataSearch['groupByFilter'])) style="display: block"
                                                         @else  style="display: none" @endif >
                                                        <div class="control-group">
                                                            <label for="Pickup-Point" style="font-weight: bold">Pick up
                                                                Point</label>
                                                            <select name="pickuppoint" class="form-control"
                                                                    id="Pickup-Point">
                                                                <option value="">Pick up Point</option>
                                                                <option value="Mirpur"
                                                                        @if(isset($dataSearch['pickuppoint']) && $dataSearch['pickuppoint'] == 'Mirpur') selected @endif>
                                                                    Mirpur
                                                                </option>
                                                                <option value="Banani"
                                                                        @if(isset($dataSearch['pickuppoint']) && $dataSearch['pickuppoint'] == 'Banani') selected @endif>
                                                                    Banani
                                                                </option>
                                                                <option value="Mohakhali"
                                                                        @if(isset($dataSearch['pickuppoint']) && $dataSearch['pickuppoint'] == 'Mohakhali') selected @endif>
                                                                    Mohakhali
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-6" id="drop-filter"
                                                         @if(isset($dataSearch['droppoint']) && !empty($dataSearch['droppoint']) && empty($dataSearch['groupByFilter'])) style="display: block"
                                                         @else  style="display: none" @endif>
                                                        <div class="control-group">
                                                            <label for="droppoint" style="font-weight: bold">Drop off
                                                                Point</label>
                                                            <select name="droppoint" id="droppoint"
                                                                    class="form-control">
                                                                <option value="">Pick up Point</option>
                                                                <option value="Mirpur"
                                                                        @if(isset($dataSearch['droppoint']) && $dataSearch['droppoint'] == 'Mirpur' && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Mirpur
                                                                </option>
                                                                <option value="Banani"
                                                                        @if(isset($dataSearch['droppoint']) && $dataSearch['droppoint'] == 'Banani' && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Banani
                                                                </option>
                                                                <option value="Mohakhali"
                                                                        @if(isset($dataSearch['droppoint']) && $dataSearch['droppoint'] == 'Mohakhali' && empty($dataSearch['groupByFilter'])) selected @endif>
                                                                    Mohakhali
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6" id="institution-filter"
                                                         @if(isset($dataSearch['institute']) && !empty($dataSearch['institute']) && empty($dataSearch['groupByFilter'])) style="display: block"
                                                         @else  style="display: none" @endif>
                                                        <div class="control-group">
                                                            <label for="Institute"
                                                                   style="font-weight: bold">Institute</label>
                                                            <select name="institute" id="Institute"
                                                                    class="form-control ">
                                                                <option value="">Select Institute</option>
                                                                <option value="NSU"
                                                                        @if(isset($dataSearch['institute']) && $dataSearch['institute'] == "NSU" && empty($dataSearch['groupByFilter'])) selected @endif >
                                                                    NSU
                                                                </option>
                                                                <option value="BRAC"
                                                                        @if(isset($dataSearch['institute']) && $dataSearch['institute'] == "BRAC" && empty($dataSearch['groupByFilter'])) selected @endif >
                                                                    BRAC
                                                                </option>
                                                                <option value="AIUB"
                                                                        @if(isset($dataSearch['institute']) && $dataSearch['institute'] == "AIUB" && empty($dataSearch['groupByFilter'])) selected @endif >
                                                                    AIUB
                                                                </option>
                                                                <option value="IUB"
                                                                        @if(isset($dataSearch['institute']) && $dataSearch['institute'] == "IUB" && empty($dataSearch['groupByFilter'])) selected @endif >
                                                                    IUB
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-6" id="date-filter"
                                                         @if(isset($dataSearch['datetime']) && !empty($dataSearch['datetime']) && empty($dataSearch['groupByFilter'])) style="display: block"
                                                         @else  style="display: none" @endif >
                                                        <div class="control-group">
                                                            <label for="kt_daterangepicker_3" style="font-weight: bold">Date</label>
                                                            <input type="text"
                                                                   value="{{(isset($dataSearch['datetime']) && !empty($dataSearch['datetime']) && empty($dataSearch['groupByFilter'])) ?$dataSearch['datetime']:''}}"
                                                                   name="datetime"
                                                                   autocomplete="off"
                                                                   class="form-control" id="dateTime"
                                                                   placeholder="Select time"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>

                                            <fieldset class=" col-md-4 scheduler-border">
                                                <legend class="scheduler-border">Group By</legend>
                                                <div class="row">
                                                    <div class="col-md-12 control-group">
                                                        <select class="form-control " id="groupByFilter"
                                                                name="groupByFilter">
                                                            <option value="">Select an Option</option>
                                                            <option value="Name"
                                                                    @if(isset($dataSearch['groupByFilter']) && !empty($dataSearch['groupByFilter'] == 'Name')) selected @endif>
                                                                Name
                                                            </option>
                                                            <option value="Pickup-Point"
                                                                    @if(isset($dataSearch['groupByFilter']) && !empty($dataSearch['groupByFilter'] == 'Pickup-Point')) selected @endif>
                                                                Pickup Point
                                                            </option>
                                                            <option value="Drop-off-Point"
                                                                    @if(isset($dataSearch['groupByFilter']) &&  !empty($dataSearch['groupByFilter'] == 'Drop-off-Point')) selected @endif>
                                                                Drop off Point
                                                            </option>
                                                            <option value="Institute"
                                                                    @if(isset($dataSearch['groupByFilter']) &&  !empty($dataSearch['groupByFilter'] == 'Institute')) selected @endif>
                                                                Institute
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 5px">
                                                    <div class="col-md-6">
                                                        <div class="control-group">
                                                            <button type="submit" id="form-submit"
                                                                    class=" btn btn-success">
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </div>
                                    </form>
                                    <style>
                                        fieldset.scheduler-border {
                                            border: 1px groove #ddd !important;
                                            padding: 0 1.4em 1.4em 1.4em !important;
                                            margin: 0 0 1.5em 0 !important;
                                            -webkit-box-shadow: 0px 0px 0px 0px #000;
                                            box-shadow: 0px 0px 0px 0px #000;
                                        }

                                        legend.scheduler-border {
                                            font-size: 1.2em !important;
                                            font-weight: bold !important;
                                            text-align: left !important;
                                            width: auto;
                                            padding: 0 10px;
                                            border-bottom: none;
                                        }
                                    </style>
                                </div>
                            </div>
                            <div class="row">
                                @if (isset($dataSearch['groupByFilter']) && !empty($dataSearch['groupByFilter']) && $dataSearch['groupByFilter'] !=NULL)
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                @else
                                    <table class="table table-striped table-hover table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Pickup Point</th>
                                            <th>Drop-off Point</th>
                                            <th>Institute</th>
                                            <th>Scope</th>
                                            <th>Remarks</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($campaigns) && !empty($campaigns))
                                            @foreach($campaigns as $datum)
                                                <tr>

                                                    <td><input type="checkbox" id="vehicle1" name="vehicle1"
                                                               value="Bike">
                                                    </td>
                                                    <td>{{$datum->id}}</td>
                                                    <td>{{$datum->name}}</td>
                                                    <td>{{$datum->mobile}}</td>
                                                    <td>{{$datum->pick_up_point}}</td>
                                                    <td>{{$datum->drop_off_point}}</td>
                                                    <td>{{$datum->institute}}</td>
                                                    <td>{{$datum->scope}}</td>
                                                    <td>{{$datum->remarks}}</td>
                                                    <td>{{$datum->status}}</td>
                                                    <td>{{$datum->date}}</td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>

                                @endif

                            </div>
                            
                        </div>

                        <div class="tab-pane  pt-2 pr-5 mr-n5 " id="data-room" role="tabpanel">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                        <div class="tab-pane   pt-3 pr-5 mr-n5 " id="assignment" role="tabpanel">
                            <div class="row">
                                <table class="table table-striped table-hover table-bordered" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Dateline</th>
                                        <th>Acquistion Officer</th>
                                        <th>Instruction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($assignments) && !empty($assignments))
                                        @foreach($assignments as $datum)
                                            <tr>
                                                <td>{{$datum->id}}</td>
                                                <td>{{$datum->dateline}}</td>
                                                <td>{{$datum->acquistion_officer}}</td>
                                                <td>{{$datum->instruction}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.min.js"
        integrity="sha512-tOcHADT+YGCQqH7YO99uJdko6L8Qk5oudLN6sCeI4BQnpENq6riR6x9Im+SGzhXpgooKBRkPsget4EOoH5jNCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.esm.min.js"
        integrity="sha512-Tt9OX9dS4/BP6yf/a4fiLgrIpQQqzn91gpcsPUbBka9h84Kr0EIaMsnl9Nk5XlvrdeoYrDuT9E0zlHDl4SxTgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.js"
        integrity="sha512-or2Rj8rtp6G4AA7LOM1DVfQmzsevkILKgY1LLJ5kEDv3UCiEt9bmHJn7LNmo8BC5hxJCQ3cosqo1t77+p/yOfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/helpers.esm.min.js"
        integrity="sha512-4OeC7P+qUXB7Kpyeu1r5Y209JLXfCkwGKDpk8vnXzeNGMnpTr6hzOz2lMm7h0oxRBVu2ZCPRkCBPMmIlWsbaHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $('#dateTime').daterangepicker();
        $('#dateTime').val('');
        var select = [];
        $('#select_mul').select2();


        $('#select2-selection__choice__remove').select2('destroy');

        $("#select_mul").on("select2:select", function (evt) {
            evt.preventDefault();

            var element = evt.params.data.element;
            var $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");

        });

        $(document).on('change', '#select_mul', function () {

            $.each($(this).find("option:selected"), function (i, item) {
                select.push($(item).val())
            });


            if ($.inArray("Name", select) != -1) {
                $("#name-filter").show();
                $("#name-filter").css('position', 'relative');
            } else {
                $("#name-filter").hide();
            }
            if ($.inArray("Pickup Point", select) != -1) {
                $("#pickup-filter").show();
                $("#pickup-filter").css('position', 'relative');
            } else {
                $("#pickup-filter").hide();
            }
            if ($.inArray("Drop-off Point", select) != -1) {
                $("#drop-filter").show();
                $("#drop-filter").css('position', 'relative');
            } else {
                $("#drop-filter").hide();
            }
            if ($.inArray("Institute", select) != -1) {
                $("#institution-filter").show();
                $("#institution-filter").css('position', 'relative');
            } else {
                $("#institution-filter").hide();
            }
            if ($.inArray("Date", select) != -1) {
                $('#dateTime').val('');
                $("#date-filter").show();
                $("#date-filter").css('position', 'relative');
            } else {
                $("#date-filter").hide();
            }
            select = [];
        })

        $(document).on('click', '.select2-selection__choice__remove', function () {
            var data = $(this).parent().attr('title');
            if (data == 'Name') {
                $("#Name").val('');
                $("#name-filter").hide();
            }

            if (data == 'Pickup Point') {
                $("#Pickup-Point").find($('option')).attr('selected', false)
                $("#pickup-filter").hide();
            }
            if (data == 'Drop-off Point') {
                $("#droppoint").find($('option')).attr('selected', false)
                $("#drop-filter").hide();
            }
            if (data == 'Institute') {
                $("#Institute").find($('option')).attr('selected', false)
                $("#institution-filter").hide();
            }
            if (data == 'Date') {
                $("#dateTime").val('');
                $("#date-filter").hide();
            }

        })

        $('#select_mul').change(function () {
            $('#groupByFilter').prop('selectedIndex', 0);
        });
        $('#groupByFilter').change(function () {
            $("#name-filter").hide();
            $("#pickup-filter").hide();
            $("#drop-filter").hide();
            $("#institution-filter").hide();
            $("#date-filter").hide();
            $(".select2-selection__rendered>li").remove();

        });

    })
</script>

<script>
    const ctx = document.getElementById('myChart');
    const graphData =  @json($campaigns);
    const graphTitle = @json((!empty($subLabel))?$subLabel:'');
    const labels = [];
    const val = [];

    $.each(graphData, function (key, value) {
        labels.push(value.name);
        val.push(value.total);

    });

    if (graphTitle !== 'undefined' && graphTitle != '') {

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: graphTitle,
                    data: val,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: graphTitle,
                            color: '#911',
                            font: {
                                family: 'Comic Sans MS',
                                size: 20,
                                weight: 'bold',
                                lineHeight: 1.2,
                            },
                            padding: {top: 20, left: 0, right: 0, bottom: 0}
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value',
                            color: '#191',
                            font: {
                                family: 'Times',
                                size: 20,
                                style: 'normal',
                                lineHeight: 1.2
                            },
                            padding: {top: 30, left: 0, right: 0, bottom: 0}
                        }
                    }
                }
            }
        });
    }

</script>

