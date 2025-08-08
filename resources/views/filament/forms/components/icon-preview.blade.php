@php
    // Obtiene el estado (el valor) del campo 'icon'
    $iconClass = $this->all()['icon'] ?? null;
@endphp

@if ($iconClass)
    <div class="mb-4">
        <h3 class="text-lg font-medium">Vista Previa:</h3>
        <div style="border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; text-align: center;">
            <i class="{{ $iconClass }}" style="font-size: 3rem;"></i>
            <p class="mt-2 text-sm text-gray-500">{{ $iconClass }}</p>
        </div>
    </div>
@endif
