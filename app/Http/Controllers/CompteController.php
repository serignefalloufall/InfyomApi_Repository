<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Repositories\CompteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CompteController extends AppBaseController
{
    /** @var  CompteRepository */
    private $compteRepository;

    public function __construct(CompteRepository $compteRepo)
    {
        $this->compteRepository = $compteRepo;
    }

    /**
     * Display a listing of the Compte.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comptes = $this->compteRepository->all();

        return view('comptes.index')
            ->with('comptes', $comptes);
    }

    /**
     * Show the form for creating a new Compte.
     *
     * @return Response
     */
    public function create()
    {
        return view('comptes.create');
    }

    /**
     * Store a newly created Compte in storage.
     *
     * @param CreateCompteRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteRequest $request)
    {
        $input = $request->all();

        $compte = $this->compteRepository->create($input);

        Flash::success('Compte saved successfully.');

        return redirect(route('comptes.index'));
    }

    /**
     * Display the specified Compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            Flash::error('Compte not found');

            return redirect(route('comptes.index'));
        }

        return view('comptes.show')->with('compte', $compte);
    }

    /**
     * Show the form for editing the specified Compte.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            Flash::error('Compte not found');

            return redirect(route('comptes.index'));
        }

        return view('comptes.edit')->with('compte', $compte);
    }

    /**
     * Update the specified Compte in storage.
     *
     * @param int $id
     * @param UpdateCompteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteRequest $request)
    {
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            Flash::error('Compte not found');

            return redirect(route('comptes.index'));
        }

        $compte = $this->compteRepository->update($request->all(), $id);

        Flash::success('Compte updated successfully.');

        return redirect(route('comptes.index'));
    }

    /**
     * Remove the specified Compte from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compte = $this->compteRepository->find($id);

        if (empty($compte)) {
            Flash::error('Compte not found');

            return redirect(route('comptes.index'));
        }

        $this->compteRepository->delete($id);

        Flash::success('Compte deleted successfully.');

        return redirect(route('comptes.index'));
    }
}
