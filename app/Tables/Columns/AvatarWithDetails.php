<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;

class AvatarWithDetails extends Column
{
    protected string $view = 'tables.columns.avatar-with-details';

    protected string|\Closure|null $title = null;
    protected string|\Closure|null $description = null;
    protected string|\Closure|null $avatar = null;

    // image, name_xs, icon
    protected string|\Closure|null $avatar_type = null;
    protected string|\Closure|null $bg_color = null;

    // xs - h-6, w-6, sm - h-7, w-7, md - h-8, w-8, lg - h-9, w-9, xl - h-10, w-10, 2xl - h-11, w-11
    protected string $bg_size = 'h-9 w-9'; // lg

    // only for employee teams
    protected string|\Closure|null $name_xs = null;
    protected string|\Closure|null $icon = null;
    protected string|null $marginStart = null;

    // pass as a string, example clients/1/edit
    protected string|\Closure|null $link = null;


    public function description(string|\Closure $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function title(string|\Closure $title): static
    {
        $this->title = $title;
        return $this;
    }

    // image, name_xs, icon
    public function avatarType(string|\Closure $avatarType): static
    {
        $this->avatar_type = $avatarType;
        return $this;
    }

    public function avatar(string|\Closure $avatar = null, string|\Closure $name = null): static
    {
        if ($name instanceof \Closure) {
            $name = $this->evaluate($name);
        }

        if (is_null($avatar)) {
            $words = explode(' ', $name);
            if (count($words) > 1) {
                $firstLetter = strtoupper(substr($words[0], 0, 1));
                $secondLetter = strtoupper(substr($words[1], 0, 1));
                $initials = $firstLetter . $secondLetter;
                $this->avatar = $initials;
            } else {
                $initials = strtoupper(substr($name, 0, 2));
                $this->avatar = $initials;
            }
        } else {
            $this->avatar = $avatar;
        }

        return $this;
    }


    public function bgColor(string|\Closure $bgColor = null): static
    {
        $this->bg_color = $bgColor;
        return $this;
    }

    // xs - h-6, w-6, sm - h-7, w-7, md - h-8, w-8, lg - h-9, w-9, xl - h-10, w-10, 2xl - h-11, w-11
    public function bgSize(string $bgSize = null): static
    {
        if ($bgSize == 'xs') {
            $this->bg_size = 'h-6 w-6';
        } else if ($bgSize == 'sm') {
            $this->bg_size = 'h-7 w-7';
        } else if ($bgSize == 'md') {
            $this->bg_size = 'h-8 w-8';
        } else if ($bgSize == 'lg') {
            $this->bg_size = 'h-9 w-9';
        } else if ($bgSize == 'xl') {
            $this->bg_size = 'h-10 w-10';
        } else if ($bgSize == '2xl') {
            $this->bg_size = 'h-11 w-11';
        }

        return $this;
    }

    // only for employee teams
    public function nameXs(string|\Closure $nameXs = null): static
    {
        $this->name_xs = $nameXs;
        return $this;
    }

    public function icon(string|\Closure $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    public function marginStart(): static
    {
        $this->marginStart = 'ps-3';
        return $this;
    }

    // pass as a string, example clients/1/edit
    public function link(string|\Closure $link)
    {
        $this->link = $link;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->evaluate($this->title);
    }

    public function getDescription(): ?string
    {
        return $this->evaluate($this->description);
    }

    public function getAvatar(): ?string
    {
        return $this->evaluate($this->avatar);
    }

    public function getBgColor(): ?string
    {
        return $this->evaluate($this->bg_color);
    }

    public function getBgSize(): ?string
    {
        return $this->evaluate($this->bg_size);
    }

    public function getAvatarType(): ?string
    {
        return $this->evaluate($this->avatar_type);
    }

    public function getNameXs(): ?string
    {
        return $this->evaluate($this->name_xs);
    }

    public function getIcon(): ?string
    {
        return $this->evaluate($this->icon);
    }

    public function getMarginStart(): ?string
    {
        return $this->evaluate($this->marginStart);
    }

    public function getLink(): ?string
    {
        return $this->evaluate($this->link);
    }
}
