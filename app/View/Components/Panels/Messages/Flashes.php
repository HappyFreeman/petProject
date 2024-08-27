<?php

namespace App\View\Components\Panels\Messages;

use App\Contracts\Services\FlashMessageContract;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Flashes extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private readonly FlashMessageContract $flashMessage)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $errors = $this->flashMessage->errorMessages();
        $successes = $this->flashMessage->successMessages();
        return view('components.panels.messages.flashes', ['errors' => $errors, 'successes' => $successes]);
    }
}
