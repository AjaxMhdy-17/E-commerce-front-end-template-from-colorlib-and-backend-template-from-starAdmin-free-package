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
    public ?string $button;

    public function __construct(string $title, ?string $subtitle = null, ?string $description = null , ?string $button = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->button = $button;
    }

   
    public function render(): View|Closure|string
    {
        return view('components.card-title');
    }
}
