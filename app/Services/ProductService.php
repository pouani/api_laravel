<?php
namespace App\Services;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Validator;

class ProductService implements ProductInterface
{
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:300',
                'description' => 'string',
                'min_qt' => 'required|integer',
                'note' => 'required|integer',
                'cost' => 'required|regex:/^\d+(\.\d{1,2})?'
            ]);
            
            if($validator->fails()){
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }

            $product = new Product();
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->min_qt = $request->get('min_qt');
            $product->note = $request->get('note');
            $product->cost = $request->get('cost');
            $product->save();

            return response()->json([
                'success' =>true,
                'message' => 'Nouveau produit créé!!!'
            ], 200);

        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
                'name' => 'required|string|max:300',
                'description' => 'string',
                'min_qt' => 'required|integer',
                'note' => 'required|integer',
                'cost' => 'required|regex:/^\d+(\.\d{1,2})?'
            ]);
            
            if($validator->fails()){
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }

            $product = Product::find($request->get('id'));
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->min_qt = $request->get('min_qt');
            $product->note = $request->get('note');
            $product->cost = $request->get('cost');
            $product->save();

            return response()->json([
                'success' =>true,
                'message' => 'Produit modifié!!!'
            ], 200);

        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            Product::where('id', $id)->delete();
            return response()->json([
                'success' =>true,
                'message' => 'Produit Supprimé!!!'
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function view($id)
    {
        try {
            $product = Product::find($id);

            return response()->json([
                'success' =>true,
                'message' => $product
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function list()
    {
        try {
            $products = Product::all();
            return response()->json([
                'success' =>true,
                'message' => $products
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }
}