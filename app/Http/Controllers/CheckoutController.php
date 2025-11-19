// app/Http/Controllers/CheckoutController.php

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        // misal dari halaman detail kamu kirim product_id dan qty
        $productId = $request->input('product_id');
        $qty       = $request->input('qty', 1);

        $product = Product::findOrFail($productId);

        // bisa pakai langsung model atau diubah ke array
        $checkoutItems = [
            (object)[
                'id'     => $product->id,
                'name'   => $product->name,   // sesuaikan nama field
                'price'  => $product->price,
                'stock'  => $product->stock,
                'qty'    => $qty,
                'rating' => $product->rating ?? 0,
                'image'  => $product->image,  // simpan nama file/path dari DB
            ],
        ];

        $totalPrice  = $product->price * $qty;
        $productName = $product->name;

        return view('checkout', compact('checkoutItems', 'totalPrice', 'productName', 'qty'));
    }
}
