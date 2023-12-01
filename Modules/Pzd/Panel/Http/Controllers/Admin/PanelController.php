<?php

namespace Pzd\Panel\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Pzd\Panel\Models\Panel;
use Pzd\Panel\Repositories\PanelRepo;

class PanelController extends Controller
{
    public function index(PanelRepo $panelRepo)
    {
        $this->authorize('index' , Panel::class);

        return  view('Panel::index',compact('panelRepo'));
    }
}
