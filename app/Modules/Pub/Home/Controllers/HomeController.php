<?php
namespace App\Modules\Pub\Home\Controllers;
use App\Modules\Pub\Home\Services\HomeServices;
use App\Services\Base;
use Illuminate\Support\Arr;




class HomeController extends Base
{
    public $service;

    public function __construct(HomeServices $homeServices)
    {
        parent::__construct();
        $this->service = $homeServices;
      }

    private function getSite()
    {
        $this->template = "Pub::Home.sborsite";
        $this->title = trans('Сайт');

        $this->vars = Arr::add($this->vars, 'bar', $this->bar);
        $this->content = view('Pub::Home.content')->with([
            'title' => $this->title,
        ])->render();
        $this->vars = Arr::add($this->vars, 'content', $this->content);
    }

    public function index()
    {
       $this->getSite();
       return $this->renderOutput();
    }
}