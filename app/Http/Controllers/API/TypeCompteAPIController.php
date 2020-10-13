<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeCompteAPIRequest;
use App\Http\Requests\API\UpdateTypeCompteAPIRequest;
use App\Models\TypeCompte;
use App\Repositories\TypeCompteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypeCompteController
 * @package App\Http\Controllers\API
 */

class TypeCompteAPIController extends AppBaseController
{
    /** @var  TypeCompteRepository */
    private $typeCompteRepository;

    public function __construct(TypeCompteRepository $typeCompteRepo)
    {
        $this->typeCompteRepository = $typeCompteRepo;
    }

    /**
     * Display a listing of the TypeCompte.
     * GET|HEAD /typeComptes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $typeComptes = $this->typeCompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($typeComptes->toArray(), 'Type Comptes retrieved successfully');
    }

    /**
     * Store a newly created TypeCompte in storage.
     * POST /typeComptes
     *
     * @param CreateTypeCompteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateTypeCompteAPIRequest $request)
    {
        $input = $request->all();

        $typeCompte = $this->typeCompteRepository->create($input);

        return $this->sendResponse($typeCompte->toArray(), 'Type Compte saved successfully');
    }

    /**
     * Display the specified TypeCompte.
     * GET|HEAD /typeComptes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var TypeCompte $typeCompte */
        $typeCompte = $this->typeCompteRepository->find($id);

        if (empty($typeCompte)) {
            return $this->sendError('Type Compte not found');
        }

        return $this->sendResponse($typeCompte->toArray(), 'Type Compte retrieved successfully');
    }

    /**
     * Update the specified TypeCompte in storage.
     * PUT/PATCH /typeComptes/{id}
     *
     * @param int $id
     * @param UpdateTypeCompteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateTypeCompteAPIRequest $request)
    {
        $input = $request->all();

        /** @var TypeCompte $typeCompte */
        $typeCompte = $this->typeCompteRepository->find($id);

        if (empty($typeCompte)) {
            return $this->sendError('Type Compte not found');
        }

        $typeCompte = $this->typeCompteRepository->update($input, $id);

        return $this->sendResponse($typeCompte->toArray(), 'TypeCompte updated successfully');
    }

    /**
     * Remove the specified TypeCompte from storage.
     * DELETE /typeComptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var TypeCompte $typeCompte */
        $typeCompte = $this->typeCompteRepository->find($id);

        if (empty($typeCompte)) {
            return $this->sendError('Type Compte not found');
        }

        $typeCompte->delete();

        return $this->sendSuccess('Type Compte deleted successfully');
    }
}
