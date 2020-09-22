<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeoperationRequest;
use App\Http\Requests\UpdateTypeoperationRequest;
use App\Repositories\TypeoperationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypeoperationController extends AppBaseController
{
    /** @var  TypeoperationRepository */
    private $typeoperationRepository;

    public function __construct(TypeoperationRepository $typeoperationRepo)
    {
        $this->typeoperationRepository = $typeoperationRepo;
    }

    /**
     * Display a listing of the Typeoperation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeoperations = $this->typeoperationRepository->all();

        return view('typeoperations.index')
            ->with('typeoperations', $typeoperations);
    }

    /**
     * Show the form for creating a new Typeoperation.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeoperations.create');
    }

    /**
     * Store a newly created Typeoperation in storage.
     *
     * @param CreateTypeoperationRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeoperationRequest $request)
    {
        $input = $request->all();

        $typeoperation = $this->typeoperationRepository->create($input);

        Flash::success('Typeoperation saved successfully.');

        return redirect(route('typeoperations.index'));
    }

    /**
     * Display the specified Typeoperation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            Flash::error('Typeoperation not found');

            return redirect(route('typeoperations.index'));
        }

        return view('typeoperations.show')->with('typeoperation', $typeoperation);
    }

    /**
     * Show the form for editing the specified Typeoperation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            Flash::error('Typeoperation not found');

            return redirect(route('typeoperations.index'));
        }

        return view('typeoperations.edit')->with('typeoperation', $typeoperation);
    }

    /**
     * Update the specified Typeoperation in storage.
     *
     * @param int $id
     * @param UpdateTypeoperationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeoperationRequest $request)
    {
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            Flash::error('Typeoperation not found');

            return redirect(route('typeoperations.index'));
        }

        $typeoperation = $this->typeoperationRepository->update($request->all(), $id);

        Flash::success('Typeoperation updated successfully.');

        return redirect(route('typeoperations.index'));
    }

    /**
     * Remove the specified Typeoperation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeoperation = $this->typeoperationRepository->find($id);

        if (empty($typeoperation)) {
            Flash::error('Typeoperation not found');

            return redirect(route('typeoperations.index'));
        }

        $this->typeoperationRepository->delete($id);

        Flash::success('Typeoperation deleted successfully.');

        return redirect(route('typeoperations.index'));
    }
}
