<x-filament-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    {{-- Usamos Alpine.js solo para la previsualización --}}
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }">

        {{-- CAMPO DE TEXTO PRINCIPAL --}}
        <input
            type="text"
            x-model="state"
            placeholder="Escribe el nombre del ícono (ej: house-fill)"
            class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500"
        >

        {{-- VISTA PREVIA (SOLO SE MUESTRA SI HAY ALGO ESCRITO) --}}
        <div x-show="state" class="flex items-center gap-4 p-4 border rounded-lg mt-4 bg-gray-50">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center">
                <i :class="'bi ' + state" class="text-3xl text-gray-600"></i>
            </div>
            <div class="flex-grow">
                <p class="text-sm font-medium text-gray-800">Vista previa del ícono:</p>
                <p class="text-sm text-gray-600" x-text="state"></p>
            </div>
        </div>
    </div>
</x-forms::field-wrapper>
