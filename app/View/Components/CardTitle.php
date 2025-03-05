<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardTitle extends Component
{

    public string $title;
    public ?string $subtitle;
    public ?string $description;

    public function __construct(string $title, ?string $subtitle = null, ?string $description = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-title');
    }
}
