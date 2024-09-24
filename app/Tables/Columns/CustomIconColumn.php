<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;

class CustomIconColumn extends Column
{
    protected string $view = 'tables.columns.custom-icon-column';


    protected string|\Closure|null $bg_color = null;
    protected string|\Closure|null $icon = null;
    protected string|\Closure|null $icon_color = null;

    public function bg_color(string|\Closure $bg_color): static
    {
        $this->bg_color = $bg_color;
        return $this;
    }

    public function icon(string|\Closure $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function icon_color(string|\Closure $icon_color)
    {
        $this->icon_color = $icon_color;
        return $this;
    }


    public function getBgColor(): ?string
    {
        return $this->evaluate($this->bg_color);
    }

    public function getIcon(): ?string
    {
        return $this->evaluate($this->icon);
    }

    public function getIconColor(): ?string
    {
        return $this->evaluate($this->icon_color);
    }
}
