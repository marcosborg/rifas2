<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Navbar extends Component
{

    private $links;

    public function __construct(Menu $menu)
    {
        $this->links = $menu->orderBy('position')->get()->load('page');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $links = $this->links;

        return view('components.navbar', compact('links'));
    }
}
