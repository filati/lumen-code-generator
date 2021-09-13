<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Repositories\DummysRepository;
use App\Transformer\DummysTransform;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class DummysController extends Controller
{
    protected $mainRepository;
    protected $mainTransform;

    public function __construct(
        DummysRepository $mainRepository,
        DummysTransform  $mainTransform
    )
    {
        $this->middleware(Authenticate::class);

        $this->mainRepository = $mainRepository;
        $this->mainTransform = $mainTransform;
    }

    /**
     * Listagem
     *
     * @param Request $request
     * @param integer|null $id
     * @return JsonResponse
     */
    public function list(Request $request, string $uuid = null): JsonResponse
    {
        return parent::apiList($request, $uuid);
    }

    /**
     * Cria um Endereco
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function create(Request $request): JsonResponse
    {
        return parent::apiCreate($request);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Request $request): JsonResponse
    {
        return parent::apiUpdate($request);
    }

    /**
     * @param $uuid
     * @return JsonResponse
     */
    public function delete($uuid): JsonResponse
    {
        return parent::apiDelete($uuid);
    }
}
