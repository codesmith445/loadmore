<?php

namespace Codesmith445\LoadMore\View\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class LoadMore extends Component
{
    public $paginator;
    public $view;
    public $containerId;
    public $fetchUrl;

    public function __construct(
        LengthAwarePaginator $paginator,
        string $view,
        string $containerId = 'loadmore-container',
        string $fetchUrl = ''
    ) {
        $this->paginator = $paginator;
        $this->view = $view;
        $this->containerId = $containerId;
        $this->fetchUrl = $fetchUrl;
    }

    public function render()
    {
        return function (array $data) {
            return view('loadmore::components.loadmore')->with([
                'paginator' => $this->paginator,
                'view' => $this->view,
                'containerId' => $this->containerId,
                'fetchUrl' => $this->fetchUrl,
            ]);
        };
    }
}