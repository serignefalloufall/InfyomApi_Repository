<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOperationAPIRequest;
use App\Http\Requests\API\UpdateOperationAPIRequest;
use App\Models\Operation;
use App\Repositories\OperationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OperationController
 * @package App\Http\Controllers\API
 */

class OperationAPIController extends AppBaseController
{
    /** @var  OperationRepository */
    private $operationRepository;

    public function __construct(OperationRepository $operationRepo)
    {
        $this->operationRepository = $operationRepo;
    }

    /**
     * Display a listing of the Operation.
     * GET|HEAD /operations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $operations = $this->operationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($operations->toArray(), 'Operations retrieved successfully');
    }

    /**
     * Store a newly created Operation in storage.
     * POST /operations
     *
     * @param CreateOperationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationAPIRequest $request)
    {
        $input = $request->all();

        $operation = $this->operationRepository->create($input);

        return $this->sendResponse($operation->toArray(), 'Operation saved successfully');
    }

    /**
     * Display the specified Operation.
     * GET|HEAD /operations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Operation $operation */
        $operation = $this->operationRepository->find($id);

        if (empty($operation)) {
            return $this->sendError('Operation not found');
        }

        return $this->sendResponse($operation->toArray(), 'Operation retrieved successfully');
    }

    /**
     * Update the specified Operation in storage.
     * PUT/PATCH /operations/{id}
     *
     * @param int $id
     * @param UpdateOperationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Operation $operation */
        $operation = $this->operationRepository->find($id);

        if (empty($operation)) {
            return $this->sendError('Operation not found');
        }

        $operation = $this->operationRepository->update($input, $id);

        return $this->sendResponse($operation->toArray(), 'Operation updated successfully');
    }

    /**
     * Remove the specified Operation from storage.
     * DELETE /operations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Operation $operation */
        $operation = $this->operationRepository->find($id);

        if (empty($operation)) {
            return $this->sendError('Operation not found');
        }

        $operation->delete();

        return $this->sendSuccess('Operation deleted successfully');
    }
}
