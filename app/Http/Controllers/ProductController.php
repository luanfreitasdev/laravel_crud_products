<?php

namespace App\Http\Controllers;

use App\Product;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class ProductController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Produtos']);

        $this->setBreadcumb([
            'link' => route('products.index'),
            'icon' => 'person',
            'active' => true,
            'label' => 'Lista de Produtos']);

        return view('product.create');
    }

    public function store (Request $request) {

        $file             = $request->file('file');

        $extension = $request->file('file')->getClientOriginalExtension();

        if (!in_array($extension, ['jpeg', 'png'])) {
            $request->session()->flash('error', 'Somente arquivos jpeg e png são aceitos');
            return redirect()->route('products.create');
        }

        $filename = rand(0,9999).'_'.time().'.'.$extension;

        $file->storeAs('public/img/products', $filename);

        $save = public_path('storage/img/products/'.$filename);
        $img  = \Intervention\Image\Facades\Image::make($save);

        $img->save($save);
        $product             = new Product();
        $product->title      = $request->title;
        $product->status     = 0;
        $product->image      = $filename;

        if ($product->save()) {
            $request->session()->flash('success', $request->title. ' foi cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Falha ao cadastrar o produto');
        }

        return redirect()->route('products.index');
    }

    public function index()
    {
        $this->setBreadcumb([
            'label' => 'Produtos']);

        $this->setBreadcumb([
            'link' => route('products.index'),
            'icon' => 'list',
            'active' => false,
            'label' => 'Lista de Produtos']);

        if (Auth::user()->can('resource', 'manage.products')) {
            $products = Product::all();

            return view('product.home')->with([
                'products' => $products
            ]);
        } else {
            return $this->denies();
        }
    }

    public function edit(Product $product)
    {
        $this->setBreadcumb([
            'icon' => 'settings',
            'label' => 'Produtos']);

        $this->setBreadcumb([
            'link' => route('products.index'),
            'icon' => 'person',
            'active' => true,
            'label' => 'Lista de Produtos']);

        $this->setBreadcumb([
            'link' => route('products.edit', $product->id),
            'active' => true,
            'icon' => 'edit',
            'label' => ' ' .$product->title]);

        $status   = Product::getStatusPermission();

        if (Auth::user()->can('resource', 'product.edit')) {
            return view('product.edit')->with([
                'product' => $product,
                'status'=> $status
            ]);
        } else {
            return $this->denies();
        }
    }

    public function update(Request $request, Product $product)
    {
        $product->title       = $request->title;
        $product->status      = $request->status;

        if ($request->hasFile('file')) {
            $file                 = $request->file('file');

            $extension = $request->file('file')->getClientOriginalExtension();

            if (!in_array($extension, ['jpeg', 'png'])) {
                $request->session()->flash('error', 'Somente arquivos jpeg e png são aceitos');
                return redirect()->route('products.edit', $product->id);
            }
            $filename = rand(0,9999).'_'.time().'.'.$extension;

            $file->storeAs('public/img/products', $filename);

            $save = public_path('storage/img/products/'.$filename);
            $img  = \Intervention\Image\Facades\Image::make($save);

            if ($img->save($save)) {
                Storage::delete('storage/img/products/'.$product->image);
                $product->image = $filename;
            }
        }


        if ($product->save()) {
            $request->session()->flash('success', $request->name. ' foi atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Falha ao atualizar o produto');
        }
        if (Auth::user()->can('resource', 'product.edit')) {
            return redirect()->route('products.index');
        }else {
            return $this->denies();
        }

    }

    public function destroy(Product $product)
    {
        if (Auth::user()->can('resource', 'product.delete')) {
            $product->delete();
            return redirect()->route('products.index');
        } else {
            return $this->denies();
        }

    }


}
