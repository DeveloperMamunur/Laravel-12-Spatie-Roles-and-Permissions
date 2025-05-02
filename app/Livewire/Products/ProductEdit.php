<?php
namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    public $product;
    public $name, $details;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->name    = $this->product->name;
        $this->details = $this->product->details;
    }
    public function render()
    {
        return view('livewire.products.product-edit');
    }

    public function update()
    {
        $this->validate([
            'name'    => 'required',
            'details' => 'required',
        ]);

        $this->product->name    = $this->name;
        $this->product->details = $this->details;

        $this->product->save();

        return to_route('products.index')->with('success', 'User Updated successfully.');
    }
}
