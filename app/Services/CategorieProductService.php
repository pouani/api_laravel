<?php
namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\CategorieProductInterface;
use App\Models\CategorieProduit;

class CategorieProductService implements CategorieProductInterface
{
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name_cat' => 'required|string|max:300',
            ]);
            
            if($validator->fails()){
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }

            $categorie = new CategorieProduit();
            $categorie->name_cat = $request->get('name_cat');
            $categorie->save();

            return response()->json([
                'success' =>true,
                'message' => 'Nouvelle categorie produit créé!!!'
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
                'name_cat' => 'required|string|max:300',
            ]);
            
            if($validator->fails()){
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors()
                ]);
            }

            $categorie = CategorieProduit::find($request->get('id'));
            $categorie->name_cat = $request->get('name_cat');
            $categorie->save();

            return response()->json([
                'success' =>true,
                'message' => 'Categorie Produit modifié!!!'
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
            CategorieProduit::where('id', $id)->delete();
            return response()->json([
                'success' =>true,
                'message' => 'Categorie Produit Supprimé!!!'
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
            $categorie = CategorieProduit::find($id);

            return response()->json([
                'success' =>true,
                'message' => $categorie
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
            $categorie = CategorieProduit::all();
            return response()->json([
                'success' =>true,
                'message' => $categorie
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }
}