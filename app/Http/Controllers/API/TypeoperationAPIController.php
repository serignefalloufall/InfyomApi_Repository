<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeoperationAPIRequest;
use App\Http\Requests\API\UpdateTypeoperationAPIRequest;
use App\Models\Typeoperation;
use App\Repositories\TypeoperationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypeoperationController
 * @package App\Http\Controllers\API
 */

class TypeoperationAPIController extends AppBaseController
{
    /** @var  TypeoperationRepository */
    private $typeoperationRepository;

    public function __construct(TypeoperationRepository $typeoperationRepo)
    {
        $this->typeoperationRepository = $typeoperationRepo;
    }

    /**
     * Display a listing of the Typeoperation.
     * GET|HEAD /typeoperations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typeoperations = $this->typeoperationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($typeoperations->toArray(), 'Typeoperations retrieved successfully');
    }

    /**
     * Store a newly created Typeoperation in storage.
     * POST /typeoperations
     *
     * @param CreateTypeoperationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeoperationAPIRequest $request)
    {
        $input = $request->all();

        $typeoperation = $this->typeoperationRepository->create($input);

        return $this->sendResponse($typeoperation->toArray(), 'Typeoperation saved successfully');
    }

    /**
     * Display the specified Typeoperation.
     * GET|HEAD /typeoperations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Typeoperation $typeoperation */
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            return $this->sendError('Typeoperation not found');
        }

        return $this->sendResponse($typeoperation->toArray(), 'Typeoperation retrieved successfully');
    }

    /**
     * Update the specified Typeoperation in storage.
     * PUT/PATCH /typeoperations/{id}
     *
     * @param int $id
     * @param UpdateTypeoperationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeoperationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Typeoperation $typeoperation */
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            return $this->sendError('Typeoperation not found');
        }

        $typeoperation = $this->typeoperationRepository->update($input, $id);

        return $this->sendResponse($typeoperation->toArray(), 'Typeoperation updated successfully');
    }

    /**
     * Remove the specified Typeoperation from storage.
     * DELETE /typeoperations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Typeoperation $typeoperation */
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            return $this->sendError('Typeoperation not found');
        }

        $typeoperation->delete();

        return $this->sendSuccess('Typeoperation deleted successfully');
    }
}
