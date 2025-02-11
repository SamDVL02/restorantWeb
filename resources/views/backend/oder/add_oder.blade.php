@extends('admin_dashboard')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Invoice</h4><br><br>

                            <div class="row">
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Inv No</label>
                                        <input class="form-control example-date-input" name="sale_no" type="text"
                                            value="{{ $sale_no }}" id="invoice_no" readonly
                                            style="background-color:#ddd">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" value="{{ $date }}"
                                            name="date" type="date" id="date">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Service Name</label>
                                        <select name="service_id" id="service_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($menu_item as $sev)
                                                <option value="{{ $sev->id }}">{{ $sev->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" style="display: none">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Server Cost</label>
                                        <select name="server_cost" id="server_cost" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($menu_item as $sev)
                                                <option value="{{ $sev->id }}">{{ $sev->price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Server Name</label>
                                        <select name="server_id" id="server_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($modifier as $mod)
                                                <option value="{{ $mod->id }}">{{ $mod->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top:43px;"></label>
                                        <i
                                            class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                            Add More
                                        </i>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->

                        <div class="card-body">
                            <form method="post" action="">
                                {{-- {{ route('sale.store') }} --}}
                                @csrf
                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Server Name</th>
                                            <th width="15%">Cost</th>
                                            <th width="7%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addRow" class="addRow"></tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="4">Grand Total</td>
                                            <td>
                                                <input type="text" name="cost" value="0" id="estimated_amount"
                                                    class="form-control estimated_amount" readonly
                                                    style="background-color: #ddd;">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table><br>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea name="description" class="form-control" id="description" placeholder="Write Description Here"></textarea>
                                    </div>
                                </div><br>

                                {{-- <div class="row">
                                    <div class="form-group col-md-9">
                                        <label for="">Customer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-select select2">
                                            <option value="">Select Customer</option>
                                            @foreach ($customer as $cust)
                                                <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                            @endforeach
                                            <option value="0">New Customer</option>
                                        </select><br>
                                    </div>
                                </div><br> --}}

                                <!-- Hide Add Customer Form -->
                                {{-- <div class="row new_customer" style="display:none">
                                    <div class="form-group col-md-4">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Write Customer Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                                            placeholder="Write Customer Mobile No">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Write Customer Email">
                                    </div>
                                </div><br> --}}
                                <!-- End Hide Add Customer Form -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton">Invoice Store</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="sale_no" value="@{{invoice_no}}">
        <input type="hidden" name="service_id[]" value="@{{service_id}}">
        <input type="hidden" name="server_id[]" value="@{{server_id}}">
        <td>@{{ service_name }}</td>
        <td>@{{ server_name }}</td>
        <td>@{{ server_cost }}</td>
        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    </tr>
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Add event more
            $(document).on("click", ".addeventmore", function() {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var service_id = $('#service_id').val();
                var service_name = $('#service_id').find('option:selected').text();
                var server_id = $('#server_id').val();
                var server_name = $('#server_id').find('option:selected').text();
                $('#server_cost').val(service_id.toString());
                var server_cost = $('#server_cost').find('option:selected').text();

                if (date == '') {
                    $.notify("Date is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (service_id == '') {
                    $.notify("Service is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (server_id == '') {
                    $.notify("Server is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    service_id: service_id,
                    service_name: service_name,
                    server_id: server_id,
                    server_name: server_name,
                    server_cost: server_cost
                };
                var html = template(data);
                $("#addRow").append(html);
                totalAmountPrice(); // Call the function to update total after adding a row
            });

            // Remove event more
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            // Calculate total amount price
            function totalAmountPrice() {
                var sum = 0;
                $(".delete_add_more_item").each(function() {
                    var server_cost = $(this).find("td:eq(2)").text();
                    if (!isNaN(server_cost) && server_cost.length != 0) {
                        sum += parseFloat(server_cost);
                    }
                });
                $('#estimated_amount').val(sum);
            }

            // Show/Hide new customer form
            $('#customer_id').on('change', function() {
                var customer_id = $(this).val();
                if (customer_id == '0') {
                    $('.new_customer').show();
                } else {
                    $('.new_customer').hide();
                }
            });
        });
    </script>
@endsection
