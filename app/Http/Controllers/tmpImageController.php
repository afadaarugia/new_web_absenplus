<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetmpImageRequest;
use App\Http\Requests\UpdatetmpImageRequest;
use App\Repositories\tmpImageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tmpImageController extends AppBaseController
{
    /** @var  tmpImageRepository */
    private $tmpImageRepository;

    public function __construct(tmpImageRepository $tmpImageRepo)
    {
        $this->tmpImageRepository = $tmpImageRepo;
    }

    /**
     * Display a listing of the tmpImage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tmpImages = $this->tmpImageRepository->all();

        return view('tmp_images.index')
            ->with('tmpImages', $tmpImages);
    }

    /**
     * Show the form for creating a new tmpImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('tmp_images.create');
    }

    /**
     * Store a newly created tmpImage in storage.
     *
     * @param CreatetmpImageRequest $request
     *
     * @return Response
     */
    public function store(CreatetmpImageRequest $request)
    {
        $input = $request->all();

        $tmpImage = $this->tmpImageRepository->create($input);

        Flash::success('Tmp Image saved successfully.');

        return redirect(route('tmpImages.index'));
    }

    /**
     * Display the specified tmpImage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            Flash::error('Tmp Image not found');

            return redirect(route('tmpImages.index'));
        }

        return view('tmp_images.show')->with('tmpImage', $tmpImage);
    }

    /**
     * Show the form for editing the specified tmpImage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            Flash::error('Tmp Image not found');

            return redirect(route('tmpImages.index'));
        }

        return view('tmp_images.edit')->with('tmpImage', $tmpImage);
    }

    /**
     * Update the specified tmpImage in storage.
     *
     * @param int $id
     * @param UpdatetmpImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetmpImageRequest $request)
    {
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            Flash::error('Tmp Image not found');

            return redirect(route('tmpImages.index'));
        }

        $tmpImage = $this->tmpImageRepository->update($request->all(), $id);

        Flash::success('Tmp Image updated successfully.');

        return redirect(route('tmpImages.index'));
    }

    /**
     * Remove the specified tmpImage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tmpImage = $this->tmpImageRepository->find($id);

        if (empty($tmpImage)) {
            Flash::error('Tmp Image not found');

            return redirect(route('tmpImages.index'));
        }

        $this->tmpImageRepository->delete($id);

        Flash::success('Tmp Image deleted successfully.');

        return redirect(route('tmpImages.index'));
    }
}
