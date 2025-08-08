<?php

namespace App\Filament\Forms\Components;

use App\Support\BootstrapIcons; // Importamos nuestra clase de ayuda
use Filament\Forms\Components\Field;

class CustomIconPicker extends Field
{
    protected string $view = 'filament.forms.components.custom-icon-picker';

    // Añadimos un método para que la vista pueda acceder a los íconos
    public function getIcons(): array
    {
        return BootstrapIcons::all();
    }
}
