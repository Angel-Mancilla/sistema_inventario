<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Grupo;
use App\Interfaces\ArticuloRepositoryInterface;
use App\Services\ArticuloService;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    
    protected ArticuloService $articuloService;

    public function __construct(ArticuloService $articuloService){
        $this->articuloService = $articuloService;
    }

    public function index(){
        try {
            $articulos = $this->articuloService->getAllArticulos();
            return view('inventario.articulo.index', compact('articulos'));
        } catch(\Exception $e) {
            return redirect()->route('inventario.dashboard')->with('error', $e->getMessage());
        }
    }

    public function create( Grupo $grupo){
        $categorias = $this->articuloService->getCategoriasActives();
        $grupos = $this->articuloService->getGruposActives();
        return view('inventario.articulo.create', compact('categorias','grupos'));
    }

    public function store(StoreArticuloRequest $request){
        try {
            $requestValidated = $request->validated();
            $this->articuloService->createArticulo($requestValidated);
            return redirect()->route('articulo.index')->with('success','Articulo agregado correctamente');
            } catch(\Exception $e) {
            return redirect()->route('articulo.index')->with('error',$e->getMessage());
        }
    }

    public function edit(Articulo $articulo){
        try {
            $articulo = $this->articuloService->getArticuloById($articulo);
            $categorias = $this->articuloService->getCategoriasActives();
            $grupos = $this->articuloService->getGruposActives();
            return view('inventario.articulo.edit',compact('articulo','categorias','grupos'));
        } catch(\Exception $e) {
            return redirect()->route('articulo.index')->with('error', $e->getMessage());
        }
    }

    public function update(UpdateArticuloRequest $request, Articulo $articulo){
        try {
            $requestValidated = $request->validated();        
            $this->articuloService->updateArticulo($articulo, $requestValidated);
            return redirect()->route('articulo.index');
        } catch(\Exception $e) {
            return redirect()->route('articulo.index')->with('error',$e->getMessage());
        }
    }

    public function destroy(Articulo $articulo){
        try {
            $this->articuloService->deleteArticulo($articulo);
            return redirect()->route('articulo.index')->with('success','Articulo eliminado correctamente');
        }catch(\Exception $e){
            return redirect()->route('articulo.index')->with('error', $e->getMessage());
        }
    }
}
