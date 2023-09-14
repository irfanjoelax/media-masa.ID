<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\SosialMedia;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
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
        $data['categories'] = Category::orderBy('name')->get();
        $data['tags'] = Tag::orderBy('name')->get();
        $data['pages'] = Page::all();

        $data['Facebook'] = SosialMedia::where('key', 'Facebook')->firstOrFail()->value;
        $data['Instagram'] = SosialMedia::where('key', 'Instagram')->firstOrFail()->value;
        $data['Youtube'] = SosialMedia::where('key', 'Youtube')->firstOrFail()->value;

        // Menghilangkan karakter non-digit dari nomor telepon
        $nomor_telepon = preg_replace('/[^0-9]/', '', SosialMedia::where('key', 'Whatsapp')->firstOrFail()->value);

        if (substr($nomor_telepon, 0, 1) === '0') {
            $nomor_telepon = substr($nomor_telepon, 1);
        }

        // Tambahkan awalan '+62' jika belum ada
        if (substr($nomor_telepon, 0, 3) !== '+62') {
            $nomor_telepon = '+62' . $nomor_telepon;
        }


        $data['Whatsapp'] = 'https://wa.me/' . $nomor_telepon;
        $data['Email'] = 'mailto:' . SosialMedia::where('key', 'Email')->firstOrFail()->value;

        return view('components.footer', $data);
    }
}
