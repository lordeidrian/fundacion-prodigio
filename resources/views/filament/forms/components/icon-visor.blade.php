@php
    // Obtenemos la lista de íconos de nuestra nueva clase
    $icons = \App\Support\BootstrapIcons::all();
@endphp

<div style="max-height: 400px; overflow-y: auto; border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1rem;">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 1rem;">
        @foreach ($icons as $icon)
            <div
                wire:key="{{ $icon }}"
                x-on:click="$dispatch('input', '{{ $icon }}')"
                title="{{ $icon }}"
                style="cursor: pointer; text-align: center; padding: 0.5rem; border-radius: 0.25rem; transition: background-color 0.2s;"
                class="icon-item"
            >
                <i class="bi {{ $icon }}" style="font-size: 2rem;"></i>
                <p style="font-size: 0.75rem; margin-top: 0.5rem; word-break: break-all;">{{ $icon }}</p>
            </div>
        @endforeach
    </div>
</div>

{{-- Opcional: añade estos estilos a tu CSS para un efecto hover --}}
<style>
    .icon-item:hover {
        background-color: #f3f4f6; /* Un gris claro, ajusta a tu gusto */
    }
</style>
