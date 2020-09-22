<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypecompteRequest;
use App\Http\Requests\UpdateTypecompteRequest;
use App\Repositories\TypecompteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypecompteController extends AppBaseController
{
    /** @var  TypecompteRepository */
    private $typecompteRepository;

    public function __construct(TypecompteRepository $typecompteRepo)
    {
        $this->typecompteRepository = $typecompteRepo;
    }

    /**
     * Display a listing of the Typecompte.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typecomptes = $this->typecompteRepository->all();

        return view('typecomptes.index')
            ->with('typecomptes', $typecomptes);
    }

    /**
     * Show the form for creating a new Typecompte.
     *
     * @return Response
     */
    public function create()
    {
        return view('typecomptes.create');
    }

    /**
     * Store a newly created Typecompte in storage.
     *
     * @param CreateTypecompteRequest $request
     *
     * @return Response
     */
    public function store(CreateTypecompteRequest $request)
    {
        $input = $request->all();

        $typecompte = $this->typecompteRepository->create($input);

        Flash::success('Typecompte saved successfully.');

        return redirect(route('typecomptes.index'));
    }

    /**
     * Display the specified Typecompte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            Flash::error('Typecompte not found');

            return redirect(route('typecomptes.index'));
        }

        return view('typecomptes.show')->with('typecompte', $typecompte);
    }

    /**
     * Show the form for editing the specified Typecompte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            Flash::error('Typecompte not found');

            return redirect(route('typecomptes.index'));
        }

        return view('typecomptes.edit')->with('typecompte', $typecompte);
    }

    /**
     * Update the specified Typecompte in storage.
     *
     * @param int $id
     * @param UpdateTypecompteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypecompteRequest $request)
    {
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            Flash::error('Typecompte not found');

            return redirect(route('typecomptes.index'));
        }

        $typecompte = $this->typecompteRepository->update($request->all(), $id);

        Flash::success('Typecompte updated successfully.');

        return redirect(route('typecomptes.index'));
    }

    /**
     * Remove the specified Typecompte from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typecompte = $this->typecompteRepository->find($id);

        if (empty($typecompte)) {
            Flash::error('Typecompte not found');

            return redirect(route('typecomptes.index'));
        }

        $this->typecompteRepository->delete($id);

        Flash::success('Typecompte deleted successfully.');

        return redirect(route('typecomptes.index'));
    }
}
