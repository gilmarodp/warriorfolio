<?php

namespace App\View\Components\Contact;

use App\Models\Layout;
use App\Models\Module;
use App\Models\Profile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact.section', [
            'social_network' => $this->isEmpty(),
            'module'         => Module::first(['contact']),
            'data'           => Layout::first(['contact']),
        ]);
    }

    /**
     * Summary of isEmpty
     * @return int
     */
    public function isEmpty(): int
    {
        $model = Profile::first(['social']);
        $count = 0;
        foreach ($model->toArray() as $value) {
            if (! empty($value)) {
                $count++;
            }
        }

        return $count;
    }
}
