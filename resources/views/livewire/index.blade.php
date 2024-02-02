<div>
    @php
        $roles = Auth::user()->getRoleNames()->toArray();
    @endphp

    @if (in_array('rentler', $roles)) 
        @livewire('rentler.dashboard.index')
    @elseif (in_array('vehicle-owner', $roles))
        @livewire('vehicle-owner.dashboard.index')
    @elseif (in_array('admin', $roles))
        @livewire('admin.dashboard.index')
    @endif
</div>