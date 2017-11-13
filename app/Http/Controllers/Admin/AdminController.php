<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }
    public function dashboard($id)
    {
        switch ($id) {
            case 2:
                return view('admin.admin2');
                break;
            case 3:
                return view('admin.admin3');
                break;
            default:
                return view('admin.admin');
                break;
        }
    }
    public function form($id=null)
    {
        switch ($id) {
            case 'form_advanced':
                return view('admin.forms.form_advanced');
                break;
            case 'form_validation':
                return view('admin.forms.form_validation');
                break;            
            case 'form_wizards':
                return view('admin.forms.form_wizards');
                break;            
            case 'form_upload':
                return view('admin.forms.form_upload');
                break;
            case 'form_buttons':
                return view('admin.forms.form_buttons');
                break;
            default:
                return view('admin.forms.form');
                break;
        }
    }

    public function uiElements($id=null)
    {
         switch ($id) {
            case 'media_gallery':
                return view('admin.ui.media_gallery');
                break;
            case 'typography':
                return view('admin.ui.typography');
                break;
            case 'icons':
                return view('admin.ui.icons');
                break;
            case 'glyphicons':
                return view('admin.ui.glyphicons');
                break;
            case 'widgets':
                return view('admin.ui.widgets');
                break;
            case 'invoice':
                return view('admin.ui.invoice');
                break;
            case 'inbox':
                return view('admin.ui.inbox');
                break;
            case 'calendar':
                return view('admin.ui.calendar');
                break;
            default:
                return view('admin.ui.general_elements');
                break;
        }
    }
}
