<div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Customer</label>
                <select class="form-control select2-customer__" name="customer_id" required
                    onchange="__selectedCustomer(this)"
                ></select>
                <span class="text-danger" id="customer_id_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" id="_company_name" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="_phone" readonly>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="email" readonly>
            </div>
        </div> --}}
    </div>
</div>
<script>
    let all_customers = @json(\App\Models\Customer::query()->with(['sales'])->get());
    function __selectedCustomer(el) {
        var customer_id = $(el).val();
        $('#customer_id_error').text('');
        $('#_company_name').val('');
        $('#_name').val('');
        $('#_phone').val('');
        if (customer_id) {
            let cus = all_customers.find(c => c.id == customer_id);
            if (cus) {
                $('#customer_id_error').text('Due: ' + cus.sales.reduce((acc, curr) => acc + curr.due_amount, 0));
                $('#_company_name').val(cus.company_name);
                $('#_name').val(cus.name);
                $('#_phone').val(cus.phone);
            }
        }
    };
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            $('select.select2-customer__').select2({
                placeholder: 'Select Customer',
                ajax: {
                    url: '{{ route('customer.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function(data) {
                        // console.log(data);
                        return {
                            results: data.data.map(item => ({
                                id: item.id,
                                text: item.name,
                            })),
                        };
                    },
                },
            });
        }, 500);
    });
</script>
