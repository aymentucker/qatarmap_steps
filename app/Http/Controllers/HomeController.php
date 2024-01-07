<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.dashboard', compact('assets'));
    }

    public function analytics(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.analytics-dashboard', compact('assets'));
    }
    //crypto dashboard
    public function crypto(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.crypto-dashboard', compact('assets'));
    }
    //ecommerce dashboard

    /*
     * Menu Style Routs
     */
    public function horizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.horizontal',compact('assets'));
    }
    public function dualHorizontal(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.dual-horizontal',compact('assets'));
    }
    public function dualCompact(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.dual-compact',compact('assets'));
    }
    public function boxed(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.boxed',compact('assets'));
    }
    public function boxedFancy(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.boxed-fancy',compact('assets'));
    }
    public function boxedFixed(Request $request)
    {
        $assets = ['chart', 'animation'];
        return view('dashboards.boxed-fixed',compact('assets'));
    }

    /*
     * Pages Routs
     */
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }
    public function billing_1(Request $request)
    {
        return view('special-pages.billing-1');
    }
    public function billing_2(Request $request)
    {
        return view('special-pages.billing-2');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];
        return view('special-pages.calender',compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetBasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetChart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }
    public function widgetCard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }
    public function vector(Request $request)
    {
        return view('maps.vector');
    }

    /*
     * Plugins Routs
     */
    public function apexcharts(Request $request)
    {
        return view('plugins.apexcharts');
    }
    public function buttonHover(Request $request)
    {
        return view('plugins.button-hover');
    }
    public function choiseJs(Request $request)
    {
        return view('plugins.choise-js');
    }
    public function flatpickr(Request $request)
    {
        return view('plugins.flatpickr');
    }
    public function fslightbox(Request $request)
    {
        return view('plugins.fslightbox');
    }
    public function galleryHover(Request $request)
    {
        return view('plugins.gallery-hover');
    }
    public function imageCroper(Request $request)
    {
        return view('plugins.image-croper');
    }
    public function loader(Request $request)
    {
        return view('plugins.loader');
    }
    public function quillEditor(Request $request)
    {
        return view('plugins.quill-editor');
    }
    public function rating(Request $request)
    {
        return view('plugins.rating');
    }
    public function select2(Request $request)
    {
        return view('plugins.select2');
    }
    public function sweetAlert(Request $request)
    {
        return view('plugins.sweet-alert');
    }
    public function uiColor(Request $request)
    {
        return view('plugins.ui-color');
    }
    public function uppy(Request $request)
    {
        return view('plugins.uppy');
    }

    /*
     * default Auth Routs
     */
    // public function signin(Request $request)
    // {
    //     $roles = Role::where('status',1)->get();
    //     return view('auth.login',compact('roles'));
    // }
    // public function signup(Request $request)
    // {
    //     return view('auth.register');
    // }
    public function signin(Request $request)
    {
        $roles = Role::where('status',1)->get();
        return view('auth.login',compact('roles'));
    }
    public function signup(Request $request)
    {
        return view('auth.register');
    }
    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }
    public function lockscreen(Request $request)
    {
        return view('auth.lock-screen');
    }
    public function resetPassword(Request $request)
    {
        return view('password.request');
    }
    public function userPrivacySetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }
    /*
     * animated Page Routs
     */

    public function animatedSignin(Request $request)
    {
        return view('auth.pro.animated.signin');
    }
    public function animatedSignup(Request $request)
    {
        return view('auth.pro.animated.signup');
    }
    public function animatedEmail(Request $request)
    {
        return view('auth.pro.animated.email');
    }
    public function animatedLockScreen(Request $request)
    {
        return view('auth.pro.animated.lockscreen');
    }
    public function animatedResetPassword(Request $request)
    {
        return view('auth.pro.animated.resetpassword');
    }
    public function animatedTwoFactor(Request $request)
    {
        return view('auth.pro.animated.twofactor');
    }
    public function animatedAccountDeactivate(Request $request)
    {
        return view('auth.pro.animated.account-deactivate');
    }

       /*
     * Simple Page Routs
     */
    public function simpleSignin(Request $request)
    {
        return view('auth.pro.simple.signin');
    }
    public function simpleSignup(Request $request)
    {
        return view('auth.pro.simple.signup');
    }


    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */
    // public function uisheet(Request $request)
    // {
    //     return view('uisheet');
    // }

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

     /*
     * Table Page Routs
     */
    public function bootstrapTable(Request $request)
    {
        return view('table.bootstrap-table');
    }

    public function dataTable(Request $request)
    {
        return view('table.data-table');
    }

    public function borderTable(Request $request)
    {
        return view('table.border-table');
    }

    public function fancyTable(Request $request)
    {
        return view('table.fancy-table');
    }
    public function fixedTable(Request $request)
    {
        return view('table.fixed-table');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
    }

    /*
     * Extra Page Routs
     */
    public function privacyPolicy(Request $request)
    {
        return view('privacy-policy');
    }
    public function termsOfUse(Request $request)
    {
        return view('terms-of-use');
    }
    public function blankPage(Request $request)
    {
        return view('blankpage');
    }

    /*
     * UI Elements Routes
     */


    public function alerts(Request $request)
    {
        return view('ui-elements.ui-alerts');
    }
    public function avatars(Request $request)
    {
        return view('ui-elements.ui-avatars');
    }
    public function badges(Request $request)
    {
        return view('ui-elements.ui-badges');
    }
    public function breadcrumb(Request $request)
    {
        return view('ui-elements.ui-breadcrumb');
    }
    public function buttons_groups(Request $request)
    {
        return view('ui-elements.ui-buttons-group');
    }
    public function buttons(Request $request)
    {
        return view('ui-elements.ui-buttons');
    }
    public function cards(Request $request)
    {
        return view('ui-elements.ui-cards');
    }
    public function carousel(Request $request)
    {
        return view('ui-elements.ui-carousel');
    }
    public function color(Request $request)
    {
        return view('ui-elements.ui-color');
    }
    public function embed_video(Request $request)
    {
        return view('ui-elements.ui-embed-video');
    }
    public function grid(Request $request)
    {
        return view('ui-elements.ui-grid');
    }
    public function images(Request $request)
    {
        return view('ui-elements.ui-images');
    }
    public function list(Request $request)
    {
        return view('ui-elements.ui-list-group');
    }
    public function modal(Request $request)
    {
        return view('ui-elements.ui-modal');
    }
    public function notifications(Request $request)
    {
        return view('ui-elements.ui-notifications');
    }
    public function offcanvas(Request $request)
    {
        return view('ui-elements.ui-offcanvas');
    }
    public function pagination(Request $request)
    {
        return view('ui-elements.ui-pagination');
    }
    public function popovers(Request $request)
    {
        return view('ui-elements.ui-popovers');
    }
    public function progressbars(Request $request)
    {
        return view('ui-elements.ui-progressbars');
    }
    public function tabs(Request $request)
    {
        return view('ui-elements.ui-tabs');
    }
    public function tooltips(Request $request)
    {
        return view('ui-elements.ui-tooltips');
    }
    public function typography(Request $request)
    {
        return view('ui-elements.ui-typography');
    }

}


