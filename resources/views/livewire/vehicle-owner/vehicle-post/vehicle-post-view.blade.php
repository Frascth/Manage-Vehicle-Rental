<div class="d-flex justify-content-center">
    <form class="m-4 w-50" wire:submit="save">

        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <select wire:model="form.brandId" id="brand" class="form-select" aria-label="Default select example">
                <option selected value="">Choose...</option>
                @foreach ($brands as $brand)
                    <option value={{ $brand->id }}>{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('form.brandId')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="vehicle-type" class="form-label">Vehicle Type</label>
            <select wire:model="form.vehicleTypeId" id="vehicle-type" class="form-select" aria-label="Default select example">
                <option selected value="">Choose...</option>
                @foreach ($vehicleTypes as $vehicleType)
                    <option value={{ $vehicleType->id }}>{{ $vehicleType->name }}</option>
                @endforeach
            </select>
            @error('form.vehicleTypeId')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model Name</label>
            <input wire:model="form.modelName" type="text" class="form-control" id="model" placeholder="Civic or Alphard or Brio etc">
            @error('form.modelName')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="transmission-type" class="form-label">Transmission Type</label>
            <select wire:model="form.transmissionTypeId" id="transmission-type" class="form-select" aria-label="Default select example">
                <option selected value="">Choose...</option>
                @foreach ($transmissionTypes as $transmissionType)
                    <option value={{ $transmissionType->id }}>{{ $transmissionType->name }}</option>
                @endforeach
            </select>
            @error('form.transmissionTypeId')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Door Count</label>
            <input wire:model="form.doorCount" type="text" class="form-control" id="model" placeholder="Door count with trunk included">
            @error('form.doorCount')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Seat Count</label>
            <input wire:model="form.seatCount" type="text" class="form-control" id="model" placeholder="Seat count with driver seat included">
            @error('form.seatCount')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Maximum Fuel</label>
            <input wire:model="form.maxFuel" type="text" class="form-control" id="model" placeholder="Maximum fuel in liter">
            @error('form.maxFuel')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Current Fuel</label>
            <input wire:model="form.currFuel" type="text" class="form-control" id="model" placeholder="Current fuel in liter">
            @error('form.currFuel')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Fuel Efficiency</label>
            <input wire:model="form.fuelEfficiency" type="text" class="form-control" id="model" placeholder="Fuel efficiency is how many kilometer per liter fuel consumed">
            @error('form.fuelEfficiency')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Manufactur Date</label>
            <input wire:model="form.manufacturDate" type="date" class="form-control" id="model" placeholder="Manufactur date is the time of vehicle created">
            @error('form.manufacturDate')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Usage Time</label>
            <input wire:model="form.usageTime" type="text" class="form-control" id="model" placeholder="Usage time in month">
            @error('form.usageTime')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Price</label>
            <input wire:model="form.price" type="text" class="form-control" id="model" placeholder="Price per day in USD">
            @error('form.price')
                <div class="mt-2 bg-danger px-2 rounded"> {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
