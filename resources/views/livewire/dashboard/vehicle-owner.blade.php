@section('styling')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
@endsection

<div>
    @php
        use App\Helpers\Constant
    @endphp

    <button wire:click="meow()" type="button" class="btn btn-primary">Refresh</button>
    <div class="m-4">
        <table class="text-white hover row-border nowrap order-column" id="vehicle-owner-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Vehicle Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Transmission</th>
                    <th>Doors</th>
                    <th>Seat</th>
                    <th>Max Fuel</th>
                    <th>Curr. Fuel</th>
                    <th>Fuel Efficiency</th>
                    <th>Manufacture Date</th>
                    <th>Usage Time</th>
                    <th>Vehicle Owner</th>
                    <th>Price Per (24 Hour)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehiclePosts as $post)
                    <tr>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ Constant::$vehicleType[$post['vehicle_type']] }}</td>
                        <td>{{ $post['brand']['name'] }}</td>
                        <td>{{ $post['model'] }}</td>
                        <td>{{ Constant::$transmissionType[$post['transmission_type']] }}</td>
                        <td>{{ $post['door_count'] }}</td>
                        <td>{{ $post['seat_count'] }}</td>
                        <td>{{ $post['max_fuel'] }}</td>
                        <td>{{ $post['curr_fuel'] }}</td>
                        <td>{{ $post['fuel_efficiency'] }}</td>
                        <td>{{ $post['manufactur_date'] }}</td>
                        <td>{{ $post['usage_time'] }}</td>
                        <td>{{ $post['vehicle_owner']['name'] }}</td>
                        <td>{{ $post['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#vehicle-owner-table').DataTable({
                scrollX: true,
                scrollY: 350,
                columnDefs: [{
                    target: '_all',
                    className: 'dt-body-center dt-head-center'
                },],
            });
        });
    </script>
@endsection

