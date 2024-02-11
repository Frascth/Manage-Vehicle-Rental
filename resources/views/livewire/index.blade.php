<div class="dark">
    @php
        $roles = Auth::user()->getRoleNames()->toArray();
    @endphp

    @if (in_array('rentler', $roles)) 
        @livewire('Rentler.Dashboard.Index')
    @elseif (in_array('vehicle-owner', $roles))
        @livewire('VehicleOwner.Dashboard.index')
    @elseif (in_array('admin', $roles))
        @livewire('Admin.Dashboard.Index')
    @endif
</div>