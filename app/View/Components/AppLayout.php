<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\AppSetting;

// Import laravel cache class
use Illuminate\Support\Facades\Cache;

class AppLayout extends Component
{
    public $setting;

    public $layout, $assets, $title;

    public $isBanner, $isSidebar, $isNavbar, $isPageContainer;

    public $isTour, $isMasonry, $isFlatpickr, $isVectorMap, $isFslightbox, $isSweetalert, $isChoisejs, $isSelect2, $isFormWizard, $isQuillEditor, $isCircleProgress, $isNoUISlider, $isSignaturePad, $isUppy, $isSwiperSlider, $isCropperjs, $isBarRatting, $isPrism, $isBtnHover;

    public $modalJs;

    public function __construct($layout = '', $title= false, $assets = [], $modalJs = false, $isBanner = false, $isSidebar = true, $isNavbar = true, $isPageContainer = true, $isTour = false, $isMasonry = false, $isFlatpickr = false, $isVectorMap = false, $isFslightbox = false, $isSweetalert = false, $isChoisejs = false, $isSelect2 = false, $isFormWizard = false, $isQuillEditor = false, $isCircleProgress = false, $isNoUISlider = false, $isSignaturePad = false, $isUppy = false, $isSwiperSlider = false, $isCropperjs = false, $isBarRatting = false, $isPrism = false, $isBtnHover = false)
    {
        // Setting Object
        // Cache::flush('layout_setting');
        Cache::remember('layout_setting', 60, function () {
            return AppSetting::active()->setting('layout_setting', true)->first();
        });
        $this->setting = Cache::get('layout_setting');
        // Layout Name
        $this->layout = $layout;

        /*
         * Props name
         */

        // General Props
        $this->assets           = $assets;
        $this->title            = $title;

        // Setting Offcanvas Props
        $this->isSidebar        = $isSidebar;
        $this->isNavbar         = $isNavbar;
        $this->isBanner         = $isBanner;
        $this->isPageContainer  = $isPageContainer;

        // Plugins Enable/Disable Props
        $this->isTour           = $isTour;
        $this->isSelect2        = $isSelect2;
        $this->isMasonry        = $isMasonry;
        $this->isFlatpickr      = $isFlatpickr;
        $this->isVectorMap      = $isVectorMap;
        $this->isFslightbox     = $isFslightbox;
        $this->isSweetalert     = $isSweetalert;
        $this->isChoisejs       = $isChoisejs;
        $this->isFormWizard     = $isFormWizard;
        $this->isQuillEditor    = $isQuillEditor;
        $this->isCircleProgress = $isCircleProgress;
        $this->isNoUISlider     = $isNoUISlider;
        $this->isSignaturePad   = $isSignaturePad;
        $this->isUppy           = $isUppy;
        $this->isSwiperSlider   = $isSwiperSlider;
        $this->isCropperjs      = $isCropperjs;
        $this->isBarRatting     = $isBarRatting;
        $this->isPrism          = $isPrism;
        $this->isBtnHover       = $isBtnHover;

        // Custom Laravel Model Render Script Props
        $this->modalJs          = $modalJs;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        switch($this->layout){
            case 'horizontal':
                return view('layouts.dashboard.horizontal');
            break;
            case 'dualhorizontal':
                return view('layouts.dashboard.dual-horizontal');
            break;
            case 'dualcompact':
                return view('layouts.dashboard.dual-compact');
            break;
            case 'boxed':
                return view('layouts.dashboard.boxed');
            break;
            case 'boxedfancy':
                return view('layouts.dashboard.boxed-fancy');
            break;
            case 'simple':
                return view('layouts.dashboard.simple');
            break;
            case 'social':
                return view('layouts.modules.social');
                break;
            case 'e-commerce':
                return view('layouts.modules.e-commerce');
                break;
            case 'appointment':
                return view('layouts.modules.appointment');
                break;
            case 'filemanager':
                return view('layouts.modules.file-manager');
                break;
            case 'blog':
                return view('layouts.modules.blog');
                break;
            case 'chat':
                return view('layouts.modules.chat');
                break;
            case 'mail':
                return view('layouts.modules.mail');
                break;
            default:
                return view('layouts.dashboard.default');
            break;
        }
    }
}
