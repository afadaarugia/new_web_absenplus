<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAbsensiAPIRequest;
use App\Http\Requests\API\UpdateAbsensiAPIRequest;
use App\Models\Absensi;
use App\Repositories\AbsensiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AbsensiController
 * @package App\Http\Controllers\API
 */

class AbsensiAPIController extends AppBaseController
{
    /** @var  AbsensiRepository */
    private $absensiRepository;

    public function __construct(AbsensiRepository $absensiRepo)
    {
        $this->absensiRepository = $absensiRepo;
    }

    /**
     * Display a listing of the Absensi.
     * GET|HEAD /absensis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $absensis = $this->absensiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($absensis->toArray(), 'Absensis retrieved successfully');
    }

    /**
     * Store a newly created Absensi in storage.
     * POST /absensis
     *
     * @param CreateAbsensiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAbsensiAPIRequest $request)
    {
        $input = $request->all();

        $absensi = $this->absensiRepository->create($input);

        return $this->sendResponse($absensi->toArray(), 'Absensi saved successfully');
    }

    /**
     * Display the specified Absensi.
     * GET|HEAD /absensis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Absensi $absensi */
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            return $this->sendError('Absensi not found');
        }

        return $this->sendResponse($absensi->toArray(), 'Absensi retrieved successfully');
    }

    /**
     * Update the specified Absensi in storage.
     * PUT/PATCH /absensis/{id}
     *
     * @param int $id
     * @param UpdateAbsensiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAbsensiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Absensi $absensi */
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            return $this->sendError('Absensi not found');
        }

        $absensi = $this->absensiRepository->update($input, $id);

        return $this->sendResponse($absensi->toArray(), 'Absensi updated successfully');
    }

    /**
     * Remove the specified Absensi from storage.
     * DELETE /absensis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Absensi $absensi */
        $absensi = $this->absensiRepository->find($id);

        if (empty($absensi)) {
            return $this->sendError('Absensi not found');
        }

        $absensi->delete();

        return $this->sendSuccess('Absensi deleted successfully');
    }
}
