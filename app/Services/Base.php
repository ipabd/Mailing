<?php
/**
 * Created by PhpStorm.
 * User: note
 * Date: 24.11.2020
 * Time: 22:51
 */
namespace App\Services;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;


abstract class Base extends Controller
{
    protected $template;
    protected $title;
    protected $content;
    protected $navigation;
    protected $footer;
    protected $vars;
    protected $locale;
    public    $datestart = [];
    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;
    protected $bar = 'no';
    public $keywords;
    public $meta_desc ;
    public $service;

    public function __construct()
    {
    }

    protected function renderStock() {
        $this->datestart=Services::setDate();
    }


    protected function renderOutput() {
        $this->vars = Arr::add($this->vars, 'content', $this->content);
        $this->footer = view('Pub::Home.footer')->with([
        ])->render();
        $this->vars = Arr::add($this->vars, 'navigation', $this->navigation);

        if($this->contentRightBar) {
            $rightbar = view('Pub::Home.rightbar')->with([
                'content_rightBar'=>$this->contentRightBar
            ])->render();
            $this->vars = Arr::add($this->vars, 'rightbar', $rightbar);
        }

        if($this->contentLeftBar) {
            $leftbar = view('Pub::Home.leftbar')->with([
                'content_leftBar'=>$this->contentLeftBar
            ])->render();
            $this->vars = Arr::add($this->vars, 'leftbar', $leftbar);
        }
        $this->vars = Arr::add($this->vars, 'footer', $this->footer);
        $this->vars =Arr::add($this->vars, 'datestart', $this->datestart);  ///определили переменные
        //dd($this->vars);
        return view($this->template)->with($this->vars);   ///передача в шаблон переменных
    }

}