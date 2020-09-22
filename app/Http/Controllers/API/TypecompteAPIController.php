<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypecompteAPIRequest;
use App\Http\Requests\API\UpdateTypecompteAPIRequest;
use App\Models\Typecompte;
use App\Repositories\TypecompteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypecompteController
 * @package App\Http\Controllers\API
 */

class TypecompteAPIController extends AppBaseController
{
    /** @var  TypecompteRepository */
    private $typecompteRepository;

    public function __construct(TypecompteRepository $typecompteRepo)
    {
        $this->typecompteRepository = $typecompteRepo;
    }

    /**
     * Display a listing of the Typecompte.
     * GET|HEAD /typecomptes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typecomptes = $this->typecompteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($typecomptes->toArray(), 'Typecomptes retrieved successfully');
    }

    /**
     * Store a newly created Typecompte in storage.
     * POST /typecomptes
     *
     * @param CreateTypecompteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypecompteAPIRequest $request)
    {
        $input = $request->all();

        $typecompte = $this->typecompteRepository->create($input);

        return $this->sendResponse($typecompte->toArray(), 'Typecompte saved successfully');
    }

    /**
     * Display the specified Typecompte.
     * GET|HEAD /typecomptes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Typecompte $typecompte */
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            return $this->sendError('Typecompte not found');
        }

        return $this->sendResponse($typecompte->toArray(), 'Typecompte retrieved successfully');
    }

    /**
     * Update the specified Typecompte in storage.
     * PUT/PATCH /typecomptes/{id}
     *
     * @param int $id
     * @param UpdateTypecompteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypecompteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Typecompte $typecompte */
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            return $this->sendError('Typecompte not found');
        }

        $typecompte = $this->typecompteRepository->update($input, $id);

        return $this->sendResponse($typecompte->toArray(), 'Typecompte updated successfully');
    }

    /**
     * Remove the specified Typecompte from storage.
     * DELETE /typecomptes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Typecompte $typecompte */
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            return $this->sendError('Typecompte not found');
        }

        $typecompte->delete();

        return $this->sendSuccess('Typecompte deleted successfully');
    }
}
